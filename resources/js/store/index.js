import Vue from "vue";
import Vuex from "vuex";

import Files from "./modules/files.js";
import Alert from "./modules/alert.js";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        Files,
        Alert
    }
});
