<template>
    <div class="c-select">
        <p 
            class="title"
            @click="areOptionsVisible = !areOptionsVisible"
        >{{selected}}</p>
        <div 
            class="options"
            v-if="areOptionsVisible"
        >
            <p
                v-for="option in options"
                :key="option.id"
                :value="option.id"
                @click="selectOption(option)"
            >
            {{option.title}}
            </p>
        </div>
    </div>
</template>

<script>

export default {
    name: 'c-select',
    props: {
        options: {
            type: Array,
            default() {
                return []
            }
        },
        selected: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            title: 'Custom Select',
            areOptionsVisible: false
        }
    },
    computed: {
    },
    methods: {
        selectOption(option) {
            this.$emit('select', option)
            this.areOptionsVisible = false
        },
        hideSelect() {
            this.areOptionsVisible = false
        }
    },
    mounted() {
        document.addEventListener('click', this.hideSelect.bind(this), true)
    },
    beforeDestroy() {
        document.removeEventListener('click', this.hideSelect)
    }
}
</script>

<style>
.c-select{
    position: relative;
    width: 150px;
    cursor: pointer;
}
.c-select p {
    margin: 0;
}
.c-select .title {
    border: solid 1px #aeaeae;
}
.c-select .options {
    border: solid 1px #aeaeae;
    position: absolute;
    top: 30px;
    right: 0;
    width: 100%;
    background: #ffffff;
    color: black;
}
.options p:hover{
    background: #26ae68;
    color: #ffffff;
}
</style>