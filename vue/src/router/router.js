import Vue from 'vue'
import Router from 'vue-router'

import Catalog from '../components/catalog/catalog'
import Cart from '../components/cart/cart'
import Category from '../components/category/category'
import productsPage from '../components/products/products-page'
import productPage from '../components/products/product-page'
import mainHome from '../components/main-home'

Vue.use(Router);

let router = new Router( {
    routes: [
        {
            path: '/',
            name: 'home',
            component: mainHome
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart,
            props: true
        },
        {
            path: '/category',
            name: 'category',
            component: Category,
            props: true
        },
        {
            path: '/products',
            name: 'products',
            component: productsPage

        },
        {
            path: '/product',
            name: 'product',
            component: productPage
        },
        {
            path: '/catalog',
            name: 'catalog',
            component: Catalog
        }
    ]
})

export default router;