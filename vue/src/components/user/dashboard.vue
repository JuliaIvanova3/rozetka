<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
              <div class="dymanic-component">
                <div class="button-component">
                  <button class="dymanic-component-button" @click="switchComponent('userInfo')">Info</button>
                  <button class="dymanic-component-button" @click="switchComponent('order')">Orders</button>
                </div>
                <div class="dymanic-component-body">
                   <component :is="currTabComponent"></component>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>
<script>

import order from '../order/order'
import userInfo from './user-info'

  export default {
    name: 'dashboard',
    components: {
      order,
      userInfo
    },
    data() {
      return {
        currTabComponent: 'userInfo',
      }
    },
    computed: {
    },
    methods: {
      switchComponent(component) {
        this.currTabComponent = component;
      }
    },
    mounted() {
   }
  }
</script>

<style>
.dymanic-component {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  
}
.dymanic-component-button {
  background: #f0f0f0 !important;
  padding: 6px 10px;
  border: 1px solid #ccc;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  cursor: pointer;
}
.dymanic-component-body {
  display: flex;
  border: 1px solid #ccc;
  padding: 10px;
  width: 800px !important;
}
</style>