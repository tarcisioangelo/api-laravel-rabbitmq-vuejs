<template>
  <div style="display: flex; padding: 0px 100px;" v-if="product">
    <div style="width: 400px;">
      <v-card class="mx-auto my-12" max-width="374" style="min-height: 400px;">
        <v-img
          height="250"
          src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
        ></v-img>
        <v-card-title>{{ product.name }}</v-card-title>
        <v-card-actions>
          <div>{{ priceBR }} (unidade)</div>
        </v-card-actions>
      </v-card>
    </div>
    <div style="flex-grow: 1;">
      <v-card class="mx-auto my-12" style="min-height: 400px;">
        <v-card-title>Dados de Pagamento</v-card-title>
        <v-card-text>
          <div>Descrição: {{ product.description }}</div>
        </v-card-text>
        <v-card-text v-if="status">
          <v-alert dense text type="success">
            Seu pagamento está sendo processado, acompanhe no e-mail que
            acabamos de enviar
          </v-alert>
        </v-card-text>
        <v-card-text>
          <p>
            O Exemplo é simulando uma compra unitária, onde vamos receber o
            e-mail de pagamento sendo processado e de pagamento processado!
          </p>
        </v-card-text>

        <v-card-actions v-if="user">
          <v-btn text>
            <span class="mr-2" @click="buy">
              Finalizar compra!
            </span>
          </v-btn>
        </v-card-actions>
      </v-card>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import ServicePurchase from "../../services/purchase";
import { mapState } from "vuex";

export default Vue.extend({
  name: "CardPurchase",
  props: ["product"],
  data() {
    return {
      status: false,
    };
  },
  computed: {
    priceBR() {
      var p = this.product ? parseFloat(this.product.price) : 0;
      return p.toLocaleString("pt-br", { style: "currency", currency: "BRL" });
    },
    ...mapState({
      user: (state) => state.user,
    }),
  },
  methods: {
    async buy() {
      try {
        const data = {
          product: this.product.id,
          quantity: 1,
          total: this.product.price,
        };

        await ServicePurchase.purchaseSave(data);
        this.status = true;

        setTimeout(() => {
          this.status = false;
        }, 5000);
      } catch (error) {
        this.status = false;
        console.error(error);
      }
    },
  },
});
</script>
