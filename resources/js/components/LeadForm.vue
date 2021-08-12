<template>
  <transition name="modal">
    <div v-show="formstatus" class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container text-gray-800 h-full ">

          <div class="relative">
            <button @click="close" class="text-white absolute top-0 right-0">
              <svg  width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z"/></svg>
            </button>

          <template id="lead-form" v-if="!sended">

            <div class="w-full flex text-center justify-center flex-col">
              <div class="text-2xl font-semibold text-white flex flex-row justify-center">

                <svg class="mr-2 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M4.908 2.081l-2.828 2.828 19.092 19.091 2.828-2.828-19.092-19.091zm2.121 6.363l-3.535-3.535 1.414-1.414 3.535 3.535-1.414 1.414zm1.731-5.845c1.232.376 2.197 1.341 2.572 2.573.377-1.232 1.342-2.197 2.573-2.573-1.231-.376-2.196-1.34-2.573-2.573-.375 1.232-1.34 2.197-2.572 2.573zm-5.348 6.954c-.498 1.635-1.777 2.914-3.412 3.413 1.635.499 2.914 1.777 3.412 3.411.499-1.634 1.778-2.913 3.412-3.411-1.634-.5-2.913-1.778-3.412-3.413zm9.553-3.165c.872.266 1.553.948 1.819 1.82.266-.872.948-1.554 1.819-1.82-.871-.266-1.553-.948-1.819-1.82-.266.871-.948 1.554-1.819 1.82zm4.426-6.388c-.303.994-1.082 1.772-2.075 2.076.995.304 1.772 1.082 2.077 2.077.303-.994 1.082-1.772 2.074-2.077-.992-.303-1.772-1.082-2.076-2.076z"/></svg>
                <span>{{$ml.get('leadFormTitle')}}</span>
            </div>
            <p class="text-sm text-gray-300 m-3">
              <template v-if="fullForm">
                {{$ml.get('leadForm2desc')}}
              </template>
              <template v-else>
                {{$ml.get('leadForm1desc')}}
              </template>
            </p>
          </div>

          <div class="mx-auto px-4 mt-2 flex flex-wrap">

            <div id="lastname" v-show="fullForm" class="w-full sm:w-1/2 p-2">
              <span class="text-xs text-gray-400">{{$ml.get('lastname')}}</span>
              <input
                type="text" name="lastname"
                v-model="lastname"
                class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                :placeholder="$ml.get('lastname')"
              />
            </div>

            <div id="firstname" class="w-full p-2 relative" v-bind:class="{ 'sm:w-1/2': fullForm }">
              <span class="text-xs text-gray-400">{{$ml.get('firstname')}}</span>
              <input
                type="text" name="firstname"
                v-model="firstname"
                class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                :placeholder="$ml.get('firstname')"
                @blur="$v.firstname.$touch()"
              />
              <span v-if="$v.firstname.$error" class="text-xs text-red-400 absolute -bottom-2 left-3">{{$ml.get('checkField')}}</span>
            </div>
            <!-- phone -->
            <div id="phone" class="w-full p-2 relative">
              <span class="text-xs text-gray-400">{{$ml.get('phone')}}</span>
              <input
                type="text" name="password" autocomplete="new-password"
                v-model="phone"
                ref="phone"
                class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                :placeholder="$ml.get('phone')"
                @blur="$v.phone.$touch()"
              />
              <span v-if="$v.phone.$error" class="text-xs text-red-400 absolute -bottom-2 left-3">{{$ml.get('checkField')}}</span>
            </div>

          <template id="fullform" v-if="fullForm">

            <div class="w-full sm:w-1/2 p-2">
              <span class="text-xs text-gray-400">{{$ml.get('subject')}}</span>
              <select v-model="subject" @change="setSubject"
              class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                <option value="" disabled selected hidden>{{$ml.get('subject')}}</option>
                <option
                class="text-base leading-3"
                v-for="s in subjects" :value="s.id">{{s.name}}</option>
              </select>
            </div>
            <!-- class -->
            <div class="w-full sm:w-1/2 p-2">
              <span class="text-xs text-gray-400">{{$ml.get('class')}}</span>
              <select v-model="klass"
              class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                <option value="" disabled selected hidden>{{$ml.get('class')}}</option>
                <option
                class="text-base leading-3"
                v-for="c in 11" :value="c">{{c}} {{$ml.get('class')}}</option>
              </select>
            </div>

            <div class="w-full p-2">
              <span class="text-xs text-gray-400">{{$ml.get('city')}}</span>
              <select v-model="city" @change="setCity"
              class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                <option value="" disabled selected hidden>{{$ml.get('city')}}</option>
                <option
                class="text-base leading-3"
                v-for="ct in cityes" :value="ct.id">{{ct.name}}</option>
              </select>
            </div>

            <div class="w-full p-2">
              <span class="text-xs text-gray-400">{{$ml.get('servicePack')}}</span>
              <select v-model="pricePack" @change="setPrice"
              class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                <option value="" disabled selected hidden>{{$ml.get('servicePack')}}</option>
                <option
                class="text-base leading-3"
                v-for="pack in prices" :value="pack.id">
                  {{pack.name}} {{pack.count}} ({{$ml.get(priceGroup[pack.group])}})
                </option>
              </select>
            </div>

            <div v-if="!promoShow" class="m-3">
              <label class="text-white text-sm">
                <input v-model="promoShow" class="focus:outline-none focus:ring mr-1" type="checkbox"> {{$ml.get('getPromo')}}
              </label>
            </div>

            <div v-if="promoDdiscount.valid" class="w-full text-sm text-center text-yellow-200 mb-1">
              -- {{$ml.get('valid' + promoDdiscount.valid)}} --
            </div>

            <div v-if="promoDdiscount.valid === 'yes' && !total" class="w-full text-sm text-center text-red-400 mb-1">
              -- {{$ml.get('selectPrice')}} --
            </div>

            <div v-if="promoShow && promoDdiscount.valid != 'yes'" class="p-2 flex flex-wrap justify-center w-full">

              <input
                type="text"
                v-model="promo"
                class="border-0 px-3 my-2 py-3 placeholder-gray-400 text-gray-700 bg-yellow-100 rounded text-xl shadow focus:outline-none focus:ring flex-grow text-center"
                :placeholder="$ml.get('promo')"
                @input="updateText($event.target.value)"
              />
              <button
                class="bg-yellow-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none flex-none"
                type="button"
                @click="checkPromo"
              >
              {{$ml.get('set')}}
            </button>
            </div>

            <div v-if="total" class="w-full m-2 text-white text-center text-sm">
              <span class="p-3 border-gray-400 border-2 border-dotted rounded flex flex-wrap justify-center">
                <span>
                  {{$ml.get('totalsumm')}} <span class="text-base font-bold text-green-400">{{new Intl.NumberFormat('ru-RU').format(total - discount)}} грн. &nbsp;</span>
                </span>
                <span v-if="discount"> {{$ml.get('discountsumm')}} <span class="text-base font-bold text-red-400">{{new Intl.NumberFormat('ru-RU').format(discount)}} грн.</span></span>
              </span>
            </div>

          </template>

            <div class="m-3">
              <label class="text-white text-sm">
                <input v-model="fullForm" class="focus:outline-none focus:ring mr-1" type="checkbox"> {{$ml.get('fullForm')}}
              </label>
            </div>

            <button
              class="bg-green-400 text-gray-700 w-full p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none"
              type="button"
              :disabled="$v.$invalid"
              @click="sendForm"
            >
            <template v-if="$v.$invalid">
              {{$ml.get('fillForm')}}
            </template>
            <template v-else>
              {{$ml.get('send')}}
            </template>
          </button>

        </div>
        </template>
        <template v-else>
          <div class="w-full flex text-center justify-center flex-col">
            <div class="text-2xl font-semibold text-white flex flex-row justify-center">

              <svg class="mr-2 text-green-400" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M21.856 10.303c.086.554.144 1.118.144 1.697 0 6.075-4.925 11-11 11s-11-4.925-11-11 4.925-11 11-11c2.347 0 4.518.741 6.304 1.993l-1.422 1.457c-1.408-.913-3.082-1.45-4.882-1.45-4.962 0-9 4.038-9 9s4.038 9 9 9c4.894 0 8.879-3.928 8.99-8.795l1.866-1.902zm-.952-8.136l-9.404 9.639-3.843-3.614-3.095 3.098 6.938 6.71 12.5-12.737-3.096-3.096z"/></svg>
              <span>Готово</span>
          </div>
          <template v-if="deal.total > 0">
            <p class="text-base text-gray-300 m-3">
                  {{$ml.get('invoiceComp')}} 💳
            </p>
            <a rel="nofollow" :href="payLink(deal.id)"
              class="bg-yellow-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none flex flex-wrap justify-center"
            >
              <span>{{$ml.get('pay')}}</span>
              <span class="mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.164 7.165c-1.15.191-1.702 1.233-1.231 2.328.498 1.155 1.921 1.895 3.094 1.603 1.039-.257 1.519-1.252 1.069-2.295-.471-1.095-1.784-1.827-2.932-1.636zm1.484 2.998l.104.229-.219.045-.097-.219c-.226.041-.482.035-.719-.027l-.065-.387c.195.03.438.058.623.02l.125-.041c.221-.109.152-.387-.176-.453-.245-.054-.893-.014-1.135-.552-.136-.304-.035-.621.356-.766l-.108-.239.217-.045.104.229c.159-.026.345-.036.563-.017l.087.383c-.17-.021-.353-.041-.512-.008l-.06.016c-.309.082-.21.375.064.446.453.105.994.139 1.208.612.173.385-.028.648-.36.774zm10.312 1.057l-3.766-8.22c-6.178 4.004-13.007-.318-17.951 4.454l3.765 8.22c5.298-4.492 12.519-.238 17.952-4.454zm-2.803-1.852c-.375.521-.653 1.117-.819 1.741-3.593 1.094-7.891-.201-12.018 1.241-.667-.354-1.503-.576-2.189-.556l-1.135-2.487c.432-.525.772-1.325.918-2.094 3.399-1.226 7.652.155 12.198-1.401.521.346 1.13.597 1.73.721l1.315 2.835zm2.843 5.642c-6.857 3.941-12.399-1.424-19.5 5.99l-4.5-9.97 1.402-1.463 3.807 8.406-.002.007c7.445-5.595 11.195-1.176 18.109-4.563.294.648.565 1.332.684 1.593z"/></svg>
              </span>
              <span>{{deal.total}} грн.</span>
            </a>
          </template>
          <template v-else>
            <p class="text-base text-gray-300 m-3">
                  {{$ml.get('formSended')}} ☎️ 😉
            </p>

            <button
              class="bg-green-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none"
              type="button"
              @click="close"
            >
              {{$ml.get('backTosite')}}
          </button>
          </template>
        </div>
        </template>
      </div>

        </div>
      </div>
    </div>
  </transition>
</template>

<script>

import Inputmask from 'inputmask';
import { required, maxLength } from "vuelidate/lib/validators";
import { mapGetters } from "vuex";

export default {
  data(){
        return{
          firstname: '',
          lastname: '',
          phone: '',
          klass: '',
          subject: '',
          pricePack: '',
          city: '',
          fullForm: false,
          promo: '',
          promoShow: true,
          promoDdiscount: {
            valid: false,
            type: '',
            value: '',
          },
          priceGroup: {
            1: 'indiv',
            2: 'group',
            3: 'online',
          },
          send: false, //нажатие кнопки
          sended: false, //индикатор отправки
          deal: {
            id: '',
            total: '',
          }
        }
    },
    methods: {
      sendForm() {
        if (!this.send) {
          this.send = true;
          axios
            .post('/api/v1/send-lead', this.collectedLead).then(response => {
              if (response.data.success === true) {
                this.sended = true;
                this.deal.id = response.data.id;
                this.deal.total = response.data.total;
              }
            }).catch(err => {
              let e = { ...err    }
              alert('Error! - ' + e.response.data.message)
            });
        }
      },
      close(){
        this.$store.dispatch('TUGGLE_FORM', false);
      },
      setCity() {
        this.$store.dispatch('GET_CITY', {id: this.city, locale: this.$ml.current});
      },
      setPrice() {
        this.$store.dispatch('PUSH_PICE', this.pricePack);
      },
      setSubject() {
        this.$store.dispatch('PUSH_SUBJECT', this.subject);
      },
      updateText(newValue) {
        this.promo = newValue.toUpperCase();
      },
      checkPromo() {
        axios
          .get('/api/v1/check-promo', {params: {promo: this.promo}})
          .then(response => {
            this.promoDdiscount = response.data;
          });
      },
      payLink(u) {
        if (this.$ml.current === 'uk') {
          return '/uk/pay-page?deal=' + u
        } else {
          return '/pay-page?deal=' + u
        }
      }
    },
    computed: {
      ...mapGetters(['formstatus']),
      ...mapGetters(['subjects']),
      ...mapGetters(['prices']),
      ...mapGetters(['cityes']),
      ...mapGetters(['lead']),
      ...mapGetters(['subjectID']),
      ...mapGetters(['cityID']),
      ...mapGetters(['pricePackID']),

      collectedLead() {
        return {
          firstname: this.firstname,
          lastname: this.lastname,
          phone: this.phoneNum,
          cityId: this.city,
          subjectId: this.subject,
          klass: this.klass,
          priceId: this.pricePack,
          cost: this.total,
          discount: this.discount,
          promoStatus: this.promoDdiscount.valid,
          promo: this.promo,
          marker: this.lead.marker,
          fullForm: this.fullForm,
        };
      },
      total() {
        if (this.pricePack) {
          let price = this.prices.find(p => {
            return p.id === this.pricePack
          });
          if (price) {
            let total = this.lead.cityIndex * price.count * price.multipl;
            return total
          }
        }
      },
      discount() {
        if (this.total) {
          // рахуємо знижку з сайта
          let price = this.prices.find(p => {
            return p.id === this.pricePack
          })
          let discount
          if (price.discount > 0) {
            discount = (this.total / 100) * this.lead.cityDiscount
          } else {
            discount = 0
          }
          // рахуємо знижку по промокоду
          if (this.promoDdiscount.valid === 'yes') {
            let pcd
            if (this.promoDdiscount.type === 'percent') {
              pcd = (this.total / 100) * this.promoDdiscount.value
            } else {
              pcd = this.promoDdiscount.value
            }
            discount = discount + pcd
          }
          return discount
        }
      },
      phoneNum: function() {
                var str = this.phone;
                str = str.replace(/[^0-9.]/g, '');
                str = str.substr(2);
                return str;
      },
    },
    mounted() {
        this.$store.dispatch('GET_SUBJECTS', this.$ml.current);
        this.$store.dispatch('GET_PRICES', this.$ml.current);
        var im = new Inputmask('+38 '+'(999) 999-9999');
        im.mask(this.$refs.phone);
    },
    watch: {
      subjectID (newID, oldID) {
        this.subject = newID;
        this.fullForm = true;
      },
      cityID (newID, oldID) {
        this.city = newID;
      },
      pricePackID (newID, oldID) {
        this.pricePack = newID;
        this.fullForm = true;
      },
    },
    validations: {
      phone: {
        required,
        validFormat: val => /^\+38 \(0\d{2}\) \d{3}\-\d{4}$/.test(val),
      },
      firstname: {
        required,
        alpha: val => /^[a-яёії\s]+$/i.test(val),
      },
    },
  }
</script>
