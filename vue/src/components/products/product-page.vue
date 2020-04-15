<template>
    <div class="product-page">
        <div class="product-page-content">
            <img v-if="product.image" class="product-page-image" :src="require('../../assets/img/' + product.image)" alt="img">
            <div class="content-product-inside">
                <p> {{product.title}} </p>
                <p> {{product.description}} </p>
                <p> {{$t('price')}}: {{product.price}}$ </p>
                <button class="catalog-item_add btn btn-secondary" 
                    @click="addToCart"
                > {{$t('addToCart')}}
                </button>
            </div>
            <div class="content-other">
                <div class="heart" v-if="shownHeart" @click="addToList">
                    <svg class="bi bi-heart" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="heart-fill" v-else @click="removeFromList">
                    <svg class="bi bi-heart-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                    </svg>
                </div>
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
        return {
            shownHeart: true
        }
    },
   computed: {
        ...mapGetters([
            'PRODUCTS',
            'LIST'
        ]),
        product() {
            let result = []
            let vm = this
            this.PRODUCTS.map(function(item) {
                if (item.id == vm.$route.query.productId ) {
                    result = item;
                }
            })
            return result;
        }
    },
    methods: {
        ...mapActions([
            'GET_PRODUCTS_FROM_API',
            'ADD_TO_CART',
            'ADD_TO_LIST',
            'REMOVE_FROM_LIST'
        ]),
        addToCart() {
            this.ADD_TO_CART(this.product);
            
        },
        addToList() {
            this.ADD_TO_LIST(this.product);
            console.log(this.LIST)
            this.shownHeart = ! this.shownHeart;
        },
        removeFromList() {
            this.REMOVE_FROM_LIST(this.product);
            console.log(this.LIST)
            this.shownHeart = ! this.shownHeart;
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