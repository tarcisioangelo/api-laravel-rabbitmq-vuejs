<template>
  <v-app>
    <Header />
    <v-main class="grey lighten-3">
      <Products />
    </v-main>
  </v-app>
</template>

<script>
// @ is an alias to /src
import Products from '@/components/list/Products.vue';
import Header from '@/components/layout/Header.vue';

export default {
  name: 'Home',
  components: {
    Products,
    Header
  }
}
</script>
