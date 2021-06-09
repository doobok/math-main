require('./bootstrap');

// мультиязычность
import './ml';

// Vue
window.Vue = require('vue').default;

// валидатор форм
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

// Components
Vue.component('animate-select', require('./components/AnimateSelector.vue').default);
Vue.component('city-select', require('./components/CitySelector.vue').default);

const app = new Vue({
    el: '#app',
});
