<template>
    <div class="products-page">
        <h1> {{$t('productsPage')}} </h1>
        <p v-if="!products.length"> Product in this category is absence </p>
        <div class="products-page-content">
            <catalog-item
                v-for="product in products" 
                :key="product.id"
                :product_data="product"
                @addToCart="addToCart"
                @clickProduct="openProduct"
            />
        </div>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import catalogItem from '../catalog/catalog-item'

export default {
    name: 'products-page',
    components: {
        catalogItem
    },
    props: {},
    data() {
        return {}
    },
    computed: {
        ...mapGetters([
            'PRODUCTS'
        ]),
        products() {
            let result = []
            let vm = this
            this.PRODUCTS.map(function(item) {
                if (item.category_id == vm.$route.query.categoryId ) {
                   result.push(item)
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
        addToCart(data) {
            this.ADD_TO_CART(data)
            //console.log(data)
        },
        openProduct(product) {
            this.$router.push({name: 'product', query: {'productId' : product}})
        }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API()
    }
}
</script>

<style>
.products-page-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
</style>