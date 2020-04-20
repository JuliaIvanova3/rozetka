<template>
    <div class="products-lists">
        <h3>A List of Users</h3>
    <button class="btn btn-secondary" @click="showForm"> Add new product</button>
    
    <form v-if="showmForm" autocomplete="off" @submit.prevent="addProduct" method="post">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="title" id="title" v-model="title">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Description" id="description" v-model="description">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Price" id="price" v-model="price">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Image" id="image" v-model="image">
        <select v-model="selectCategory" class="form-control mb-2 mr-sm-2">
            <option 
                v-for="category in CATEGORIES"
                :key="category.id"
                :value="category.id"
             > {{category.title}} </option>
        </select>
        <button class="btn btn-secondary"> Send Request</button>
    </form>

    <!-- <div class="alert alert-danger" v-if="has_error">
        <p>Error, could not get the list of users.</p>
    </div> -->
    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
        </tr>
        <tr v-for="product in PRODUCTS" v-bind:key="product.id" style="margin-bottom: 5px;">
            <th scope="row">{{ product.id }}</th>
            <td>{{ product.title }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td> {{ product.image }} </td>
            <td> {{ product.category_id }} </td>
        </tr>
    </table>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import axios from 'axios'

export default {
    name:'products-lists',
    computed: {
        ...mapGetters([
            'PRODUCTS',
            'CATEGORIES'
        ])
    },
    data() {
        return {
            product: {},
            title: '',
            description: '',
            price: '',
            image: '',
            selectCategory: 'Category',
            showmForm: false,
        }
    },
    methods: {
        ...mapActions([
            'GET_PRODUCTS_FROM_API',
            'GET_CATEGORIES_FROM_API',
            'SEND_NEW_PRODUCT_TO_API',
            'ADD_FORMDATA_STATE'
        ]),
        showForm() {
            this.showmForm = true;
        },
        addProduct() {
            const formData = new FormData();
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('price', this.price);
            formData.append('image', this.image);
            formData.append('category_id', this.selectCategory);
            console.log(formData)
            axios.post('http://rozetka.test/api/addProduct', formData)
            .then ((response) => {
                console.log(response.data)
            })
        }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
        this.GET_CATEGORIES_FROM_API();
    }

}
</script>

<style>
.btn{
    margin: 8px;
}
</style>