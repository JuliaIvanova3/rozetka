<template>
    <div class="cart">
        <h1>Cart</h1>
        <modal 
            v-if="showmModal"
            @redirect="redirectToDashBoard"
            @close="closeModal"
        />
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
            <div class="total-text">
                <p> {{$t('total')}}:  {{cartTotalCost | toFix | formatedPrice}} </p>
            </div>
            <!-- <div class="total-button">
                <button 
                    class="btn btn-secondary"
                    @click="sendData"
                > Check Out </button>
            </div> -->
            <router-link :to="{name: 'checkout', params: { totalCost: cartTotalCost } }">
            <button 
                    class="btn btn-primary"
                > Check Out </button>
            </router-link>
        </div>
    </div>
</template>

<script>

import CartItem from './cart-item'
import modal from '../popup/modal'
import toFix from '../../filters/toFixed'
import formatedPrice from '../../filters/price-format'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'cart',
    components: {
        CartItem,
        modal
    },
    props: {
    },
    data() {
        return{
            showmModal: false
        }
    },
    filters: { 
        toFix,
        formatedPrice
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
            'DECREMENT_CART_ITEM',
            'SEND_CART_TO_API',
            'GET_ORDERS_FROM_API'
        ]),
        deleteFromCart(index) {
            this.DELETE_FROM_CART(index)
        },
        decrement(index) {
            this.DECREMENT_CART_ITEM(index)
        },
        increment(index) {
            this.INCREMENT_CART_ITEM(index)
        },
        sendData() {
            this.SEND_CART_TO_API();
            this.showmModal = true
        },
        redirectToDashBoard() {
            this.$router.push('/dashboard');
            this.showmModal = false;
        },
        closeModal() {
             this.showmModal = false;
        }
    },
    mounted() {
        this.showmModal = false;
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
    /* justify-content:space-between; */
    background: #26ae68;
    color: #ffffff;
    font-size: 20px;
}
.total-text {
    padding: 8px;
    margin: 8px;
}
.total-button {
    padding: 8px;
    margin: 8px;
}

</style>