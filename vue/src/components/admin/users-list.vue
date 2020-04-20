<template>
<div>
    <h3>A List of Users</h3>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, could not get the list of users.</p>
    </div>
    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date created</th>
            <th scope="col">Role</th>
        </tr>
        <tr v-for="user in USERS" v-bind:key="user.id" style="margin-bottom: 5px;">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.created_at}}</td>
            <td> {{ user.role}} </td>
        </tr>
    </table>
</div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'users_list',
    data() {
        return {
            has_error: false,
        }
    },
    computed: {
        ...mapGetters([
            'USERS'
        ])
    },
    methods: {
        ...mapActions([
            'GET_USERS_FROM_API'
        ])
    },
    mounted() {
        this.GET_USERS_FROM_API();
    }
}
</script>