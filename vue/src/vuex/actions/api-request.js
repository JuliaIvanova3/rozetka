import axios from 'axios'

export default {
    GET_USER_FROM_API({commit}) {
        return axios('http://rozetka.test/api/auth/user', {
            method: "GET"
        })
        .then ((user) => {
            commit('SET_USER_TO_STATE', user.data.data);
            return user;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_PRODUCTS_FROM_API({commit}) {
        return axios('http://rozetka.test/api/products', {
            method: "GET"
        })
        .then ((products) => {
            commit('SET_PRODUCTS_TO_STATE', products.data);
            return products;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_SECTIONS_FROM_API({commit}) {
        return axios('http://rozetka.test/api/sections', {
            method: "GET"
        })
        .then ((sections) => {
            commit('SET_SECTIONS_TO_STATE', sections.data);
            return sections;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_CATEGORIES_FROM_API({commit}) {
        return axios('http://rozetka.test/api/categories', {
            method: "GET"
        })
        .then ((categories) => {
            commit('SET_CATEGORIES_TO_STATE', categories.data);
            return categories;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_ORDERS_FROM_API({commit}) {
        return axios('http://rozetka.test/api/ordersByUser', {
            method: 'GET'
        })
        .then ((orders) => {
            commit('SET_ORDERS_TO_STATE', orders.data);
            return orders.data;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_USERS_FROM_API ({commit}) {
        return axios('http://rozetka.test/api/users', {
            method: 'GET'
        })
        .then ((users) => {
            commit('SET_USERS_TO_STATE', users.data);
            return users;
        })
        .catch((error) => {
            console.log(error);
            return error;
        })
    },
    SEND_CART_TO_API({commit}) {
        this.state.cart.map((item) => {
            console.log('item:', item.id)
            console.log('quantity', item.quantity)

            axios.post('http://rozetka.test/api/addOrder', {
                productId: item.id,
                quantProduct: item.quantity
            })
            .then (( response) => {
                console.log(response.data)
            })

            window.localStorage.setItem('cart', []);
            commit('CLEAR_STATE_CART');
        })
    },
    SEND_NEW_PRODUCT_TO_API () {
        let form =  this.state.formDataProduct
        axios.post('http://rozetka.test/api/addProduct', {
           form
        })
        .then ((response) => {
            console.log(response.data)
        })
    }
}