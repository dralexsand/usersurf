import Vue from 'vue'
import Vuex from 'vuex'

import stats from "./modules/stats";

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        stats
    }
});

export default store
