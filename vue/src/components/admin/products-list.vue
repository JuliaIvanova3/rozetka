<template>
    <div class="products-lists">
        <h3>A List of Products</h3>
        <edit-product
            v-if="shownModal"
            @close="closeModal"
            :title="editedTitle" 
            :description="editedDescription"
            :price="editedPrice"
            :image="editedImage"
            :category="editedCategory"
            :categoryId="editedCategoryId"
            :categories="propsCaterogies"
            @update="updateProduct"
        />
    <button class="btn btn-secondary" v-if="showBtn" @click="showForm"> Add new product</button>
    <transition name="fade">
    <form v-if="showmForm" autocomplete="off" @submit.prevent="addProduct" method="post">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="title" id="title" v-model="title">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Description" id="description" v-model="description">
        <input class="form-control mb-2 mr-sm-2" type="text" placeholder="Price" id="price" v-model="price">
        <input class="form-control mb-2 mr-sm-2" type="file" placeholder="Image" id="file" ref="file" v-on:change="handleFileUpload()" >
        <select v-model="selectCategory" class="form-control mb-2 mr-sm-2">
            <option 
                v-for="category in CATEGORIES"
                :key="category.id"
                :value="category.id"
             > {{category.title}} </option>
        </select>
        <button class="btn btn-secondary"> Send Request</button>
    </form>
    </transition>
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
            <th scope="col">Actions</th>
        </tr>
        <tr v-for="product in PRODUCTS" v-bind:key="product.id" style="margin-bottom: 5px;">
            <th scope="row">{{ product.id }}</th>
            <td>{{ product.title }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td> {{ product.image }} </td>
            <td> {{ product.category }} </td>
            <td>
                <svg @click="editProduct(product)" class="bi bi-pencil text-success" width="25px" height="25px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                </svg>

                <svg @click="deleteProduct(product.id)" class="bi bi-trash text-danger" width="25px" height="25px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                </svg>
            </td>
        </tr>
    </table>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import axios from 'axios'
import editProduct from '../popup/edit-product'

export default {
    name:'products-lists',
    components: {
        editProduct
    },
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
            file: '',
            selectCategory: 'Category',
            showmForm: false,
            showBtn: true,
            shownModal: false,
            editedId: '',
            editedTitle: '',
            editedDescription: '',
            editedPrice: '',
            editedImage: '',
            editedCategory: '',
            editedCategoryId: '',
            propsCaterogies: []
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
            this.showBtn = false;
        },
        addProduct() {
            const formData = new FormData();
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('price', this.price);
            formData.append('image', this.file);
            formData.append('category_id', this.selectCategory);
            console.log(formData)
            axios.post('http://rozetka.test/api/addProduct', 
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
            )
            .then ((response) => {
                console.log(response.data)
                this.GET_PRODUCTS_FROM_API();
            })

            this.showmForm = false;
            this.showBtn = true;
            this.title = ''
            this.description = ''
            this.price = ''
            this.file = ''
            this.selectCategory = ''
            
        },
        handleFileUpload() {
            this.file = this.$refs.file.files[0];
        },
        closeModal() {
            this.shownModal = false;
        },
        deleteProduct(id) {
            console.log(id)
            axios.post('http://rozetka.test/api/deleteProduct', {
                id: id
            })
            .then ((response) => {
                console.log(response)
                this.GET_PRODUCTS_FROM_API();
            })
        },
        editProduct(product) {
            this.shownModal = true;
            this.editedTitle = product.title
            this.editedDescription = product.description
            this.editedPrice = product.price
            this.editedImage = product.image
            this.editedCategory = product.category
            this.editedCategoryId = product.category_id
            this.editedId = product.id
            this.propsCaterogies = [...this.CATEGORIES];
        },
        updateProduct(data) {
           console.log(data)
            this.shownModal = false;
            axios.post('http://rozetka.test/api/updateProduct/'+ this.editedId, 
                data
            )
            .then((response) => {
                console.log(response)
                 this.GET_PRODUCTS_FROM_API();
            })
            .catch(function (error) {
                console.log(error);
            });
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
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>