export default {
    ADD_TO_CART({commit}, product) {
        commit('SET_CART', product);
        commit('SAVE_CART');
    },
    INCREMENT_CART_ITEM({commit}, index) {
        commit('INCREMENT', index);
        commit('SAVE_CART');
    },
    DECREMENT_CART_ITEM({commit}, index) {
        commit('DECREMENT', index);
        commit('SAVE_CART');
    },
    DELETE_FROM_CART({commit}, index) {
        commit('REMOVE_FROM_CART', index);
        commit('SAVE_CART');
    },
    SAVE_CART_TO_LOCALSTORAGE({commit}) {
        commit('SAVE_CART');
    }
}