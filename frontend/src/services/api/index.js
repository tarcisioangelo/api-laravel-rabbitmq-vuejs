import axios from 'axios'
import store from '../../store'
import Router from 'vue-router';

import { baseUrl } from '../../config'

const success = (response) => {
    if (response.data.error) {
        return Promise.reject(response.data)
    }
    return response.data
}

const error = (error) => {
    if (error.response.status === 500) {
        return Promise.reject(error.response.data)
    }
    
    if (error.response.status === 401) {
        store.dispatch('setUser', null)
        Router.push('/')
        return Promise.reject(error.response.data)
    }
    
    return Promise.reject(error.response.data)
}

const api = axios.create({
    baseURL: baseUrl
})

api.interceptors.response.use(success, error)

export { api }