<template>
    <div class="cart-item">
        <img class="cart-item-image" :src="require('../../../../storage/app/public/uploads/' + cart_item_data.image)" alt="img">
        <div class="cart-item-info">
            <p> {{cart_item_data.title}} </p>
            <p> {{cart_item_data.description}} </p>
            <p> {{cart_item_data.price |toFix | formatedPrice}} </p>
        </div>
        <div class="cart-item-quantity">
            <p> Quantity: </p>
            <span>
                <span class="quantity-bth" @click="decrementItem"> - </span>
                {{cart_item_data.quantity}}
                <span class="quantity-bth" @click="incrementItem"> + </span>
            </span>
        </div>
        <button class="btn btn-secondary"
            @click="deleteFromCart"
        > Delete 
        </button>
    </div>
</template>

<script>

import toFix from '../../filters/toFixed'
import formatedPrice from '../../filters/price-format'

export default {
    name: 'cart-item',
    props: {
        cart_item_data: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    data() {
        return{}
    },
    filters: {
        toFix,
        formatedPrice
    },
    computed: {},
    methods: {
        deleteFromCart() {
            this.$emit('deleteFromCart')
        },
        decrementItem() {
            this.$emit('decrement')
        },
        incrementItem() {
            this.$emit('increment')
        }
    },
    mounted() {
        //this.$set(this.cart_item_data, 'guantity', 1)
    }
}
</script>

<style>
.cart-item {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 0 8px 0;
    padding: 16px;
    margin-bottom: 16px;
}
.cart-item-image {
    max-width: 70px;
}
.quantity-bth {
    cursor: pointer;
}
</style>