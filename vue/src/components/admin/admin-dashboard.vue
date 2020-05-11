<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header"> {{$t('adminDashboard')}} </div>
            <div class="card-body">
                <div class="dymanic-component">
                    <!-- <div class="dymanic-button">
                        <button class="dymanic-component-button" @click="switchComponent('usersList')">Users</button>
                        <button class="dymanic-component-button" @click="switchComponent('productsList')">Products</button>
                    </div> -->
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
    props: {
        component: {
            type: String,
            default: () => 'usersList'
        }
    },
    data() {
        return {
            currTabComponent: this.component
        }
    },
    methods: {
        switchComponent() {
            this.currTabComponent = this.component
        }
    },
    mounted() {
    },
    watch: {
        component() {
            this.switchComponent();
        }
    }
}
</script>

<style>

</style>