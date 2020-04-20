import Vue from 'vue'
import Vuex from 'vuex'

import commonActions from './actions/actions'
import apiRequest from './actions/api-request'
import mutations from './mutations/mutations'
import getters from './getters/getters'

const actions = {...commonActions, ...apiRequest}

Vue.use(Vuex)

let cart = window.localStorage.getItem('cart');

let store = new Vuex.Store({
    state: {
        searchValue: '',
        products: [],
        cart: cart ? JSON.parse(cart) : [],
        sections: [],
        categories: [],
        orders: [],
        user: {},
        list: [],
        users: [],
        formDataProduct: ''
    },
    mutations,
    actions,
    getters
});

export default store;