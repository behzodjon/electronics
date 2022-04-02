import axiosClient from "../../axios";



// Create a new store instance.
const state = {
    session_id: null,
    user_id: null,
    items: []
}
const mutations = {
    SET_DATA(state, { data }) {
        state.session_id = data.session_id
        state.user_id = data.user_id
        state.items = data.items
    },
}

const actions = {
    async fetchCart({ commit }) {
        try {
            const sessionId = localStorage.getItem('cart_sessionId')
            if (sessionId) {
                const cart = await axiosClient.get(`/cart/${sessionId}`)
                commit('SET_DATA', cart.data)
            } else {
                const cart = await axiosClient.post('/cart/store')
                localStorage.setItem('cart_sessionId', cart.data.session_id)
                commit('SET_DATA', cart.data)
            }
        } catch (err) {
            //
        }
    },
    async deleteItem({ commit },item) {
        try {
            await axiosClient.post(`/cartItems/${item.id}`)
        } catch (err) {
            //
        }
    },
}
export default {
    namespaced: true,
    state,
    actions,
    mutations
}