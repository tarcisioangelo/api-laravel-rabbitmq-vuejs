<template>
 <router-link :to="{ path: `/product/${product.id}` }">
    <v-card class="mx-auto my-12" max-width="374" style="min-height: 400px;">
      <v-img height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>

      <v-card-title>{{ product.name }}</v-card-title>

      <v-card-actions>
        <div>{{ priceBR }}</div>
      </v-card-actions>

    </v-card>
  </router-link>
</template>


<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'CardProduct',
  props: ['product'],
  computed: {
    priceBR () {
      var p = this.product ? parseFloat(this.product.price) : 0
      return p.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' })
    }
  }
  
})
</script>
