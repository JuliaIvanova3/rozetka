<template>
    <div class="categories-list-wrapper">
        <h2> List of categories </h2>
        <div class="add-newcategory float-left">
            <p @click="openAddForm">
                <fa-icon :icon="['fa', 'plus-circle']" class="text-primary"></fa-icon>
                Add new category
            </p>
            <p v-if="errors.length" class="text text-danger" >
                <b>Please correct the indicated errors:</b>
                <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
            </p>
            <form class="form-group" v-if="shownAddForm" @submit.prevent="addCategory">
                <input type="text" v-model="titleInput" class="form-control mb-2 mr-sm-2" placeholder="Title">
                <select class="form-control mb-2 mr-sm-2" v-model="sectionSelected">
                    <option disabled value=""> {{category}} </option>
                    <option v-for="section in SECTIONS"
                            :key="section.id"
                            :value="section.id"
                    > {{section.title}}
                    </option>
                </select>
                <button class="btn btn-secondary"> Send Request</button>
            </form>
        </div>
        <table class="table">
            <tr>
                <th srope="col">Id</th>
                <th srope="col">Tile</th>
                <th srope="col">Section</th>
                <th srope="col">Actions</th>
            </tr>
            <tr v-for="category in CATEGORIES" :key="category.id" style="margin-bottom: 5px;">
                <td> {{category.id}} </td>   
                <td v-if="shownEdit != category.id"> {{category.title}} </td>   
                
                <td v-if="shownEdit == category.id"> <input type="text" v-model="titleEdit" class="form-control mb-2 mr-sm-2" :class="'title-'+ category.id"> 
                    <div v-if="shownError" class="text-danger error"> {{titleError}}  </div>
                </td>

                <td v-if="shownEdit != category.id"> {{category.section}} </td> 

                <td v-if="shownEdit == category.id"> <select class="form-control mb-2 mr-sm-2" v-model="sectionEdit">
                        <option disabled value=""> {{editedcategory}} </option>
                        <option v-for="section in SECTIONS"
                                :key="section.id"
                                :value="section.id"
                        > {{section.title}}
                        </option>
                    </select> 
                </td>
                <td>
                    <fa-icon :icon="['fa', 'pencil-alt']" v-if="shownEdit != category.id" @click="editItem(category)" class="text-success" style="margin: 3px"/>
                    <fa-icon :icon="['fa', 'check-circle']"  v-if="shownEdit == category.id" @click="updateItem(category.id)" class="text-success" style="margin: 3px"/>
                    <fa-icon :icon="['fa', 'trash-alt']"   @click="deleteItem(category.id)" class="text-danger" style="margin: 3px" />
                </td>
            </tr>
        </table>
    </div>
</template>

<script>

import {mapActions, mapGetters} from 'vuex'
import axios from 'axios'

export default {
    name: 'categories-list',
    data() {
        return {
            titleInput: '',
            sectionSelected: '',
            shownAddForm: false,
            category: 'Category',
            errors: [],
            shownEdit: 0,
            titleEdit: '',
            sectionEdit: '',
            editedcategory: '',
            titleError: '',
            shownError: false
        }
    },
    computed: {
        ...mapGetters([
            'CATEGORIES',
            'SECTIONS'
        ])
    },
    methods: {
        ...mapActions([
            'GET_CATEGORIES_FROM_API',
            'GET_SECTIONS_FROM_API'
        ]),
        openAddForm() {
            this.shownAddForm = !this.shownAddForm;
            this.titleInput = ''
            this.sectionSelected = ''
            this.errors = [];
        },
        addCategory() {
            this.errors = [];

            // if (!this.titleInput) {
            //     this.errors.push("Title required");
            // }

            // if (!this.sectionSelected) {
            //     this.errors.push("Section required");
            // }

            if (!this.errors.length) {

                const formData = new FormData();
                formData.append('title', this.titleInput);
                formData.append('section_id', this.sectionSelected);
                console.log(formData);

                axios.post('http://rozetka.test/api/addCategory',
                formData, 
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then ((response) => {
                    console.log(response.data)
                    this.GET_CATEGORIES_FROM_API();
                })
                .catch((error) =>  {
                    const errors = error.response.data.errors
                    // const firstItem = Object.keys(errors)[0]
                    // const firstItemMessage = errors[firstItem][0]
                    // errors.filter((item) => {
                    //     const firstItem = Object.keys(item)[0]
                    //     const firstItemMessage = item[firstItem][0]
                    //     this.errors.push(firstItemMessage);
                    // })
                    console.log(errors)
                })

                this.titleInput = ''
                this.sectionSelected = ''
            }
        },
        deleteItem (id) {
            console.log(id)
            axios.post('http://rozetka.test/api/deleteCategory/'+ id)
            .then((response) => {
                console.log(response.data)
                this.GET_CATEGORIES_FROM_API();
            })
        },
        editItem (data) {
            this.titleEdit = data.title
            this.editedcategory = data.section
            this.sectionEdit = data.section_id

            this.shownEdit = data.id
        },
        updateItem (id) {
            const formData = new FormData();
            formData.append('title', this.titleEdit)
            formData.append('section_id', this.sectionEdit)
            
            axios.post('http://rozetka.test/api/updateCategory/'+id, formData)
            .then((response) => {
                console.log(response.data)
                this.GET_CATEGORIES_FROM_API();
                this.shownEdit = 0
            })
            .catch((error) =>  {
                const errors = error.response.data.errors
                console.log(errors)
                const firstItem = Object.keys(errors)[0]
                this.titleError = errors[firstItem][0]
                this.shownError = true
                // firstItemDOM.scrollIntoView();

                // const errorsMessage = document.querySelector('.text-danger')
                // errorsMessage.forEach((element) => element.textContent = '')

                // firstItemDOM.insertAdjacentHTML('afterend',`<div class="text-danger"> ${firstItemMessage} </div>`)
                // firstItemDOM.classList.add('border', 'border-danger')
            })

        }
    },
    mounted() {
        this.GET_CATEGORIES_FROM_API();
        this.GET_SECTIONS_FROM_API();
    }
    
}
</script>

<style scoped>
.error {
    font-size: 12px;
}
</style>