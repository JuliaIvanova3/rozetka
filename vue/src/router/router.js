import Vue from 'vue'
import Router from 'vue-router'

import Catalog from '../components/catalog/catalog'
import Cart from '../components/cart/cart'
import Category from '../components/category/category'
import productsPage from '../components/products/products-page'
import productPage from '../components/products/product-page'

Vue.use(Router);

let router = new Router( {
    routes: [
        {
            path: '/',
            name: 'catalog',
            component: Catalog
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
        }
    ]
})

export default router;