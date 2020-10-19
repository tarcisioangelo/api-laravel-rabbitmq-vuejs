import ServiceStorage from '../storage'

const ServiceUtil = {

    getHeaders: (params = {}) => {
        const user = ServiceStorage.getUser();
        const token = user ? 'Bearer '.concat(user.token) : ''
        const config = {
            headers: {
                'Accept'        : 'application/json',
                'Content-Type'  : 'application/json',
                'Authorization' : token
            },
            params,
            timeout: 60000
        }

        return config
    },
}

export default ServiceUtil