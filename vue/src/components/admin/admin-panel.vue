<template>
    <div class="admin-panel-wrapper">
        <first-header/>
        <div class="row">
        <div class="col-md-2 bg-dark sidebar">
            <admin-sidebar
                @switch="switchComponent"
            />
        </div>
        <div class="col-md-10  content">
            <admin-dashboard
                :component="component"
            />
        </div>
        </div>
    
    </div>
</template>

<script>

import adminSidebar from './admin-sidebar'
import adminDashboard from './admin-dashboard'
import firstHeader from '../first-header'

export default {
    name: 'admin-panel',
    data() {
        return {
            component: 'usersList'
        }
    },
    components: {
        adminSidebar,
        adminDashboard,
        firstHeader
    },
    methods: {
        switchComponent(data)
        {
            this.component = data
        }
    }
}
</script>

<style>
/* .admin-panel-wrapper {

} */
/* .content-panel {
    position: fixed;
  height: 100vh;
} */
.sidebar {
  position: fixed;
  height: 100vh;
}
.content {
    position: fixed;
  height: 100vh;
}

</style>