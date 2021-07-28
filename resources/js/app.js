require('./bootstrap');

// мультиязычность
import './ml';

// Vue
window.Vue = require('vue').default;

// store
import store from './store/index';

// валидатор форм
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

// Components
Vue.component('animate-select', require('./components/AnimateSelector.vue').default);
Vue.component('city-select', require('./components/CitySelector.vue').default);
Vue.component('reviews-carousel', require('./components/ReviewsCarousel.vue').default);
Vue.component('tutors-carousel', require('./components/TutorsCarousel.vue').default);
Vue.component('prices-cards', require('./components/PricesCards.vue').default);
Vue.component('lead-form', require('./components/LeadForm.vue').default);
Vue.component('smpl-button', require('./components/SimpleButton.vue').default);
Vue.component('online-button', require('./components/OnlineList.vue').default);

const app = new Vue({
    el: '#app',
    store
});
