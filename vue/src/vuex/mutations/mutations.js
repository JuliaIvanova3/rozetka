export default {
    SET_USER_TO_STATE: (state, user) => {
        state.user = user;
    },
    SET_SEARCH_VALUE_TO_VUEX: (state, value) => {
        state.searchValue = value;
    },
    SET_PRODUCTS_TO_STATE: (state, products) => {
        products.map(function(item) {
            item.quantity = 1;
        });
        state.products = products;
    },
    SET_SECTIONS_TO_STATE: (state, sections) => {
        state.sections = sections;
    },
    SET_CATEGORIES_TO_STATE: (state, categories) => {
        state.categories = categories;
    },
    SET_ORDERS_TO_STATE: (state, orders) => {
        state.orders = orders;
    },
    SET_LIST: (state, product) => {
            let count = 0;
            state.list.map(function (item) {
                if(item.id === product.id) {
                    count++
                }
            })
            if (!count) {
                state.list.push(product);
            }
    },
    SET_CART: (state, product) => {
        if ( state.cart.length) {
            let isProductExists = false;
            state.cart.map(function(item){
                if (item.id === product.id) {
                    isProductExists = true
                    item.quantity++
                   
                }
            })
            if (!isProductExists) {
                state.cart.push(product)
            }
        } else {
            state.cart.push(product);
        }

        console.log('Todos changed!');
    },
    REMOVE_FROM_LIST: (state, product) => {
        let index = state.list.indexOf(product)
        console.log(index)
    },
    SAVE_CART: (state) => {
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
    },
    REMOVE_FROM_CART: (state, index) => {
        state.cart.splice(index, 1);
    },
    INCREMENT: (state, index) => {
        state.cart[index].quantity++
    },
    DECREMENT: (state, index) => {
        if (state.cart[index].quantity > 1) {
            state.cart[index].quantity--
        }
    }
}