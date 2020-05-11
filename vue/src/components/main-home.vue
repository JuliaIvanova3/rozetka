<template>
    <div class="main-home">
        <h1>{{$t('homePage')}}</h1>
        <div class="home-content">
             <div class="card card-default">
            <div class="card-header"> {{$t('homePage')}} </div>
            <div class="card-body" >
              <transition name="fade">
                <div class="loading" v-show="loading">
                    <span>  <fa-icon :icon="['fas', 'spinner']" spin />
                          Loading </span>
                </div>
              </transition>
            
              <catalog-item
                  v-for="product in products" 
                  :key="product.id"
                  :product_data="product"
              />
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import catalogItem from './catalog/catalog-item'
import {mapActions, mapGetters} from 'vuex'
import axios from 'axios'

export default {
    name: 'main-home',
     components: {
      catalogItem
    },
    data() {
        return {
          loading: false,
          products: [],
        }
    },
     computed: {
      ...mapGetters([
        'ORDERS',
        'PRODUCTS'
      ])
    },
    methods: {
      ...mapActions([
        'GET_ORDERS_FROM_API'
      ]),
      load( offset = 0) {
        this.loading = true
        axios.get('http://rozetka.test/api/pageProduct', {
          params: {
              offset: offset
          }
        })
        .then ((response) => {
          this.products = this.products.concat(response.data)
          this.loading = false
        })
      }
    },
    mounted() {
      this.GET_ORDERS_FROM_API();
      this.load();
    const eventHandler = () => {
        const scrollTop = document.documentElement.scrollTop;
        const viewportHeight = window.innerHeight
        const totalHeight = document.documentElement.offsetHeight;
        const atTheBottom = scrollTop + viewportHeight == totalHeight
        if (atTheBottom) {
            this.load(this.products.length);
        }
    }
      document.addEventListener('scroll', eventHandler);
    },
}
</script>

<style scoped>
.home-content {
  margin-bottom: 16px;
}
.card-body {
    display: flex !important;
    flex-wrap: wrap;
    justify-content: space-between !important;
    align-items: center;
    margin: 20px;
    /* overflow: auto; */
}
.loading {
  text-align: center;
  position: absolute;
  color: #ffffff;
  z-index: 9;
  background: #5c4084;
  padding: 8px 18px;
  border-radius: 5px;
  left: calc(50% - 45px);
}
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>