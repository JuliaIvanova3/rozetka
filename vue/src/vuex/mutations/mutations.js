export default {
    SET_PRODUCTS_TO_STATE: (state, products) => {
        state.products = products;
    },
    SET_SECTIONS_TO_STATE: (state, sections) => {
        state.sections = sections;
    },
    SET_CATEGORIES_TO_STATE: (state, categories) => {
        state.categories = categories;
    },
    SET_CART: (state, product) => {
        if ( state.cart.length) {
            let isProductExists = false;
            state.cart.map(function(item){
                if (item.id === product.id) {
                    console.log(item.quantity)
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