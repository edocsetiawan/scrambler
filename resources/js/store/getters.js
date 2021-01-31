import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const defaultValue = {
    token : null
}

const state = JSON.parse(window.localStorage.getItem(localStoreName)) || defaultValue

const mutations = {
    setTokenUser(state,value){
        state.TokenUser = value;
    }
}

export default new Vuex.Store({
    state,
    mutations
})