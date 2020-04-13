<template>
    <div class="cart">
        <h1>Cart</h1>
        <p v-if="!CART.length"> There are no products ... </p>
        <cart-item
            v-for="(item, index) in CART"
            :key="item.id"
            :cart_item_data="item"
            @deleteFromCart="deleteFromCart(index)"
            @decrement="decrement(index)"
            @increment="increment(index)"
        />
        <div class="cart-total">
            <p>Total:  </p>
            <p>{{cartTotalCost}} $</p>
        </div>
    </div>
</template>

<script>

import CartItem from './cart-item'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'cart',
    components: {
        CartItem
    },
    props: {
    },
    data() {
        return{}
    },
    computed: {
        ...mapGetters([
            'CART'
        ]),
        cartTotalCost() {
            let result = []

            if (this.CART.length) {

                for (let item of this.CART) {
                    result.push(item.price * item.quantity);
                }

                result = result.reduce(function (sum, el) {
                    return sum + el
                })

                return result;

            } else {
                return 0
            }
        }
    },
    methods: {
        ...mapActions([
            'DELETE_FROM_CART',
            'INCREMENT_CART_ITEM',
            'DECREMENT_CART_ITEM'
        ]),
        deleteFromCart(index) {
            this.DELETE_FROM_CART(index)
        },
        decrement(index) {
            this.DECREMENT_CART_ITEM(index)
        },
        increment(index) {
            this.INCREMENT_CART_ITEM(index)
        }
    }
}
</script>

<style>
.cart-total {
    position: relative;
    bottom: 0;
    right: 0;
    left: 0;
    padding: 12px;
    display: flex;
    justify-content: center;
    background: #26ae68;
    color: #ffffff;
    font-size: 20px;
}
</style>