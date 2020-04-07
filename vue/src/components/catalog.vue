<template>
    <div class="catalog">
        <catalog-item
            v-for="product in products" 
            :key="product.id"
            :product_data="product"
            @sendId="showChildren"
        />
    </div>
</template>

<script>

import CatalogItem from './catalog-item'
import axios from 'axios'
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
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts () {
            axios.get('http://rozetka.test/api/products').then((response) => {
                console.log(response.data)
                this.products = response.data
            })
        },
        showChildren(data) {
            console.log(data)
        }
    }
}
</script>

<style>
.catalog {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
</style>