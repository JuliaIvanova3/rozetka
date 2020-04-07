import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

let store = new Vuex.Store({
    state: {
        products: []
    },
    mutations: {
        SET_PRODUCT_TO_STATE: (state, products) => {
            state.products = products;
        }
    },
    actions: {
        GET_PRODUCTS_FROM_DB({commit}) {
            return axios('http://rozetka.test/api/products', {
                method: "GET"
            })
            .then ((products) => {
                commit('SET_PRODUCTS_TO_STATE', products);
                return products;
            })
            .catch((error) => {
                console.log(error);
                return error;
            })
        }
    },
    getters: {
        PRODUCTS(state) {
            return state.products;
        }
    }
});

export default store;