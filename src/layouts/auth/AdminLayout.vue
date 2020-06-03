<template>
  <q-layout>
    <q-header elevated class>
      <q-toolbar>
        <q-btn flat dense round @click="drawer = !drawer" aria-label="Menu">
          <q-icon name="menu" />
        </q-btn>

        <q-toolbar-title>نمونه کد vue با کوثر ورژن{{$q.version}}</q-toolbar-title>
      </q-toolbar>
    </q-header>
    <SidebarLayoutT1 :drawer="drawer"></SidebarLayoutT1>
    <q-page-container>
      <router-view />
    </q-page-container>
    <FooterLayout></FooterLayout>
  </q-layout>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { Loading } from 'quasar'
import FooterLayout from '../global/FooterLayout'
import SidebarLayoutT1 from '../auth/SidebarLayoutT1'
// import SidebarLayout from '../auth/SidebarLayout'
export default {
  preFetch ({ store, currentRoute, previousRoute, redirect, ssrContext }) {
    Loading.show()
    return store
      .dispatch('auth/getUserData')
      .then(response => {
        if (!store.getters['auth/isAuth']) {
          return redirect(`/login?redirect=${currentRoute.fullPath}`)
        }
      })
      .catch(errors => {
        return redirect(`/login?redirect=${currentRoute.fullPath}`)
      })
      .then(() => {
        Loading.hide()
      })
  },
  name: 'AdminLayout',
  components: {
    FooterLayout,
    SidebarLayoutT1
    // SidebarLayout
  },
  computed: {
    ...mapGetters('auth', ['username', 'email'])
  },
  methods: {
    ...mapActions('auth', ['logout'])
  },
  data () {
    return {
      drawer: false
    }
  }
}
</script>

<style scoped>
.q-toolbar {
  background-image: linear-gradient(145deg, #004c8f 11%, #026fce 75%);
  background-image: -webkit-linear-gradient(145deg, #004c8f 11%, #026fce 75%);
  background-image: -o-linear-gradient(145deg, #004c8f 11%, #026fce 75%);
  background-image: -moz-linear-gradient(145deg, #004c8f 11%, #026fce 75%);
  color: white;
  font-family: 'Shabnam';
}
</style>
