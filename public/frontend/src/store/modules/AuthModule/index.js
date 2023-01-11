import setBearerToken from "./api-header-changer";

export default {
    namespaced: true,
    state: {
        token: localStorage.getItem("authToken"),
    },
    mutations: {
        SET_AUTH_TOKEN(state, token) {
            setBearerToken(token);
            localStorage.setItem("authToken", token);
            state.token = token;
        },
        UNSET_AUTH_TOKEN(state) {
            setBearerToken(null);
            localStorage.removeItem("authToken");
            state.token = null;
        },
    },
    getters: {
        isAuthorized(state) {
            return Boolean(state.token);
        },
        token(state) {
            return state.token;
        },
    },
    actions: {
        unsetToken({ commit }) {
            commit("UNSET_AUTH_TOKEN");
        },
        setToken({ commit }, token) {
            commit("SET_AUTH_TOKEN", token);
        },
    },
};
