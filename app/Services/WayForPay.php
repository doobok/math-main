<?php

namespace App\Services;

use Carbon\Carbon;

class WayForPay
{
    const FIELDS_DELIMITER  = ';';
    const TEST_ACCOUNT = 'test_merch_n1';
    const TEST_KEY = 'flk3409refn54t54t*FNJRET';

    private $orderReference;
    private $orderDate;
    private $amount;
    private $currency;
    private $product;
    private $productPrice;
    private $client;
    private $merchantAccount;
    private $merchantDomain;
    private $merchantKey;
    private $testMode;

    public function __construct(
        string $order_id,
        float $amount,
        array $client,
        string $productName,
        string $currency = 'UAH'
    ) {
        $this->testMode = config('wayforpay.testMode');
        $this->orderReference = $order_id;
        $this->currency = $currency;
        $this->product = $productName;
        $this->productPrice = [$amount];
        $this->amount = $amount;
        $this->client = $client;

        $this->merchantDomain= config('wayforpay.merchantDomain');
        $this->merchantAccount = $this->testMode
            ? self::TEST_ACCOUNT
            : config('wayforpay.merchantAccount');
        $this->merchantKey = $this->testMode
            ? self::TEST_KEY
            : config('wayforpay.merchantSecretKey');

        $this->orderDate = Carbon::now()->getTimestamp();
    }

    public function getData()
    {
        return array(
            'merchantAccount' => $this->merchantAccount,
            'merchantDomainName' => $this->merchantDomain,
            'merchantTransactionType' => 'AUTO',
            'merchantTransactionSecureType' => 'AUTO',
            'merchantSignature' => $this->calculateSignature(
                array(
                    $this->merchantAccount,
                    $this->merchantDomain,
                    $this->orderReference,
                    $this->orderDate,
                    $this->amount,
                    $this->currency,
                    [
                        $this->product,
                        1,
                        $this->amount,
                    ],
                ),
                $this->merchantKey
            ),
            'language' => 'AUTO',
            'orderReference' => $this->orderReference,
            'orderDate' => $this->orderDate,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'productName' => [$this->product],
            'productPrice' => $this->productPrice,
            'productCount' => [1],

            'clientFirstName' => $this->client['firstname'] ?? null,
            'clientLastName' => $this->client['lastname'] ?? null,
            'clientPhone' => $this->client['phone'] ?? null,
        );
    }

    public static function calculateSignature(array $fieldsValues, $key)
    {
        $data = [];

        foreach ($fieldsValues as $item) {
            if (is_array($item)) {
                $data[] = implode(self::FIELDS_DELIMITER, $item);
            } else {
                $data[] = (string) $item;
            }
        }

        return $data ?
            hash_hmac('md5', implode(self::FIELDS_DELIMITER, $data), $key) :
            false;
    }

    public function getWidget($buttonText = 'Pay', $buttonClass = 'btn btn-primary')
    {
        return $this->getWidgetExternalScript() .
            $this->getWidgetInitScript() .
            $this->getWidgetButton($buttonText, $buttonClass);
    }

    public function getWidgetExternalScript()
    {
        return sprintf(
            '<script defer async id="widget-wfp-script" language="javascript" type="text/javascript" onload="wfpInit()" src="%s"></script>',
            'https://secure.wayforpay.com/server/pay-widget.js'
        );
    }

    public function getWidgetInitScript($callbackJsFunction = null)
    {
        return sprintf(
            '<script type="text/javascript">
                var wayforpay = null;
                var wfpPay = function () {
                    wayforpay.run(%s);
                }
                var wfpInit = function() {
                    wayforpay = new Wayforpay();

                    window.addEventListener("message", %s);

                    function receiveMessage(event)
                    {
                        if(event.data == "WfpWidgetEventClose"       // при закрытии виджета пользователем
                           || event.data == "WfpWidgetEventApproved" // при успешном завершении операции
                           || event.data == "WfpWidgetEventDeclined" // при неуспешном завершении
                           || event.data == "WfpWidgetEventPending"  // транзакция на обработке
                        ) {
                            console.log(event.data);
                        }
                    }
                }
            </script>',
            \json_encode(array_filter($this->getData())),
            $callbackJsFunction ? $callbackJsFunction : "receiveMessage"
        );
    }

    public function getWidgetButton($buttonText = 'Pay', $buttonClass = 'btn btn-primary')
    {
        return sprintf(
            '<button class="%s" type="button" onclick="wfpPay();">%s</button>',
            $buttonClass,
            $buttonText
        );
    }

}
