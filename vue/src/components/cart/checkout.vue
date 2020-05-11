<template>
    <div class="checkout-wrapper">
            <div class="container">
                <div class="card card-default">
                    <div class="card-header">
                        CheckOut
                        <!-- <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: isActive('checkoutDataUser') }"  @click="switchComponent('checkoutDataUser')"> data user</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: isActive('checkoutDelivery') }" @click="switchComponent('checkoutDelivery')">Delivery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: isActive('checkoutPayment') }" @click="switchComponent('checkoutPayment')">Payment</a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="card-body">
                        <!-- <component :is="currTabComponent"></component> -->
                        <p v-if="errors.length" class="text text-danger" >
                            <b>Please correct the indicated errors:</b>
                            <ul>
                            <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </p>
                        <section class="checkout data-user d-flex justify-content-start">
                            <h4 class="check-step-title">
                            <span class="check-step-number">1</span>
                            <span class="check-step-title-content"> Contact data </span>
                            </h4>
                            <div class="inside-section">
                                <div class="form-inline">
                                    <p>Name</p>
                                    <input type="text" class="form-control" v-model="nameInput">
                                </div>
                                 <div class="form-inline">
                                    <p>E-mail</p>
                                    <input type="text" class="form-control" v-model="emailInput">
                                </div>
                                <div class="form-inline">
                                    <p>City</p>
                                    <!-- <input type="text" class="form-control" v-model="cityInput"> -->
                                    <select v-model="selectedCity" class="form-control mb-2 mr-sm-2">
                                        <option  value=""> {{placeHolderCity}} </option>
                                        <option 
                                            v-for="(city, index) in cities"
                                            :key="index"
                                            :value="city"
                                        > {{city.city}}
                                        </option>
                                    </select>

                                </div>
                                <div class="form-inline">
                                    <p>Phone</p>
                                    <input type="text" class="form-control" v-model="phoneInput" placeholder="(000) 000-00-00">
                                </div>
                            </div>
                             <div class="google-maps">
                                    <google-map
                                        :marker="selectedCity"
                                    />
                                </div>
                        </section>
                        <hr>
                        <section class="checkout delivery d-flex justify-content-start" >
                            <h4 class="check-step-title">
                            <span class="check-step-number">2</span>
                            <span class="check-step-title-content"> Order </span>
                            </h4>
                            <div class="inside-section">
                                <table class="table">
                                <router-link :to="{name: 'cart'}">
                                    <button class="btn btn-success"> Change Order </button>
                                </router-link>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                    <tr v-for="item in CART" v-bind:key="item.id">
                                        <td>
                                            <img class="cart-item-image" :src="require('../../../../storage/app/public/uploads/' + item.image)" alt="img">
                                        </td>
                                        <td> {{item.title}} </td>
                                        <td> {{item.quantity}} pc </td>
                                        <td> {{item.price| toFix}} </td>
                                    </tr>
                                </table>
                                <p> <strong> Total Price:</strong> {{cartTotalCost | toFix}} </p>
                            </div>
                        </section>
                        <hr>
                        <section class="checkout payment d-flex justify-content-start">
                            <h4 class="check-step-title">
                            <span class="check-step-number">3</span>
                            <span class="check-step-title-content"> Delivery </span>
                            </h4>
                            <div class="inside-section">
                                <input type="radio" :value="radioBtn1" v-model="radioBthSelected"> {{radioBtn1}}
                                <br/>
                                <input type="radio" :value="radioBtn2" v-model="radioBthSelected"> {{radioBtn2}}
                            </div>
                        </section>
                        <hr>
                        <!-- <section class="checkout payment d-flex justify-content-start">
                            <h4 class="check-step-title">
                            <span class="check-step-number">4</span>
                            <span class="check-step-title-content"> Payment </span>
                            </h4>
                             <div ref="paypal"></div>
                        </section> -->
                        <button class="btn btn-success"
                                @click="checkForm"
                        > Pay </button>
                         <div ref="paypal"></div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>

// import checkoutDataUser from './checkout-item/checkout-data-user'
// import checkoutDelivery from './checkout-item/checkout-delivery'
// import checkoutPayment from './checkout-item/checkout-payment'
import {mapGetters, mapActions} from 'vuex'
import toFix from '../../filters/toFixed'
import maps from '../../maps'
import googleMap from '../google-map'

export default {
    name: 'checkout',
    props:['totalCost'],
    components: {
        // checkoutDataUser,
        // checkoutDelivery,
        // checkoutPayment
        googleMap
    },
    data() {
        return {
            // currTabComponent: 'checkoutDataUser',
            nameInput: this.$auth.user().name,
            emailInput: this.$auth.user().email,
            cityInput: null,
            phoneInput: null,
            loaded: false,
            radioBtn1: 'Pickup',
            radioBtn2: 'Delivery Post',
            radioBthSelected: '',
            errors: [],
            cities: maps.cities,
            selectedCity: '',
            placeHolderCity: 'Choose your city'
        }
    },
    filters: { 
        toFix,
        //formatedPrice
    },
    computed: {
        ...mapGetters([
            'CART'
        ]),
        paypalDescription () {
            let result =  []
            this.CART.filter(function (item) {
                result.push(item.title)
            })
            return result;
        },
        cartTotalCost() {
            let result = []

            if (this.CART.length) {

                for (let item of this.CART) {
                    result.push(item.price * item.quantity);
                }

                result = result.reduce(function (sum, el) {
                    return sum + el
                })

                return result;

            } else {
                return 0
            }
        }
    },
    methods: {
        // switchComponent(data) {
        //     this.currTabComponent = data;
        // },
        // isActive(data) {
        //     return this.currTabComponent === data
        // }
        ...mapActions([
            'GET_ORDERS_FROM_API',
            'SEND_CART_TO_API'
        ]),
        setLoaded: function() {
            this.loaded = true;
            window.paypal
                .Buttons({
                createOrder: (data, actions) => {
                    return actions.order.create({
                    purchase_units: [
                        {
                        amount: {
                            currency_code: "USD",
                            value: this.cartTotalCost.toFixed(2)
                        }
                        }
                    ]
                    });
                },
                onApprove: async (data, actions) => {
                    const order = await actions.order.capture();
                    //this.paidFor = true;
                    console.log(order);
                    this.redirectToDashBoard();
                },
                onError: err => {
                    console.log(err);
                }
                })
                .render(this.$refs.paypal);
        },
        redirectToDashBoard() {
            this.$router.push({name: 'dashboard'});
            this.GET_ORDERS_FROM_API();
            this.SEND_CART_TO_API();
            this.cityInput = null,
            this.phoneInput = null,
            this.radioBthSelected =  ''
        },
        checkForm () {
            this.errors = [];

            if (!this.selectedCity) {
                this.errors.push(" City required");
            }

            if (!this.phoneInput) {
                this.errors.push("Phone required");
            }

            if (!this.radioBthSelected) {
                this.errors.push("Choose ways of delivery");
            }

            if (!this.errors.length) {
                this.createPayment();
            }
        },
        createPayment() {
            const script = document.createElement("script");
            script.src =
            "https://www.paypal.com/sdk/js?client-id=AWAF4jjr7lDoxUZCqjIqYJPIRgep4Kp5tJ8NZWHAbjvIp0KP_GoB-edzcmDq0EzrGM0BaDsE5xE-gDB1";
            script.addEventListener("load", this.setLoaded);
            document.body.appendChild(script);
        }
    },
    mounted() {
        console.log(this.cities)
        console.log(this.paypalDescription);
    }

}
</script>

<style>
.card-body {
    display: block !important;
    align-items:baseline !important;
    justify-content: start!important;

}

.form-inline {
     margin: 10px;
     padding: 8px;
}
p {
    margin-right: 10px;
}
.check-step-title {
    position: relative;
    margin-bottom: 23px;
}
.check-step-number {
    position: absolute;
    /* top: -4px;
    left: -46px; */
    width: 29px;
    border: 1px solid #3da8dd;
    line-height: 1.8125rem;
    border-radius: 50%;
    font-size: 1.0625rem;
    text-align: center;
}
.check-step-title-content {
    margin-right: 14px;
    margin-left: 35px;
    line-height: 1.5rem;
}
</style>