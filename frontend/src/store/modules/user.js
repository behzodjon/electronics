import axiosClient from "../../axios";



// Create a new store instance.
const state = {
    data: {},
    token: sessionStorage.getItem("TOKEN"),
    isAdmin:sessionStorage.getItem("isAdmin"),
    restorePassword: {
        email: null,
        mode: null,
    },
}
const getters = {
    isAuthenticated: state => !!state.token,
    isAdmin: state => state.isAdmin
}
const mutations = {
    logout: (state) => {
        state.token = null;
        state.data = {};
        sessionStorage.removeItem("TOKEN");
        sessionStorage.removeItem("isAdmin");
    },
    setUser: (state, user) => {
        state.data = user;
    },
    setToken: (state, token) => {
        state.token = token;
        sessionStorage.setItem('TOKEN', token);
    },
    setAdmin: (state, data) => {
        state.isAdmin = data;
        sessionStorage.setItem('isAdmin', data);
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
    logout({ commit, rootState,dispatch }) {
        return axiosClient.post('/logout')
            .then(response => {
                commit('logout')
                rootState.cart.items = []
                rootState.cart.session_id = null
                rootState.cart.user_id = null
                localStorage.setItem('cart_sessionId', '')
                dispatch('cart/fetchCart', null, { root: true })

                return response;
            })
    },
    register({ commit, dispatch }, user) {
        const sessionId = localStorage.getItem('cart_sessionId')

        return axiosClient.post('/register', { ...user, sessionId })
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                dispatch('cart/fetchCart', data.user, { root: true })

                return data;
            })
    },
    login({ commit, dispatch }, user) {
        const sessionId = localStorage.getItem('cart_sessionId')

        return axiosClient.post('/login', { ...user, sessionId })
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                commit('setAdmin', data.user.is_admin)
                dispatch('cart/fetchCart', data.user, { root: true })
                return data;
            })
    },
    loginWithGoogle({ commit, dispatch }, token) {
        const sessionId = localStorage.getItem('cart_sessionId')

        return axiosClient.post(`/google/callback`, { token, sessionId })
            .then(({ data }) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                dispatch('cart/fetchCart', data.user, { root: true })
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