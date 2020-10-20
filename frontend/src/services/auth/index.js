import serviceUtil from '@/services/api/util'
import { api } from '@/services/api'
import ServiceStorage from '@/services/storage'

const ServiceAuth = {
    hasAdmin: function (to, from, next) {
        const user = ServiceStorage.getUser()

        console.log(user)
        if (user && parseInt(user.profileID) === 1) {
            next()
        } else {
            next({ name: "Home" })
        }
    },

    login: function(data) {
        const url = `/login`;
        return api.post(url, data, serviceUtil.getHeaders())
    },

    create: function(data) {
        const url = `/users`;
        return api.post(url, data, serviceUtil.getHeaders())
    },
}

export default ServiceAuth
