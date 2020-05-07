<template>
    <div class="catalog">
        <h1>{{$t('catalog')}}</h1>
            <notification
                :messages="messages"
            />
        <div class="filetrs">
            <div class="range-slider">
                
                <input 
                    type="range" 
                    min="0" 
                    max="10000" 
                    step="10"
                    v-model.number="minPrice"
                    @change="setRangeSlider"
                >
                <input 
                    type="range" 
                    min="0" 
                    max="10000" 
                    step="10"
                    v-model.number="maxPrice"
                    @change="setRangeSlider"
                > 

            </div>
            <div class="range-values">
                <p>Min Price: {{minPrice}} </p>
                <p>Max Price: {{maxPrice}} </p>
            </div>
            <div class="select-filters category">
                <p class="name-select">Category:</p>
                <select v-model="selectCategory"  @change="sortBy(selectCategory)" class="form-control  sm-2" >
                    <option  value="0"> {{all}} </option>
                    <option 
                        v-for="category in CATEGORIES" 
                        :key="category.id"
                        :value="category.id">
                        {{category.title}}
                    </option>
                </select>
            </div>
            <!-- <div class="select-filters section">
                <p class="name-select">Section: </p>
                <select v-model="selectSection" @change="sortBy(selectCategory)"  class="form-control  sm-2" >
                     <option 
                        v-for="section in SECTIONS" 
                        :key="section.id"
                        :value="section.id">
                        {{section.title}}
                    </option>
                </select>
            </div> --> 
        </div>
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
            title: 'Catalog',
            selected: 'Catalog',
            sortedProducts: [],
            messages: [],
            minPrice: 0,
            maxPrice: 10000,
            selectCategory: 0,
            selectSection: 1,
            all: 'All'
        }
    },
    computed: {
        ...mapGetters([
            'PRODUCTS',
            'SEARCH_VALUE',
            'CATEGORIES',
            'SECTIONS'
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
            'ADD_TO_CART',
            'GET_CATEGORIES_FROM_API',
            'GET_SECTIONS_FROM_API'
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
        setRangeSlider() {
            if (this.minPrice > this.maxPrice) {
                let tmp = this.maxPrice;
                this.maxPrice = this.minPrice;
                this.minPrice = tmp;
            }

            this.sortBy();
        },
        sortBy(category) {
            let vm = this;
            this.sortedProducts = [...this.PRODUCTS]
            this.sortedProducts = this.sortedProducts.filter(function (item ){
                return item.price >= vm.minPrice && item.price <= vm.maxPrice
            })

            if (category) {
                this.sortedProducts = this.sortedProducts.filter(function (e) {
                    vm.selectCategory == category
                    return e.category_id == category && e.price >= vm.minPrice && e.price <= vm.maxPrice
                })
            } 
            // else {
            //     this.sortedProducts = this.sortedProducts.filter(function (e) {
            //         return  e.price >= vm.minPrice && e.price <= vm.maxPrice
            //     })
            // }
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
      },
    //   PRODUCTS() {
    //        this.GET_PRODUCTS_FROM_API();
    //   }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
        this.GET_CATEGORIES_FROM_API();
        this.GET_SECTIONS_FROM_API();
        this.sortProducts()
        this.sortProductsBySearchValue(this.SEARCH_VALUE);
        this.sortBy();
       
    }
}
</script>

<style>
.catalog-content {
    display: flex !important;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin: 20px;
}
.filters {
    display: inline !important;
    justify-content: space-between;
    align-items: center;
    margin: 10px;
}

.name-select{
    text-align: start;
    font-weight: bold;
}

.form-control {
    width: 200px !important;
}

.range-slider {
    width: 200px;
    margin: auto 20px;
    text-align: center;
    position: relative;
}
.range-values {
    text-align: start;
    /* margin: 16px; */
    padding: 16px;
}
.range-slider svg, .range-slider input[type=range] {
    position: absolute;
    left: 0;
    bottom: 0;
}

input[type=range]::-webkit-slider-thumb {
    z-index: 2;
    position: relative;
    top: 2px;
    margin-top: -7px;
}
</style>