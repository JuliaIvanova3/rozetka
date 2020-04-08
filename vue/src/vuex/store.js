import Vue from 'vue'
import Vuex from 'vuex'

import commonActions from './actions/actions'
import apiRequest from './actions/api-request'
import mutations from './mutations/mutations'
import getters from './getters/getters'

const actions = {...commonActions, ...apiRequest}

Vue.use(Vuex)

let store = new Vuex.Store({
    state: {
        products: [],
        cart: [],
        sections: [],
        categories: []
    },
    mutations,
    actions,
    getters
});

export default store;