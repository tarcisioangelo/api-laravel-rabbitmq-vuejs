<template>
  <v-app-bar app color="primary" dark>
      <div class="d-flex align-center" style="margin-right: 16px;">
        <span v-if="user"> Olá, {{ user.name }} </span>
        <span v-if="!user"> Catálogo de Produtos  </span>
      </div>

      <v-divider vertical />

      <router-link to="/painel" tag="button" v-if="user && user.profileID === 1">
        <v-btn text>
            <span class="mr-2">Painel administrativo</span>
        </v-btn>
      </router-link>

      <v-spacer></v-spacer>

      <router-link to="/" tag="button">
        <v-btn text>
            <span class="mr-2">
              Produtos
            </span>
        </v-btn>
      </router-link>
      
      <v-btn text v-if="user">
        <span class="mr-2" @click="logout">
          Logout
        </span>
      </v-btn>


      <router-link to="/login" tag="button">
        <v-btn text v-if="!user">
          <span class="mr-2"> Login </span>
        </v-btn>
      </router-link>

    </v-app-bar>
</template>


<script lang="ts">
import Vue from 'vue'
import { mapState, mapActions } from 'vuex'

export default Vue.extend({
  name: 'Header',
  computed: { 
    ...mapState({
      user: state => state.user
    }),
  },
  methods: {
      ...mapActions([
        'logout'
      ]),
  }

})
</script>
