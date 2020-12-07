require('./bootstrap');

import VueApexCharts from 'vue-apexcharts';
import CKEditor from '@ckeditor/ckeditor5-vue';

window.Vue = require('vue');

Vue.config.productionTip = false;

Vue.use(VueApexCharts);
Vue.use(CKEditor);

window.events = new Vue();

window.flash = function(message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

Vue.component('apexchart', VueApexCharts);
Vue.component('visitors', require('./components/Visitors.vue').default);
Vue.component('authors', require('./components/Authors.vue').default);
Vue.component('about', require('./components/About.vue').default);
Vue.component('events', require('./components/Events.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('password', require('./components/Password.vue').default);
Vue.component('categories', require('./components/Categories.vue').default);
Vue.component('image-uploader', require('./components/ImageUploader.vue').default);

const app = new Vue({
    el: '#app',
});
