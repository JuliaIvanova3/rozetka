<template>
    <div class="admin-sidebar-wrapper bg-dark\">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <p>
                        <svg class="bi bi-house-door" width="25px" height="25px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                        </svg>
                        <span>R O Z E T K A</span>
                    </p>
                </li>
                <hr/>
                <li class="nav-item" :class="{ active: isActive('usersList') }" @click="switchComponent('usersList')">
                    <p  class="p-content" >
                        <span>
                             <span class="float-left" ><fa-icon :icon="['fa','user-friends']"  />
                            User </span>
                            <fa-icon :icon="['fa','angle-right']" class="float-right" />
                        </span>
                    </p>
                </li>
                <li class="nav-item"  :class="{ active: isActive('productsList') }" @click="switchComponent('productsList')">
                    <p class="p-content" >
                        <span>
                            <span class="float-left"><fa-icon :icon="['fa','box-open']"  />
                            Product   </span>
                            <fa-icon :icon="['fa','angle-right']" class="float-right"/>
                        </span>
                    </p>
                </li>
                <li class="nav-item"  :class="{ active: isActive('categoriesList') }" @click="switchComponent('productsList')">
                    <p class="p-content" >
                        <span>
                            <span class="float-left"><fa-icon :icon="['fa','list-alt']"  />
                            Categories   </span>
                            <fa-icon :icon="['fa','angle-right']" class="float-right"/>
                        </span>
                    </p>
                </li>    
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'admin-sidebar',
    data() {
        return {
            component: {
                type: String,
                default: () => {}
            }
        }
    },
    methods: {
        switchComponent(data) {
            this.component = data;
            this.$emit('switch', this.component);
        },
        isActive (data) {
            if (data == this.component) {
                return true;
            }
            return false;
        }
    }
}
</script>

<style>
.admin-sidebar-wrapper {
    color: honeydew;
}
hr {
    border: 0;
    clear:both;
    display:block;
    width: 100%;               
    background-color: white;
    height: 1px;
}
.p-content :hover {
    background: white;
    color: darkviolet;
}
.active {
    background: white;
    color: darkviolet;
}
</style>