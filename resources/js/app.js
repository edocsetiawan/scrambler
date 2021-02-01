// App.js

require('./bootstrap');

import Vue from 'vue'

import VueRouter from 'vue-router';
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

import LoginComponent from './components/Login.vue';
import LandingComponent from './components/LandingPage.vue';
import GameComponent from './components/Game.vue';
import RegisterComponent from './components/RegisterPage.vue';

const routes = [
    {
        name : 'login',
        path: '/',
        component : LoginComponent
    },
    {
        name : 'landingpage',
        path: '/landingpage',
        component : LandingComponent
    },
    {
        name : 'gamepage',
        path : '/gamepage',
        component : GameComponent
    },
    {
        name : 'register',
        path : '/register',
        component : RegisterComponent
    }

]
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');