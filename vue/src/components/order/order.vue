<template>
    <div class="order-wrapper">
        <order-item
            v-for="order in ORDERS"
            :key="order.title"
            :item_data="order"
        />
    </div>
</template>

<script>
import orderItem from './order-item'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'name',
    components: {
        orderItem
    },
    props: {
        order_data: {
            type: Array,
            default: () => {
                return []
            }
        }
    },
    computed: {
        ...mapGetters([
        'ORDERS',
      ]),
    },
    methods: {
        ...mapActions([
        'GET_ORDERS_FROM_API'
      ]),
    },
    mounted() {
        this.GET_ORDERS_FROM_API();
    }
}
</script>

<style>
.order-wrapper {
    width: 600px;
}
</style>