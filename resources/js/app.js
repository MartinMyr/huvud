/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
import VueApexCharts from 'vue-apexcharts'

window.Vue = require('vue').default;

Vue.use(Buefy);
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)
Vue.component('register', require('./components/RegisterComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);
Vue.component('chart', require('./components/Chart.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
});
