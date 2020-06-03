<template>
  <q-layout>
    <q-toolbar>
      <q-btn stretch flat round icon="home" :to="{name: 'public.index'}"></q-btn>
      <q-toolbar-title>تستv{{$q.version}} (SPA) by</q-toolbar-title>
      <q-space />
      <lang-manager stretch flat></lang-manager>
      <template v-if="isAuth">
        <q-btn stretch flat :label="$t('page_titles.user_title')" :to="{name: 'auth.user'}"></q-btn>
      </template>
      <template v-else>
        <q-btn stretch flat :to="{name: 'public.login'}" :label="$t('login.title')"></q-btn>
        <q-btn stretch flat :to="{name: 'public.register'}" :label="$t('register.title')"></q-btn>
      </template>
    </q-toolbar>
    <q-page-container>
      <router-view />
    </q-page-container>
    <footer-layout></footer-layout>
  </q-layout>
</template>

<script>
import FooterLayout from '../global/FooterLayout'
import LangManager from '../../components/LangManager'
import { mapGetters } from 'vuex'
export default {
  name: 'PublicLayout',
  components: {
    LangManager,
    FooterLayout
  },
  computed: {
    ...mapGetters('auth', ['isAuth'])
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
