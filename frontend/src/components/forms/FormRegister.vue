<template>
    <form >
        <v-text-field
            v-model="name"
            :error-messages="nameErrors"
            label="Nome"
            required
            @input="$v.name.$touch()"
            @blur="$v.name.$touch()"
        />
        
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
            Salvar dados
        </v-btn>
        <v-btn @click="clear">
            Limpar
        </v-btn>

        <router-link to="/login" tag="button">
          <v-btn>
            Fazer Login
          </v-btn>
        </router-link>
    </form>
</template>

<script>
  import ServiceAuth from '../../services/auth'
  import { validationMixin } from 'vuelidate'
  import { required, email } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],

    validations: {
      name: { required },
      email: { required, email },
      password: { required }
    },

    data: () => ({
      name: '',
      email: '',
      password: ''
    }),

    computed: {
      nameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.required && errors.push('Nome é obrigatório')
        return errors
      },
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
      async submit () {
        try {
          const data = {
            name: this.name,
            email: this.email,
            password: this.password
          }

          const response = await ServiceAuth.create(data)
          this.$router.push('/login')
        } catch (error) {
            console.error(error)
        }
      },
      clear () {
        this.$v.$reset()
        this.name = ''
        this.password = ''
        this.email = ''
      },
    },
  }
</script>