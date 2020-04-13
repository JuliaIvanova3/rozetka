<template>
    <div class="catalog-item">
        <img 
            class="catalog-item-image" 
            :src="require('../../assets/img/' + product_data.image)" 
            @click="clickProduct"
            alt="img">
        <p class="catalog-item-title"> {{product_data.title}} </p>
        <p class="catalog-item-price"> Price: {{product_data.price}} $ </p>
        <button class="catalog-item_add btn btn-secondary" 
            @click="addToCart"
        > Add to cart
        </button>
    </div>
</template>

<script>
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