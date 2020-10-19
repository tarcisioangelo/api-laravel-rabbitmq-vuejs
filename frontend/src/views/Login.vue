<template>
  <v-app>
    <Header />
    <v-main>
        <div style="display: flex; padding: 50px;">
          <div style="margin: auto; width: 600px;">
              <FormLogin />
          </div>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Header from '@/components/layout/Header.vue';
import FormLogin from '@/components/forms/FormLogin.vue';

export default {
  name: 'Home',
  components: {
    Header,
    FormLogin
  }
}
</script>
