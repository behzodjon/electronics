import axiosClient from "../../axios";



// Create a new store instance.
const state = {
    data: {},
    token: sessionStorage.getItem("TOKEN"),
    restorePassword: {
        email: null,
        mode: null,
    },
}
const getters = {
    isAuthenticated: state => !!state.token,
}
const mutations = {
    logout: (state) => {
        state.token = null;
        state.data = {};
        sessionStorage.removeItem("TOKEN");
    },
    setUser: (state, user) => {
        state.data = user;
    },
    setToken: (state, token) => {
        state.token = token;
        sessionStorage.setItem('TOKEN', token);
    },
    setRestorePasswordEmail(state, email) {
        state.restorePassword.email = email
    },
    setRestorePasswordMode(state, mode) {
        state.restorePassword.mode = mode
    },
    resetRestorePassword(state) {
        state.restorePassword = {
            email: null,
            mode: null,
        }
    },
}

const actions = {
    getUser({ commit }) {
        return axiosClient.get('/user')
            .then(res => {
                commit('setUser', res.data)
            })
    },
    logout({ commit }) {
        return axiosClient.post('/logout')
            .then(response => {
                commit('logout')
                return response;
            })
    },
    register({ commit }, user) {
        return axiosClient.post('/register', user)
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                return data;
            })
    },
    login({ commit }, user) {
        return axiosClient.post('/login', user)
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                return data;
            })
    },
    loginWithGoogle({ commit }, token) {
        return axiosClient.get(`/google/callback/${token}`)
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                return data;
            })
    },
    sendCode({ commit }, payload) {
        return axiosClient.post('/send-code', payload)
            .then(({ data }) => {
                commit('setRestorePasswordMode', 'code');
                commit('setRestorePasswordEmail', payload);
                return data;
            })
    },
    setNewPassword({ commit }, payload) {
        return axiosClient.post('/set-new-password', payload)
            .then(() => {
                commit('resetRestorePassword');
            })
    },
}
export default {
    namespaced: true,
    state,
    actions,
    getters,
    mutations
}