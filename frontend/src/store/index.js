import { createStore } from "vuex";
import axiosClient from "../axios";
import cart from './modules/cart';
import user from './modules/user';



// Create a new store instance.
const store = createStore({
    modules: {
        cart,
        user
    },
    state() {
        return {
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
            formData: {
                categoryId: null,
                productId: null,
                storageId: null,
                conditionId: null,
                price: null
            },
        }
    },
    mutations: {
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
    },
    actions: {
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
