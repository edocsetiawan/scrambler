// App.js

require('./bootstrap');

import Vue from 'vue'

import VueRouter from 'vue-router';
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

Vue.use(VueMaterial)

import LoginComponent from './components/Login.vue';

const routes = [
    {
        name : 'login',
        path: '/',
        component : LoginComponent
    }
]
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');