<template>
    <div class="product-page">
        <div class="product-page-content">
            <img v-if="product.image" class="product-page-image" :src="require('../../assets/img/' + product.image)" alt="img">
            <div class="content-product-inside">
                <p> {{product.title}} </p>
                <p> {{product.description}} </p>
                <p> {{product.price}} </p>
                <button class="catalog-item_add btn btn-secondary" 
                    @click="addToCart"
                > Add to cart
                </button>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'product-page',
    props: {},
    data() {
        return {}
    },
   computed: {
        ...mapGetters([
            'PRODUCTS'
        ]),
        product() {
            let result = []
            let vm = this
            this.PRODUCTS.map(function(item) {
                if (item.id == vm.$route.query.productId ) {
                    item.quantity = 1;
                    result = item;
                }
            })
            return result;
        }
    },
    methods: {
        ...mapActions([
            'GET_PRODUCTS_FROM_API',
            'ADD_TO_CART'
        ]),
        addToCart() {
            this.ADD_TO_CART(this.product)
        }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API()
    }
    
}
</script>

<style>
.product-page-content {
    display: flex;
    flex-basis: 30%;
    box-shadow: 0 0 16px 0 #26ae68;
    padding: 16px;
    margin: 16px;
    /* justify-content: space-evenly; */
}
.product-page-image {
    width: 400px;
    height: 400px;
    border : solid 2px #26ae68;
    box-shadow: 0 0 16px 0 #26ae68;
    margin-left: 40px;
}
.content-product-inside {
    padding: 8px;
    margin-left: 100px;

}
.btn {
    background: #26ae68 ;
}
</style>