import { createStore } from "vuex";
import axiosClient from "../axios";


// Create a new store instance.
const store = createStore({
    state() {
        return {
            storageList: [],
            storageId: null,
            productId: null,
            conditionId: null,
            products: [],
            sideBarOpen: false,
            directOpen: false
        }
    },
    mutations: {
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
        setProducts: (state, products) => {
            state.products = products.data;
        },
        changeSideBarState: (state, value) => {
            state.sideBarOpen = value;
        },
        changeDirectOpen: (state, value) => {
            state.directOpen = value;
        },
    },

    getters: {
        storagesList(state) {
            return state.storageList
        },
        productId(state) {
            return state.productId
        },
        storageId(state) {
            return state.storageId
        },
        conditionId(state) {
            return state.conditionId
        },
        sideBarState(state) {
            return state.sideBarOpen
        }
    },
    actions: {
        getProducts({ commit }) {
            return axiosClient.get('/products').then((res) => {
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
    }
})
export default store;
