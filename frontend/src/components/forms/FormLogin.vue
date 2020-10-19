<template>
    <form >
        <v-text-field
            v-model="email"
            :error-messages="emailErrors"
            label="E-mail"
            required
            @input="$v.email.$touch()"
            @blur="$v.email.$touch()"
        />

        <v-text-field
            v-model="password"
            :error-messages="passwordErrors"
            label="Senha"
            required
            type="password"
            @input="$v.password.$touch()"
            @blur="$v.password.$touch()"
        />

        <v-btn class="mr-4" @click="submit" color="red lighten-2">
            Entrar
        </v-btn>
        
        <v-btn @click="clear">
            Limpar
        </v-btn>
        
        <router-link to="/register" tag="button">
          <v-btn> Cadastrar </v-btn>
        </router-link>
    </form>
</template>

<script>
  import ServiceAuth from '../../services/auth'
  import { validationMixin } from 'vuelidate'
  import { required, email } from 'vuelidate/lib/validators'
  import { mapActions } from 'vuex'

  export default {
    mixins: [validationMixin],

    validations: {
      email: { required, email },
      password: { required }
    },

    data: () => ({
      email: '',
      password: ''
    }),

    computed: {
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('e-mail inválido')
        !this.$v.email.required && errors.push('E-mail é obrigatório')
        return errors
      },
      passwordErrors () {
        const errors = []
        if (!this.$v.password.$dirty) return errors
        !this.$v.password.required && errors.push('Senha é obrigatório.')
        return errors
      },
    },

    methods: {
      ...mapActions([
        'setUser'
      ]),
      async submit () {
        try {
          const data = {
            email: this.email,
            password: this.password
          }

          const response = await ServiceAuth.login(data)
          this.setUser(response)
          this.$router.push('/')
        } catch (error) {
            console.error(error)
        }
      },
      clear () {
        this.$v.$reset()
        this.password = ''
        this.email = ''
      },
    },
  }
</script>