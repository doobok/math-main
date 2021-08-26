import Axios from 'axios';

export default {
  state: {
    subjects: [],
    prices: [],
    cityes: [],
    tuggleform: false,
    lead: {
      cityName: '',
      cityID: '',
      citySlug: '',
      cityIndex: 0,
      cityDiscount: 0,
      marker: '',
      type: '',
      price: '',
      subjectID: '',
      pricePackID: '',

    },
  },
  getters: {
    formstatus: state => {
      return state.tuggleform;
    },
    lead: state => {
      return state.lead;
    },
    subjects: state => {
      return state.subjects;
    },
    prices: state => {
      return state.prices;
    },
    cityes: state => {
      return state.cityes;
    },
    // for wathers
    subjectID: state => {
      return state.lead.subjectID;
    },
    cityID: state => {
      return state.lead.cityID;
    },
    pricePackID: state => {
      return state.lead.pricePackID;
    },
    leadType: state => {
      return state.lead.type;
    },
    leadCustomPrice: state => {
      return state.lead.price;
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
    SET_SUBJECTS: (state, payload) => {
      state.subjects = payload;
    },
    SET_PRICES: (state, payload) => {
      state.prices = payload;
    },
    SET_CITYES: (state, payload) => {
      state.cityes = payload;
    },
    SET_MARKER: (state, payload) => {
        state.lead.marker = payload;
    },
    SET_TYPE: (state, payload) => {
        state.lead.type = payload;
    },
    SET_SUBJECT: (state, payload) => {
      state.lead.subjectID = payload;
    },
    SET_CUSTOM_PRICE: (state, payload) => {
      state.lead.price = payload;
    },
    SET_PICE: (state, payload) => {
      state.lead.pricePackID = payload;
    },
  },
  actions: {
    TUGGLE_FORM : (context, payload) => {
      context.commit('SET_FORM_STATUS', payload);
    },
    GET_ST_DATA : (context, payload) => {
      context.commit('SET_LEAD', loadLead());
    },
    // получение Города по id
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
    // получение Предметов
    GET_SUBJECTS : (context, payload) => {
      return Axios.get('/api/v1/get-subjects-names', {params: {locale: payload}})
      .then((response) => {
        context.commit('SET_SUBJECTS', response.data);
      })
      .catch(error => {
        return error;
      });
    },
    // получение Предметов
    GET_PRICES : (context, payload) => {
      return Axios.get('/api/v1/get-prices-list', {params: {locale: payload}})
      .then((response) => {
        context.commit('SET_PRICES', response.data);
      })
      .catch(error => {
        return error;
      });
    },
    // получение Городов
    GET_CITYES : (context, payload) => {
      return Axios.get('/api/v1/get-cityes', {params: {locale: payload}})
      .then((response) => {
        context.commit('SET_CITYES', response.data);
      })
      .catch(error => {
        return error;
      });
    },
    PUSH_MARKER : (context, payload) => {
      context.commit('SET_MARKER', payload.marker);
      context.commit('SET_TYPE', payload.type);
    },
    PUSH_SUBJECT : (context, payload) => {
      context.commit('SET_SUBJECT', payload);
      context.commit('SAVE_STATE');
    },
    PUSH_CUSTOM_PRICE : (context, payload) => {
      context.commit('SET_CUSTOM_PRICE', payload);
      context.commit('SAVE_STATE');
    },
    PUSH_PICE : (context, payload) => {
      context.commit('SET_PICE', payload);
      context.commit('SAVE_STATE');
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
