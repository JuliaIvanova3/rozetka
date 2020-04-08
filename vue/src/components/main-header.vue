<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <router-link :to="{name: 'catalog'}">
        <a class="navbar-brand">
        <svg class="bi bi-house-door" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
        </svg>
        R O Z E T K A</a>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                   <button class="catalog btn btn-secondary" 
                        @click="goToCatalog"
                    > Catalog
                    </button>
                </li>
            </ul>


            <div class="input-group sm">
            <input type="text" class="form-control" placeholder="What are you looking for ...." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
            </div>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="bi bi-heart" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item link-to-cart">
                <router-link :to="{name: 'cart', params: {cart_data: CART}}">
                <a class="nav-link">
                    <svg class="bi bi-inbox-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.81 4.063A1.5 1.5 0 014.98 3.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H4.98a.5.5 0 00-.39.188L.89 9.312a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M.125 8.67A.5.5 0 01.5 8.5h5A.5.5 0 016 9c0 .828.625 2 2 2s2-1.172 2-2a.5.5 0 01.5-.5h5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                    </svg>
                </a>
                </router-link>
            </li>
            <li class="nav-item">
                 <a class="nav-link">
                <p> {{CART.length}} </p>
                 </a>
            </li>
            </ul>
        </div>
</nav>
</template>

<script>

import {mapGetters} from 'vuex'


export default {
    name: 'main-header',
    data() {
        return {
            title: 'rozetka',
        }
    },
    computed: {
        ...mapGetters([
            'CART',
        ])
    },
    methods: {
        goToCatalog() {
            this.$router.push({name: 'category'})
        }
    }
}
</script>
<style scoped>

.input-group {
    margin-bottom: 0px !important;
    width: 800px !important;
}

.link-to-cart {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
}

</style>
