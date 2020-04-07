<template>
    <div class="main-wrapper">
        {{title}}
        <catalog/>
    </div>
</template>

<script>

import Catalog from './catalog'
export default {
    name: 'main-wrapper',
    components: {
       Catalog
    },
    data() {
        return {
            title: 'Main wrapper'
        }
    },
    mounted() {
    }
}
</script>

<style >
 .main-wrapper {
     max-width: 1200px;
     margin: 0 auto;
 }
</style>