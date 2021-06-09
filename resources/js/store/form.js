import Axios from 'axios';

export default {
  state: {
    cityname: '',

    articles: [],
    relevants: [],
    na: [],
  },
  getters: {
    ARTICLES (state) {
      return state.articles
    },
    cityname: state => {
      return state.cityname;
    }
  },
  mutations: {
    SET_CITY: (state, payload) => {
      state.cityname = payload.name;
      console.log('name ' + payload.name);
    },
    // создание состояния
    SET_ARTICLES: (state, payload) => {
      state.articles = payload;
    },
  },
  actions: {
    // получение Promo из БД
    GET_CITY : (context, payload) => {
      console.log(payload);
      return Axios.get('/api/v1/get-citybyid', {params: {id: findCityID()}})
      .then((response) => {
        context.commit('SET_CITY', response.data);
        // context.commit('CALC_PROMO');
        // return response.data
      })
      .catch(error => {
        return error;
      });
    },

  },
}

function findCityID() {
  // проверяем наличие идентификатора
  let cityID;
  if (localStorage.getItem('cityID')) {
    try {
      cityID = JSON.parse(localStorage.getItem('cityID'));
    } catch(e) {
      localStorage.removeItem('cityID');
    }
  } else {
    // если не обнаружен получаем из бд
    Axios.get('/api/v1/get-city')
      .then(response => {
        cityID = response.data.id;
        // сохраняем в браузер пользователя
        const parsed = JSON.stringify(cityID);
        // console.log(parsed);
        localStorage.setItem('cityID', parsed);
      });
  };

  return cityID;
}
