import { createStore } from "vuex";
import axiosClient from "../axios";



// Create a new store instance.
const store = createStore({
    state() {
        return {
            user: {
                data: {},
                token: sessionStorage.getItem("TOKEN"),
            },
            storageList: [],
            categories: [],
            categoryProducts: [],
            products: [],
            sideBarOpen: false,
            directOpen: false,
            selected: null,
            clicked: false,
            sectionTitle: '',
            steps: [],
            loading: true,
            restorePassword: {
                email: null,
                mode: null,
            },
            formData: {
                categoryId: null,
                productId: null,
                storageId: null,
                conditionId: null,
                price: null
            },
            cart: {
                session_id: null,
                data: []
            }
        }
    },
    mutations: {
        SET_CART_DATA(state, { session_id }) {
            state.cart.session_id = session_id
        },
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            sessionStorage.removeItem("TOKEN");
        },
        setUser: (state, user) => {
            state.user.data = user;
        },

        setToken: (state, token) => {
            state.user.token = token;
            sessionStorage.setItem('TOKEN', token);
        },
        setStorageList(state, payload) {
            state.storageList = payload
        },
        setProductId(state, value) {
            state.formData.productId = value
        },
        setCategoryId(state, value) {
            state.formData.categoryId = value
        },
        setStorageId(state, value) {
            state.formData.storageId = value
        },
        setConditionId(state, value) {
            state.formData.conditionId = value
        },
        setPriceValue(state, value) {
            state.formData.price = value
        },
        setCategories: (state, categories) => {
            state.categories = categories.data;
        },
        setCategoryProducts: (state, categoryProducts) => {
            state.categoryProducts = categoryProducts.data;
        },
        setProducts: (state, products) => {
            state.products = products.data;
        },
        changeSideBarState: (state, value) => {
            state.sideBarOpen = value;
        },
        changeDirectOpen: (state, value) => {
            state.directOpen = value;
        },
        setSelectedValue: (state, value) => {
            state.selected = value;
        },
        setClickedValue: (state, value) => {
            state.clicked = value;
        },
        setSectionTitle: (state, value) => {
            state.sectionTitle = value;
        },
        setSteps: (state, value) => {
            state.steps = value;
        },
        setLoadingValue: (state, value) => {
            state.loading = value;
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

    },
    getters: {
        isAuthenticated: state => !!state.user.token,
    },
    actions: {
        async fetchCart({ commit, state }) {
            try {
                const sessionId = localStorage.getItem('cart_sessionId')
                if (sessionId) {
                    const cart = await axiosClient.get(`/cart`,{se})
                    commit('SET_CART_DATA', cart)
                }
                const cart = await axiosClient.post('/cart/store')
                localStorage.setItem('cart_sessionId', cart.data.session_id)
                commit('SET_CART_DATA', cart.data)
            } catch (err) {
                //
            }
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
        loginWithGoogle({ commit }, token) {
            return axiosClient.get(`/google/callback/${token}`)
                .then(({ data }) => {
                    commit('setUser', data.user);
                    commit('setToken', data.token)
                    return data;
                })

        },
        getUser({ commit }) {
            return axiosClient.get('/user')
                .then(res => {
                    commit('setUser', res.data)
                })
        },
        getCategories({ commit }) {
            return axiosClient.get('/categories').then((res) => {
                commit("setCategories", res);
                return res;
            });
        },
        getCategoryProducts({ commit }, categoryId) {
            return axiosClient.get(`/categories/${categoryId}/products`).then((res) => {
                commit("setCategoryProducts", res.data);
                return res;
            });
        },
        getProducts({ commit }) {
            return axiosClient.get(`/products`).then((res) => {
                commit("setProducts", res.data);
                return res;
            });
        },
        getProductStorages({ commit }, value) {
            return axiosClient.get(`/product/${value}/storages`).then((res) => {
                commit("setStorageList", res.data);
                return res;
            });
        },
        storeCartData({ commit }, data) {
            return axiosClient.post(`/cart/store`, data).then((res) => {
                return res;
            });
        },
        getSideBarState({ commit }, state) {
            commit("changeSideBarState", state);
        },
        setDirectOpen({ commit }, state) {
            commit("changeDirectOpen", state);
        },
        changeSelectedValue({ commit }, value) {
            commit("setSelectedValue", value);
        },

        changeClickedValue({ commit }, value) {
            commit("setClickedValue", value);
        },
    }
})
export default store;
