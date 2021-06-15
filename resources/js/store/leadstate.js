import Axios from 'axios';

export default {
  state: {
    tuggleform: false,
    lead: {
      cityName: '',
      cityID: 0,
      citySlug: '',
      cityIndex: 0,
      cityDiscount: 0,
      name: '',

    },
  },
  getters: {
    formstatus: state => {
      return state.tuggleform;
    },
    lead: state => {
      return state.lead;
    },
  },
  mutations: {
    SET_FORM_STATUS: (state, payload) => {
        state.tuggleform = payload;
    },
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
      state.lead.cityDiscount = payload.discount;
    },
  },
  actions: {
    TUGGLE_FORM : (context, payload) => {
      context.commit('SET_FORM_STATUS', payload);
    },
    GET_ST_DATA : (context, payload) => {
      context.commit('SET_LEAD', loadLead());
    },
    // получение Promo из БД
    GET_CITY : (context, payload) => {
      return Axios.get('/api/v1/get-citybyid', {params: {id: payload.id, locale: payload.locale}})
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
    localStorage.setItem('lead', parsed);
}
