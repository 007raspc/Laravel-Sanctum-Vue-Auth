import * as Config from '../../config'

const state = {
    user: null,
    accessToken: localStorage.getItem('access_token') || null
}

const getters = {
    user: state => {
        return state.user
    },
}

const mutations = {
    SET_USER(state, user) {
        state.user = user;
    },
}

const actions = {
    checkLogin({commit}) {
        return new Promise((resolve, reject) => {
            axios.get(Config.apiPath + 'auth/user')
                .then(response => {
                    commit('SET_USER', response.data.data.user)
                    resolve()
                })
                .catch(() => {
                    localStorage.removeItem('access_token')
                    commit('SET_USER', null)
                    reject()
                })
        })
    },
    login({commit}, form) {
        form.device_name = 'site'
        return new Promise((resolve, reject) => {
            axios.post(Config.apiPath + 'auth/login', form)
                .then(response => {
                    localStorage.setItem('access_token', response.data.data.access_token)
                    commit('SET_USER', response.data.data.user)
                    resolve(response.data.message)
                })
                .catch(error => {
                    reject(error.response.data)
                })
        })
    },
    logout({commit}) {
        return new Promise((resolve, reject) => {
            axios.delete(Config.apiPath + 'auth/user/logout')
                .then(() => {
                    localStorage.removeItem('access_token')
                    commit('SET_USER', null)
                    resolve()
                })
                .catch(error => {
                    reject(error.response.data)
                })
        })
    },
    register({}, form) {
        return new Promise((resolve, reject) => {
            axios.post(Config.apiPath + 'auth/register', form)
                .then(response => {
                    resolve(response.data.message)
                })
                .catch(error => {
                    console.log(error);
                    reject(error.response.data)
                })
        })
    },
    updateProfile({commit, dispatch}, data) {
        return new Promise((resolve, reject) => {
            axios.patch(Config.apiPath + 'auth/user/', data)
                .then(response => {
                    resolve(response.data.message)
                })
                .catch(error => {
                    reject(error.response.data)
                })
        })
    },
    showMyProfile({}) {
        return new Promise((resolve, reject) => {
            axios.get(Config.apiPath + 'auth/user/me')
                .then(response => {
                    resolve(response.data)
                })
                .catch(error => {
                    reject(error.response.data)
                })
        })
    },
    showProfile({}, id) {
        return new Promise((resolve, reject) => {
            axios.get(Config.apiPath + 'users/' + id)
                .then(response => {
                    console.log(response)
                    resolve(response.data)
                })
                .catch(error => {
                    console.log(error)
                    reject(error.response.data)
                })
        })
    }
}

export default {
    state, mutations, getters, actions
}
