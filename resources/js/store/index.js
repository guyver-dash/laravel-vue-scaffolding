import Vue from "vue";
import Vuex from "vuex";
import branches from "./branches";
import users from "./users";
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

const Store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        branches,
        users
    }
});

export default Store;
