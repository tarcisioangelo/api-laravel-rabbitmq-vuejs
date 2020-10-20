import Vue from 'vue'
import Vuex from 'vuex'
import router from '../router'
import ServiceStorage from '../services/storage'

Vue.use(Vuex)

const userLocal = ServiceStorage.getUser()

export default new Vuex.Store({
  state: {
    user: userLocal ? userLocal : undefined,
  },
  mutations: {
    setUser: (state, payload) => state.user = payload, 
  },
  actions: {
    setUser: ({ commit }, payload) => {
      ServiceStorage.setUser(payload)
      commit('setUser', payload)
    }, 
    logout: ({ commit }) => {
      ServiceStorage.removeUser()
      commit('setUser', null)
      if(router.currentRoute.name !== 'Home') {
        router.push('/')
      }
    }, 
  },
  modules: {
  }
})
