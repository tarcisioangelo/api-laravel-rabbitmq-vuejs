const ServiceStorage = {

    removeUser: function() {
        localStorage.removeItem('user')
    },

    setUser: function(user) {
        localStorage.removeItem('user')
        localStorage.setItem('user', JSON.stringify(user))
    },

    getUser: function() {
        let user = localStorage.getItem('user')
        if(!user) return false
        return JSON.parse(user)
    }
}

export default ServiceStorage;
