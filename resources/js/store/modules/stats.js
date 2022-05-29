import axios from "axios";
import config from "../../env";

const actions = {
    async fetchStatsData(ctx, payload) {
        let url = '/api/v1/report' + payload
        await axios.get(url)
            .then(function (response) {
                // handle success
                ctx.commit('updateData', response.data)
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    },

    async fetchUserData(ctx, payload) {
        let url = '/api/v1/userdata?hash=' + payload
        await axios.get(url)
            .then(function (response) {
                // handle success
                ctx.commit('updateUserData', response.data)
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    },

    async fetchDates(ctx, payload) {
        console.log('vuex:')
        console.log(payload)
        ctx.commit('updateDates', payload)
    }

}

const mutations = {
    updateData(state, payload) {
        state.data = payload
    },
    updateUserData(state, payload) {
        state.userdata = payload
    },
    updateDates(state, payload) {
        state.dates = payload
    }

}

const state = {
    data: [],
    userdata: [],
    dates: [],
}

const getters = {
    getData(state) {
        return state.data
    },
    getUserData(state) {
        return state.userdata
    },
    getDates(state) {
        return state.dates
    }
}

export default {
    namespaced: true,
    actions,
    mutations,
    state,
    getters
}
