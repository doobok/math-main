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
        priceCardBtn: 'Забронировать',
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
        priceCardBtn: 'Забронювати',
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
    }),

  ]
})
