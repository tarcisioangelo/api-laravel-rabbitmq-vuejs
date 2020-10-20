import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Panel from '../views/Panel.vue'
import PanelProduct from '../views/PanelProduct.vue'
import Login from '../views/Login.vue'
import Product from '../views/Product.vue'
import Register from '../views/Register.vue'

import ServiceAuth from '../services/auth'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/panel/product/:id?',
    name: 'PanelProduct',
    component: PanelProduct
  },
  {
    path: '/panel',
    name: 'Panel',
    component: Panel,
    beforeEnter: ServiceAuth.hasAdmin
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/product/:id',
    name: 'Product',
    component: Product
  },
]

const router = new VueRouter({
  routes
})

export default router
