import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const userLocal = localStorage.getItem('user')

export default new Vuex.Store({
  state: {
    user: userLocal ? JSON.parse(userLocal) : undefined,
  },
  mutations: {
    setUser: (state, payload) => state.user = payload, 
  },
  actions: {
    setUser: ({ commit }, payload) => {
      localStorage.setItem('user', JSON.stringify(payload))
      commit('setUser', payload)
    }, 
    logout: ({ commit }) => {
      localStorage.removeItem('user')
      commit('setUser', null)
    }, 
  },
  modules: {
  }
})
