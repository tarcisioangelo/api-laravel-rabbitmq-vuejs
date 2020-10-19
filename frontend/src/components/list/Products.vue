<template>
  <v-container>
    <v-row class="text-center">
      <v-col class="mb-4">
        <h1 class="display-2 font-weight-bold mb-3">
          Lista de Produtos
        </h1>
      </v-col>
    </v-row>

    <v-row class="text-center">
      <v-col class="mb-4" v-for="product in products" :key="product.id">
        <CardProduct v-bind:product="product" />
      </v-col>
    </v-row>

  </v-container>
</template>

<script lang="ts">
import Vue from 'vue'
import CardProduct from '../cards/CardProduct.vue'
import ServiceProducts from '../../services/products'

export default Vue.extend({
  name: 'Home',

  components: {
    CardProduct
  },
  data () {
    return {
      products: null
    }
  },
  mounted () {
    ServiceProducts.productList().then(response => {
      this.products = response
    }).catch(error => {
      console.error(error)
    })
  }

})
</script>
