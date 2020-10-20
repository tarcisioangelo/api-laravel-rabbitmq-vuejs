<template>
  <v-app>
    <Header />
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <router-link to="/panel/product" tag="button">
              <v-btn text>
                  <span class="mr-2">Novo Produto</span>
              </v-btn>
            </router-link>
          </v-col>

          <v-col>
            <v-sheet min-height="70vh" rounded="lg">
               <Products />
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
// @ is an alias to /src
import Products from '@/components/list/ProductsAdmin.vue';
import Header from '@/components/layout/Header.vue';

export default {
  name: 'Home',
  components: {
    Products,
    Header
  }
}
</script>
