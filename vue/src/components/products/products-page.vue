<template>
    <div class="products-page">
        <h1>Products Page</h1>
        <div class="products-page-content">
            <catalog-item
                v-for="product in products" 
                :key="product.id"
                :product_data="product"
                @addToCart="addToCart"
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
                    //result = Object.assign(item)
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