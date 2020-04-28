<template>
    <div class="catalog-item">
        <img 
            class="catalog-item-image" 
            :src="require('../../../../storage/app/public/uploads/' + product_data.image)" 
            @click="clickProduct"
            alt="img">
        <p class="catalog-item-title"> {{product_data.title}} </p>
        <p class="catalog-item-price"> {{$t('price')}}: {{product_data.price | toFix | formattedPrice}}  </p>
        <button class="catalog-item_add btn btn-secondary" 
            @click="addToCart"
        > {{$t('addToCart')}}
        </button>
    </div>
</template>

<script>

import toFix from '../../filters/toFixed'
import formattedPrice from '../../filters/price-format'

export default {
    name: 'catalog-item',
    props: {
        product_data: {
            type: Object,
            default(){
                return{}
            }
        }
    },
    data () {
        return {

        }
    },
    filters: {
        toFix,
        formattedPrice
    },
     mounted() {
        
    },
    computed: {

    },
    methods: {
        addToCart() {
            this.$emit('addToCart', this.product_data)
        },
        clickProduct() {
            this.$emit('clickProduct', this.product_data.id)
        }
    } 
}
</script>

<style>
.catalog-item{ 
    flex-basis: 27%;
    box-shadow: 0 0 8px 0;
    padding: 16px;
    margin-bottom: 16px;
}

.catalog-item-image {
    width: 200px;
    height: 200px;
}

svg {
    left: 10px;
}
</style>