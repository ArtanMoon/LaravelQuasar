<template>
  <q-drawer v-model="drawer" bordered content-class="bg-grey-2">
    <q-list>
      <q-item exact tag="a" clickable :to="{name: 'public.index'}">
        <q-item-section avatar>
          <q-icon name="home" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ $t('page_titles.home_title') }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item :to="{name: 'auth.user'}">
        <q-item-section avatar>
          <q-icon name="account_box" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ $t('page_titles.user_title') }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item :to="{name: 'auth.info'}">
        <q-item-section avatar>
          <q-icon name="info" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ $t('page_titles.info_title') }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item to="/go-error">
        <q-item-section avatar>
          <q-icon name="error" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ $t('page_titles.e404_title') }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item clickable @click="logout($router)">
        <q-item-section avatar>
          <q-icon name="lock" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ $t('page_titles.logout_title') }}</q-item-label>
        </q-item-section>
      </q-item>
    </q-list>
  </q-drawer>
</template>

<script>
export default {
  name: 'SidebarLayout',
  props:
  {
    drawer: Boolean
  }
}
</script>
