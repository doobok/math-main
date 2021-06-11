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
    }),

    new MLanguage('uk').create({
        search: 'Пошук',
        getTutor: 'Обрати репетитора',
        review: 'Відгук',
    }),

  ]
})
