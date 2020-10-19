import serviceUtil from '@/services/api/util'
import { api } from '@/services/api'

const Service = {
    purchaseList: function() {
        const url = `purchase`;
        return api.get(url, serviceUtil.getHeaders())
    },

    purchaseSave: function(data) {
        const url = `purchase`;
        return api.post(url, data, serviceUtil.getHeaders())
    },
}

export default Service
