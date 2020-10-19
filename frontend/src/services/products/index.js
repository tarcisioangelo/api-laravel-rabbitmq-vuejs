import serviceUtil from '@/services/api/util'
import { api } from '@/services/api'

const Service = {
    productList: function() {
        const url = `products`;
        return api.get(url, serviceUtil.getHeaders())
    },

    productLoad: function(productId) {
        const url = `products/find/${productId}`;
        return api.get(url, serviceUtil.getHeaders())
    },
}

export default Service
