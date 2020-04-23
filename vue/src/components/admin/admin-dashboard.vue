<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Admin Dashboard</div>
            <div class="card-body">
                <div class="dymanic-component">
                    <div class="dymanic-button">
                        <button class="dymanic-component-button" @click="switchComponent('usersList')">Users</button>
                        <button class="dymanic-component-button" @click="switchComponent('productsList')">Products</button>
                    </div>
                     <div class="dymanic-component-body">
                        <keep-alive>
                            <component :is="currTabComponent"></component>
                         </keep-alive>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import productsList from './products-list'
import usersList from './users-list'

export default {
    name: 'admin-dashboard',
    components: {
        productsList,
        usersList
    },
    data() {
        return {
            currTabComponent: 'usersList'
        }
    },
    methods: {
        switchComponent(component) {
            this.currTabComponent = component
        }
    },
    mounted() {
    }
}
</script>