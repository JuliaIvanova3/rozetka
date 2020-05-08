<template>
    <div class="main-wrapper">
         <div class="main-wrapper-main">
            <first-header/>
            <main-header class="static-element"/>
                <div class="main-wrapper-content">
                        <keep-alive>
                            <router-view>
                            </router-view>
                        </keep-alive>
                </div>
            <main-footer class="static-element"/>
        </div>
    </div>
</template>

<script>
import MainHeader from './main-header'
import firstHeader from './first-header'
// import mainHome from './main-home'
import MainFooter from './main-footer.vue'
// import adminPanel from './admin/admin-panel'


export default {
    name: 'main-wrapper',
    components: {
       MainHeader,
       MainFooter,
    //    mainHome,
       firstHeader,
    //    adminPanel
    },
    data() {
        return {
        }
    },
    mounted() {
        
    },
    computed: {
    }
}
</script>

<style >
 .main-wrapper {
    max-width: 1600px;
    margin: 0 auto;
 }
 .main-wrapper-content {
    max-width: 1200px;
    margin: 0 auto;
 }
 
</style>