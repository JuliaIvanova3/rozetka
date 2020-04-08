<template>
    <div class="category-item">
        <img class="category-item-image" :src="require('../../assets/img/category/' + category_data.id + '.jpg')" alt="img">
        <p> {{category_data.title}} </p>
        <p> {{category_data.section_id}} </p>
    </div>
</template>

<script>
export default {
    name: 'category-item',
    props: {
        category_data: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    data() {
        return {}
    },
    computed: {},
    methods: {},
    mounted() {}
}
</script>

<style>
.category-item {
    display: flex;
    flex-basis: 30%;
    box-shadow: 0 0 8px 0;
    padding: 16px;
    margin-bottom: 16px;
    justify-content: space-between;
}

.category-item-image{
    widows: 150px;
    height: 150px;
}
</style>