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
Vue.component('smpl-buttoncrs', require('./components/SimpleButtonCourse.vue').default);
Vue.component('online-button', require('./components/OnlineList.vue').default);
Vue.component('tutor-button', require('./components/GetTutor.vue').default);
Vue.component('star-rating', require('./components/StarRating.vue').default);
Vue.component('refer-balance', require('./components/ReferBalance.vue').default);
Vue.component('blog-list', require('./components/BlogList.vue').default);
Vue.component('lang-detector', require('./components/LanguageDetector.vue').default);

const app = new Vue({
    el: '#app',
    store
});
