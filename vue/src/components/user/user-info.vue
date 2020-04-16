<template>
    <div class="user-info">
        <p>Your name: {{USER.name}} </p>
        <p>Your email: {{USER.email}} </p>
    </div>
</template>

<script>

import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'user-info',
    computed: {
        ...mapGetters([
            'USER'
        ])
    },
    methods: {
        ...mapActions([
            'GET_USER_FROM_API'
        ])
    },
    mounted() {
        this.GET_USER_FROM_API();
    }
}
</script>