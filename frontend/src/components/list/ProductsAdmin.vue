<template>
  <v-container>
    <v-list-item v-for="product in products" :key="product.id" @click="edit(product.id)">
      <v-list-item-avatar>
          <v-img height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title v-text="product.name" />
          <v-list-item-subtitle v-text="product.author" />
          {{product.description}}
        </v-list-item-content>
    </v-list-item>

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
  }, 
  methods: {
    edit (id) {
      this.$router.push(`/panel/product/${id}`)
    }
  }

})
</script>
