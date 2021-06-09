import Axios from 'axios';

export default {
  state: {
    lead: {
      cityName: '',
      cityID: 0,
      citySlug: '',
      cityIndex: 0,
      name: 'Ilia',

    },
  },
  getters: {
    lead: state => {
      return state.lead;
    }
  },
  mutations: {
    SET_LEAD: (state, payload) => {
      // изменяем только если в памяти браузера чтото нашли
      if (payload) {
        state.lead = payload;
      }
    },
    SAVE_STATE: (state) => {
      writeLead(state.lead);
    },
    SET_CITY: (state, payload) => {
      state.lead.cityName = payload.name;
      state.lead.cityID = payload.id;
      state.lead.citySlug = payload.slug;
      state.lead.cityIndex = payload.money_index;
    },
  },
  actions: {
    GET_ST_DATA : (context, payload) => {
      context.commit('SET_LEAD', loadLead());
    },
    // получение Promo из БД
    GET_CITY : (context, payload) => {
      console.log(payload);
      return Axios.get('/api/v1/get-citybyid', {params: {id: payload}})
      .then((response) => {
        context.commit('SET_CITY', response.data);
        context.commit('SAVE_STATE');
      })
      .catch(error => {
        return error;
      });
    },
  },
}
// извлечение из браузера
function loadLead() {
  let lead;
  if (localStorage.getItem('lead')) {
    try {
      lead = JSON.parse(localStorage.getItem('lead'));
    } catch(e) {
      localStorage.removeItem('lead');
    }
  }
  return lead;
}
// запись в браузер
function writeLead(payload) {
    // сохраняем в браузер пользователя
    const parsed = JSON.stringify(payload);
    // console.log(parsed);
    localStorage.setItem('lead', parsed);
    console.log('saved state');
}
