<template>
  <v-app>
    <Header />
    <v-main class="grey lighten-3">
      <div style="padding: 40px 100px;">

        <v-alert dense outlined text :color="alertType" v-if="alertType">
          {{ alertText }}
        </v-alert>

        <v-card >
          <v-card-title>Dados do Produto</v-card-title>
            <form style="padding: 20px;">
              <v-select 
                v-model="category"
                :items="categories" 
                item-text="description"
                item-value="id"
                label="Categoria" 
                required
              />

              <v-text-field
                  v-model="name"
                  :error-messages="nameErrors"
                  label="Nome"
                  required
                  @input="$v.name.$touch()"
                  @blur="$v.name.$touch()"
              />
              
              <v-text-field
                  v-model="price"
                  :error-messages="priceErrors"
                  label="Preço"
                  required
                  @blur="$v.price.$touch()"
                  @input="changePrice"
              />

              <v-textarea
                  v-model="description"
                  label="Descrição"
              />

              <v-btn class="mr-4" @click="submit" color="green lighten-2">
                  Salvar
              </v-btn>
              
              <v-btn class="mr-4" @click="excluir" color="red lighten-2" v-if="id">
                  Excluir
              </v-btn>
              
          </form>
          
        </v-card>
      </div>
    </v-main>
  </v-app>
</template>

<script>
  import Header from '@/components/layout/Header.vue';
  import ServiceProducts from '../services/products'
  import Mask from "@/utils/mask"

  import { validationMixin } from 'vuelidate'
  import { required, email } from 'vuelidate/lib/validators'

export default {
  name: 'PanelProduct',
  
  mixins: [validationMixin],

  validations: {
    name: { required },
    price: { required }
  },
  
  components: {
    Header,
  },

  data: () => ({
    id: null,
    category: '',
    name: '',
    description: '',
    price: '',
    priceBR: '',
    alertType: null,
    alertText: null,
    categories: [
      { id: 1, description: 'Livros' },
      { id: 2, description: 'Outros' },
    ],
  }),

  computed: {
      nameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.required && errors.push('Nome é obrigatório')
        return errors
      },
      priceErrors () {
        const errors = []
        if (!this.$v.price.$dirty) return errors
        !this.$v.price.required && errors.push('Preço é obrigatório.')
        return errors
      },
  },

  methods: {
      changePrice () {
          this.price = Mask.formatReal(this.price)
      },
      async submit () {
        try {
          const data = {
            id: this.id,
            name: this.name,
            price: Mask.formatUS(this.price),
            description: this.description,
            category: this.category
          }

          const response = await ServiceProducts.productSave(data)
          this.showAlert('success', response.message)
        } catch (error) {
            console.error(error)
        }
      },
      async excluir () {
        try {
          if(!this.id) {
            this.showAlert('error', 'ID inválido')
            return
          }
          const response = await ServiceProducts.productDelete(this.id)
          this.$router.push('/panel')
        } catch (error) {
            console.error(error)
        }
      },
      clear () {
        this.$v.$reset()
        this.password = ''
        this.email = ''
      },
      showAlert (type, text) {
        this.alertType = type
        this.alertText = text
        
        setTimeout(() => {
            this.alertType = null
            this.alertText = ''
        }, 5000)
      }
  },

  mounted () {
    if(this.$route.params.id) {
      ServiceProducts.productLoad(this.$route.params.id).then(response => {
        this.id = response.id
        this.name = response.name
        this.description = response.description
        this.price = Mask.formatReal(parseFloat(response.price).toFixed(2))
        this.category = response.id_category
      }).catch(error => {
        console.error(error)
      })
    }
  },

  
  }
</script>
