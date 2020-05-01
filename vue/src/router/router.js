import Vue from 'vue'
import Router from 'vue-router'

import Catalog from '../components/catalog/catalog'
import Cart from '../components/cart/cart'
import Category from '../components/category/category'
import productsPage from '../components/products/products-page'
import productPage from '../components/products/product-page'
import mainHome from '../components/main-home'
import login from '../components/auth/login'
import register from '../components/auth/register'
import dashboard from '../components/user/dashboard'
import adminDashboard from '../components/admin/admin-dashboard'
import checkout from '../components/cart/checkout'

Vue.use(Router);

const routes = [
        {
            path: '/',
            name: 'home',
            component: mainHome,
            meta: {
                auth: undefined
              }
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart,
            props: true,
            meta: {
                auth: undefined
              }
        },
        {
          path: '/checkout',
          name: 'checkout',
          component: checkout,
          props: true,
          meta: {
              auth: undefined
            }
      },
        {
            path: '/category',
            name: 'category',
            component: Category,
            props: true,
            meta: {
                auth: undefined
              }
        },
        {
            path: '/products',
            name: 'products',
            component: productsPage,
            meta: {
                auth: undefined
              }

        },
        {
            path: '/product',
            name: 'product',
            component: productPage,
            meta: {
                auth: undefined
              }
        },
        {
            path: '/catalog',
            name: 'catalog',
            component: Catalog,
            meta: {
                auth: undefined
              }
        },
        {
            path: '/register',
            name: 'register',
            component: register,
            meta: {
              auth: false
            }
        },
        {
            path: '/login',
            name: 'login',
            component: login,
            meta: {
              auth: false
            }
        },
          // USER ROUTES
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashboard,
            meta: {
              auth: true
            }
        },
        // ADMIN ROUTES
        {
          path: '/admin',
          name: 'admin.dashboard',
          component: adminDashboard,
          meta: {
            auth:true
            // auth: {
            //   roles: 1, 
            //   redirect: {
            //     name: 'login'
            //   }, 
            //   forbiddenRedirect: '/403'
            // }
          }
        },
    ]

const router = new Router({
    history: true,
    mode: 'history',
    routes,
})

export default router;