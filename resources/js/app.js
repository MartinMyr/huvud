/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Vue from 'vue';
import Echarts from 'vue-echarts';

import 'echarts/lib/chart/bar';



window.Vue = require('vue').default;

Vue.use(Buefy);

Vue.component('register', require('./components/RegisterComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);
Vue.component('chart', require('./components/Chart.vue').default);
Vue.component('logs', require('./components/Logs.vue').default);
Vue.component('echart', Echarts);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
});
