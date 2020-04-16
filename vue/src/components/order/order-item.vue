<template>
    <div class="order-item-wrapper">
        <div class="order-item">
            <img class="cart-item-image" :src="require('../../assets/img/' + item_data.image)" alt="img">
            <p> Title product: {{item_data.title}}  </p>
            <p> Price: {{item_data.price}} $ </p>
            <p>Quantity: {{item_data.quantity}}  </p>
        </div>

    </div>
</template>

<script>
export default {
    name: 'order-item',
    props: {
        item_data: {
            type: Object,
            default: ()=> {
                return {}
            }
        }
    }
}
</script>

<style>
.order-item {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 0 8px 0;
    padding: 16px;
    margin-bottom: 16px;
}
.cart-item-image {
    max-width: 70px !important;
    max-height: 80px !important;
}
</style>