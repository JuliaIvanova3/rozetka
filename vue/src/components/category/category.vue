<template>
    <div class="category">
        <h1> {{title}} </h1>
        <c-select 
            :options="SECTIONS"
            :selected="selected"
            @select="sortByCategories"
        />
        <div class="category-content">
        <category-item
            v-for="category in filteredCategories"
            :key="category.id"
            :category_data="category"
            @categoryClick="categoryGetProducts"
        />
        </div>
    </div>
</template>

<script>

import CategoryItem from './category-item'
import cSelect from '../select/c-select'
import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'category',
    components: {
        CategoryItem,
        cSelect
    },
    props: {
        selectId: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            title: 'CATEGORY',
            selected: 'All',
            sortedCategories: []
        }
    },
    computed: {
        ...mapGetters([
            'CATEGORIES',
            'SECTIONS'
        ]),
        filteredCategories(){
            if(this.sortedCategories.length) {
                return this.sortedCategories
            } else {
                return this.CATEGORIES
            }
        }
    },
    methods: {
        ...mapActions([
            'GET_CATEGORIES_FROM_API',
            'GET_SECTIONS_FROM_API'
        ]),
        sortByCategories(option){
            this.sortedCategories = []
            let vm = this;
            this.CATEGORIES.map(function(item) {
                if (item.section_id == option.id) {
                    vm.sortedCategories.push(item)
                }
            })
            this.selected = option.title
            
        },
        categoryGetProducts(category) {
            this.$router.push({name: 'products', query: {'categoryId' : category}})
        }
    },
    mounted() {
        this.GET_CATEGORIES_FROM_API();
        this.GET_SECTIONS_FROM_API();
    }
}
</script>

<style>
.category-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin: 15px;
}
</style>