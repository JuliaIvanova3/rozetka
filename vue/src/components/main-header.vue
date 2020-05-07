<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <dropdown-list
            v-if="filteredValues && modal"
            :list_data=filteredValues
            @chooseItem="setSearchValue"
            @closeDropdown="closeDropdown"
        />
        <router-link :to="{name: 'home'}">
        <a class="navbar-brand">
        <svg class="bi bi-house-door" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
        </svg>
        R O Z E T K A</a>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                   <button class="catalog btn btn-secondary" 
                        @click="goToCatalog"
                    > {{$t('catalog')}}
                    </button>
                </li>
            </ul>


            <div class="input-group sm">
            <input 
                type="text" 
                class="form-control input" 
                v-model="searchValue" 
                :placeholder="[[ $t('lookingFor') ]]" 
                @input="onChangeValue"
                autocomplete="off"
                @focus="modal = true"
            >
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" @click="clearSearchField" > 
                    <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                    </svg>
                 </button>
            </div>
            <button class="btn btn-outline-secondary" @click="search(searchValue)" type="button" id="button-addon2">{{$t('search')}}</button>
            </div>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="bi bi-heart" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item link-to-cart">
                <router-link :to="{name: 'cart'}">
                <a class="nav-link">
                    <svg class="bi bi-inbox-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.81 4.063A1.5 1.5 0 014.98 3.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H4.98a.5.5 0 00-.39.188L.89 9.312a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M.125 8.67A.5.5 0 01.5 8.5h5A.5.5 0 016 9c0 .828.625 2 2 2s2-1.172 2-2a.5.5 0 01.5-.5h5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                    </svg>
                </a>
                </router-link>
            </li>
            <li class="nav-item">
                 <a class="nav-link">
                <p> {{CART.length}} </p>
                 </a>
            </li>
            </ul>
        </div>
</nav>
</template>

<script>
import { mapGetters, mapActions} from 'vuex'
import dropdownList from './popup/dropdown-list'

export default {
    name: 'main-header',
    components: {
        dropdownList
    },
    data() {
        return {
            title: 'rozetka',
            searchValue: '',
            filteredValues: [],
            modal: false
        }
    },
    computed: {
        ...mapGetters([
            'CART',
            'SEARCH_VALUE',
            'PRODUCTS'
        ]),
       
    },
    methods: {
        ...mapActions([
            'GET_SEARCH_VALUE_TO_VUEX',
            'GET_PRODUCTS_FROM_API'
        ]),
        goToCatalog() {
            this.$router.push({name: 'category'})
        },
        search(value) {
            this.GET_SEARCH_VALUE_TO_VUEX(value);
            if (this.$route.path !== '/catalog') {
            this.$router.push('/catalog');
            }

            console.log(this.SEARCH_VALUE)
        },
        clearSearchField() {
            this.searchValue = ''
            this.GET_SEARCH_VALUE_TO_VUEX();
            if (this.$route.path !== '/catalog') {
            this.$router.push('/catalog');
            }
        },
        onChangeValue(){
            if (this.searchValue.length == 0) {
                this.filteredValues = null
            } else if (this.searchValue.length >= 3){
            this.filteredValues = this.PRODUCTS.filter(item => {
                return item.title.toLowerCase().startsWith(this.searchValue.toLowerCase());
            })
            }
        },
        setSearchValue(item){
            this.searchValue = item;
            this.modal = false
        },
        closeDropdown() {
            this.modal = false;
        }
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API();
        this.onChangeValue();
    },
    watch: {
        searchValue() {
            this.onChangeValue();
        }
    }
}
</script>
<style scoped>

.input-group {
    margin-bottom: 0px !important;
    width: 800px !important;
}

.link-to-cart {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
}

.input {
    margin:8px 0px 8px 0px;
}
.btn {
    margin: 8px 0px 8px 0px !important;
}

</style>
