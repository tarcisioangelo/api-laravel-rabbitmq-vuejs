<template>
  <v-app>
    <Header />
    <v-main>
        <div style="display: flex; padding: 50px;">
          <div style="margin: auto; width: 600px;">
              <FormRegister />
          </div>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Header from '@/components/layout/Header.vue';
import FormRegister from '@/components/forms/FormRegister.vue';

export default {
  name: 'Home',
  components: {
    Header,
    FormRegister
  }
}
</script>
