import Vue from 'vue'
import { MLInstaller, MLCreate, MLanguage } from 'vue-multilanguage'

Vue.use(MLInstaller)

export default new MLCreate({
  initial: 'ru',
  languages: [
    new MLanguage('ru').create({
        search: 'Поиск',
        getTutor: 'Выбрать репетитора',
        connectTutor: 'Связаться с репетитором',
        review: 'Отзыв',
        personal: 'Индивидуальные занятия',
        group: 'Занятия в группе',
        online: 'Занятия онлайн',
        plesson: 'занятие',
        plessons: 'занятий',
        priceCardBtn: 'Купить',
        leadFormTitle: 'Почти готово',
        leadForm1desc: 'Укажите Ваш контактный номер и мы Вам перезвоним',
        leadForm2desc: 'Заполните, пожалуйста, форму. Не все поля в ней являются обязательными, но от полноты указанных данных будет зависеть скорость обработки заявки',
        firstname: 'Имя',
        lastname: 'Фамилия',
        phone: 'Номер телефонa',
        class: 'Класс',
        subject: 'Предмет',
        servicePack: 'Пакет услуг',
        city: 'Город',
        fullForm: 'указать больше информации (полная форма)',
        indiv: 'индивидуальные',
        group: 'групповые',
        online: 'онлайн',
        totalsumm: 'общая стоимость',
        discountsumm: 'экономия',
        getPromo: 'у меня есть промокод',
        promo: 'Промокод',
        set: 'Применить',
        validno: 'Промокод недействителен',
        validyes: 'Поздравляем! Промокод успешно применен',
        selectPrice: 'также не забудьте выбрать пакет услуг, чтобы была применена скидка',
        send: 'Отправить',
        checkField: 'ошибка ввода',
        fillForm: 'Заполните форму',
        formSended: 'Ваша заявка успешно отправлена, уже совсем скоро мы с Вами свяжемся, будьте на связи',
        backTosite: 'Продолжить знакомство с сайтом',
        onlineListTitle: 'Выбери свой регион',
        onlineRoom: 'войти',
        pay: 'оплатить',
        invoiceComp: 'Инвойс на оплату сформирован, для оплаты нажмите на кнопку ниже, вы будете перенаправлены на страницу оплаты.'
    }),

    new MLanguage('uk').create({
        search: 'Пошук',
        getTutor: 'Обрати репетитора',
        connectTutor: 'Звʼязатись з репетитором',
        review: 'Відгук',
        personal: 'Індивідуальні заняття',
        group: 'Заняття в групі',
        online: 'Заняття онлайн',
        plesson: 'заняття',
        plessons: 'занять',
        priceCardBtn: 'Купити',
        leadFormTitle: 'Майже готово',
        leadForm1desc: 'Вкажіть Ваш контактний номер і ми Вам зателефонуємо',
        leadForm2desc: 'Заповніть, будь-ласка, форму. Не усі поля в ній є обовʼязковими, але від повноти вказаних даних буде залежати швидкість обробки заявки',
        firstname: 'Імʼя',
        lastname: 'Прізвище',
        phone: 'Номер телефону',
        class: 'Клас',
        subject: 'Предмет',
        servicePack: 'Пакет послуг',
        city: 'Місто',
        fullForm: 'вказати більше інформації (повна форма)',
        indiv: 'індивідуальні',
        group: 'групові',
        online: 'онлайн',
        totalsumm: 'загальна вартість',
        discountsumm: 'економія',
        getPromo: 'в мене є промокод',
        promo: 'Промокод',
        set: 'Застосувати',
        validno: 'Промокод недійсний',
        validyes: 'Вітаємо! Промокод успішно застосований',
        selectPrice: 'також не забудьте обрати пакет послуг, щоб застосувалась знижка',
        send: 'Відправити',
        checkField: 'помилка вводу',
        fillForm: 'Заповніть форму',
        formSended: 'Ваша заявка успішно відправлена, вже зовсім скоро ми з Вами звʼяжемось, будьте на звʼязку',
        backTosite: 'Продовжити знайомство з сайтом',
        onlineListTitle: 'Обери свій регіон',
        onlineRoom: 'увійти',
        pay: 'оплатити',
        invoiceComp: 'Інвойс на оплату сформовано, для оплати натисніть на кнопку що нижче, вас буде переспрямовано на сторінку оплати.'
    }),

  ]
})
