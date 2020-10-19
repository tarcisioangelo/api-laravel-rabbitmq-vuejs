<template>
  <v-app>
    <Header />
    <v-main>
      <CardPurchase v-bind:product="product" />
    </v-main>
  </v-app>
</template>

<script>
import Header from '@/components/layout/Header.vue';
import CardProduct from '@/components/cards/CardProduct.vue';
import CardPurchase from '@/components/cards/CardPurchase.vue';
import ServiceProducts from '../services/products'

export default {
  name: 'Home',
  components: {
    Header,
    CardProduct,
    CardPurchase
  },
  data () {
    return {
      product: null
    }
  },
  mounted () {
    ServiceProducts.productLoad(this.$route.params.id).then(response => {
      this.product = response
    }).catch(error => {
      console.error(error)
    })
  }
}
</script>
