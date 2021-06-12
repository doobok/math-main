import Vue from 'vue'
import { MLInstaller, MLCreate, MLanguage } from 'vue-multilanguage'

Vue.use(MLInstaller)

export default new MLCreate({
  initial: 'ru',
  languages: [
    new MLanguage('ru').create({
        search: 'Поиск',
        getTutor: 'Выбрать репетитора',
        review: 'Отзыв',
        personal: 'Индивидуальные занятия',
        group: 'Занятия в группе',
        online: 'Занятия онлайн',
        plesson: 'занятие',
        plessons: 'занятий',
    }),

    new MLanguage('uk').create({
        search: 'Пошук',
        getTutor: 'Обрати репетитора',
        review: 'Відгук',
        personal: 'Індивідуальні заняття',
        group: 'Заняття в групі',
        online: 'Заняття онлайн',
        plesson: 'заняття',
        plessons: 'занять',
    }),

  ]
})
