import serviceUtil from '@/services/api/util'
import { api } from '@/services/api'

const ServiceAuth = {
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
