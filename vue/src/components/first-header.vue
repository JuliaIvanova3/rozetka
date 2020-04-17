<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <ul class="nav navbar-nav d-inline-flex">
            <li class="nav-item">
                <ul class="list-inline-mb-0">
                    <li class="list-inline-item"><a class="nav-link" @click="setLocale('en')">EN</a></li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item"><a class="nav-link" @click="setLocale('ru')">RU</a></li>          
                </ul>
            </li>
        </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" v-if="$auth.check(1)">
          <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
            <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
          </li>
      </ul>
      <ul class="navbar-nav mr-auto" v-if="$auth.check(2)">
          <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
            <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
          </li>
      </ul>
      <ul class="navbar-nav ml-auto" v-if="!$auth.check()">
          <li class="nav-item" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
            <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
          </li>
      </ul>
      <ul class="navbar-nav ml-auto" v-if="$auth.check()">
        <li class="nav-item">
            <router-link class="nav-link" :to="{path: '/dashboard'}"> Dashboard </router-link>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#" @click.prevent="$auth.logout()"> {{$t('logOut')}} </a>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            { name: 'register', path: 'register' },
            { name: 'login', path: 'login'}
          ],
          // LOGGED USER
          user: [
            { name: 'dashboard', path: 'dashboard' }
          ],
        //   // LOGGED ADMIN
        //   admin: [
        //     { name: 'Dashboard', path: 'admin.dashboard' }
        //   ]
        }
      }
    },
    mounted() {
      //
    },
    methods: {
      setLocale(locale) {
        import(`../langs/${locale}.json`).then((msgs) => {
          this.$i18n.setLocaleMessage(locale, msgs)
          this.$i18n.locale = locale
        })
      }
    }
  }
</script>

<style>
.navbar {
    padding-bottom: 6px;
    padding-top: 6px;
}
</style>