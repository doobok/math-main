import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

import leadstate from './leadstate'

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    leadstate,
  }
})
