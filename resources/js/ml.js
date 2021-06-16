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
    }),

  ]
})
