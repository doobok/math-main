require('./../bootstrap');

// Vue
window.Vue = require('vue').default;

// Components
Vue.component('tag-asistant', require('./components/TagAsistant.vue').default);
Vue.component('tag-asistant-elm', require('./components/TagAsistantElm.vue').default);


const app = new Vue({
    el: '#dash',
});
