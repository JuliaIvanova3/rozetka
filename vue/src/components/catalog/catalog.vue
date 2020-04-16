<template>
    <div class="catalog">
        <h1>{{$t('catalog')}}</h1>
            <notification
                :messages="messages"
                timeout="4000"
            />
        <div class="catalog-content">
        <catalog-item
            v-for="product in filteredProducts" 
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
import notification from '../popup/notification'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'catalog',
    components: {
        CatalogItem,
        notification
    },
    props: {

    },
    data() {
        return {
            //products: [],
            title: 'Catalog',
            selected: 'Catalog',
            sortedProducts: [],
            messages: []
        }
    },
    computed: {
        ...mapGetters([
            'PRODUCTS',
            'SEARCH_VALUE'
        ]),
        filteredProducts() {
            if (this.sortedProducts.length) {
                return this.sortedProducts
            } else {
                return this.PRODUCTS
            }
        }
        
    },
    methods: {
        ...mapActions([
            'GET_PRODUCTS_FROM_API',
            'ADD_TO_CART'
        ]),
        sortProducts () {
            this.sortedProducts = [...this.PRODUCTS]
        },
         addToCart(data) {
            this.ADD_TO_CART(data)
            .then(() => {
                let timeStamp = Date.now().toLocaleString()
                this.messages.unshift(
                    {name: 'Product added to cart', id: timeStamp}
                )
            })
        },
        openProduct(product) {
            this.$router.push({name: 'product', query: {'productId' : product}})
        },
        sortProductsBySearchValue(value) {
            this.sortedProducts = [...this.PRODUCTS]
                if (value) {
                this.sortedProducts = this.sortedProducts.filter(function (item) {
                    return item.title.toLowerCase().includes(value.toLowerCase())
                })
                } else {
                this.sortedProducts = this.PRODUCTS;
                }
        }
    },
    watch: {
        SEARCH_VALUE() {
            console.log('Данные изменились:', this.SEARCH_VALUE)
        this.sortProductsBySearchValue(this.SEARCH_VALUE);
      }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
        this.sortProducts()
        this.sortProductsBySearchValue(this.SEARCH_VALUE);
       
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