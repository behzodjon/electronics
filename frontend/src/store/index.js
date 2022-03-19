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
            storageId: null,
            productId: null,
            conditionId: null,
            categories: [],
            categoryProducts: [],
            products: [],
            sideBarOpen: false,
            directOpen: false,
            selected: null,
            clicked: false,
            sectionTitle:''
        }
    },
    mutations: {
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

        setProductId(state, payload) {
            state.productId = payload
        },
        setStorageId(state, payload) {
            state.storageId = payload
        },
        setConditionId(state, payload) {
            state.conditionId = payload
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
    },
    getters: {
        isAuthenticated: state => !!state.user.token,
    },
    actions: {
        logout({commit}) {
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
        login({commit}, user) {
            return axiosClient.post('/login', user)
              .then(({data}) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                return data;
              })
          },
          loginWithGoogle({commit},token) {
            return axiosClient.get(`/google/callback/${token}`)
            .then(({data}) => {
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
        getCategoryProducts({ commit }, category) {
            return axiosClient.get(`/categories/${category.id}/products`).then((res) => {
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
            return axiosClient.get(`/product/${value.id}/storages`).then((res) => {
                commit("setProductId", value.id);
                commit("setStorageList", res.data);
                return res;
            });
        },
        getSideBarState({ commit }, state) {
            commit("changeSideBarState", state);
        },
        setDirectOpen({ commit }, state) {
            commit("changeDirectOpen", state);
        },
        changeSelectedValue({ commit }, state) {
            commit("setSelectedValue", state);
        },
        changeClickedValue({ commit }, state) {
            commit("setClickedValue", state);
        },
    }
})
export default store;
