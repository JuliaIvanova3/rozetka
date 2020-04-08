import axios from 'axios'

export default {
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
}