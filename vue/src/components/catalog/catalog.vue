<template>
    <div class="catalog">
        <h1>{{title}}</h1>
        <div class="catalog-content">
        <catalog-item
            v-for="product in PRODUCTS" 
            :key="product.id"
            :product_data="product"
            @addToCart="addToCart"
            @clickProduct="openProduct"
        />
        </div>
    </div>
</template>

<script>

import CatalogItem from './catalog-item'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'catalog',
    components: {
        CatalogItem
    },
    props: {

    },
    data() {
        return {
            products: [],
            title: 'Catalog',
            selected: 'Catalog'
        }
    },
    computed: {
        ...mapGetters([
            'PRODUCTS',
        ])
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
    },
    methods: {
        ...mapActions([
            'GET_PRODUCTS_FROM_API',
            'ADD_TO_CART'
        ]),
         addToCart(data) {
            this.ADD_TO_CART(data)
        },
        openProduct(product) {
            this.$router.push({name: 'product', query: {'productId' : product}})
        }
    }
}
</script>

<style>
.catalog-content {
    display: flex !important;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
</style>