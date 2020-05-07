<template>
    <div class="dropdown-list">
        <div class="dropdown-list-content" @click="close"></div>
        <div class="list-wrapper">
        <ul class="list-group">
            <li class="li-content list-group-item" 
                v-for="data in list_data" 
                :key="data.id"
                @click="chooseItem(data.title)"
            >
                {{data.title}}
            </li>
        </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'dropdown-list',
    props:{
        list_data: {
            type: Object,
            default: () => {}
        }
    },
    methods: {
        chooseItem(item) {
            this.$emit('chooseItem', item);
        },
        close()
        {
            this.$emit('closeDropdown');
        }
    }

}
</script>

<style>
.dropdown-list {
    position: absolute;
    top: 65px;
    margin-left: 428px;
    width: 670px;   
}
.li-content {
    background: gray !important;
    color: white !important;
    overflow: sroll;
}
.list-group-item {
    padding: 6px;
}
</style>