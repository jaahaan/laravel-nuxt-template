//import Vuex from 'vuex'
//import axios from 'axios'
export const strict = false;
import cookie from "cookie";

export const state = () => ({
  user: "no user",
  authUser: false,
  token: "",
  unauthorizedCredential: { email: "", password: "" },
});
// common getters
export const getters = {
  getIsLoggedIn(state) {
    return !!state.authUser;
  },
  getAuthUser(state) {
    return state.authUser;
  },
  getToken(state) {
    return state.token;
  },
  unauthorizedCredential(state) {
    return state.unauthorizedCredential;
  },
};
//mutations for changing data from action
export const mutations = {
  loginUser(state, data) {
    state.authUser = data;
  },
  setAuthInfo(state, data) {
    state.authUser = data;
  },
  updateCart(state, data) {
    state.cart = data;
  },
  setToken(state, data) {
    state.token = data;
  },
  setUnauthorizedCredential(state, data) {
    state.unauthorizedCredential = data;
  },
};
// actionns for commiting mutations
export const actions = {
  async nuxtServerInit({ commit, state }, { $axios, req, env }) {
    console.log("I am running as nuxt server init");
    const session = req.headers.cookie ? cookie.parse(req.headers.cookie) : "";
    // console.log("token : ",session)
    $axios.setToken(session.token, "Bearer");
    try {
      const res = await $axios.get("/app/auth_user");
      console.log(res.data);
      commit("setAuthInfo", res.data);
    } catch (e) {
      console.log("nuxt server error ");
    }
  },

  setToken({ commit }, data) {
    commit("setToken", data);
  },
  setAuthInfo({ commit }, data) {
    commit("setAuthInfo", data);
  },
};
