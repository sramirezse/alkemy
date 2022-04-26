import sectionsapi from "../../api/sectionsapi";

// state
export const state = {
    section1: {},

}

// getters
export const getters = {
}
// mutations
export const mutations = {
    FETCH_SECTION1(state, payload) {
        state.section1.images = payload;
    }
}

// actions
export const actions = {

    async uploadImagesToBanner({ commit, dispatch }, payload) {
        try {
            const {data} = await sectionsapi.uploadImagesToBanner(payload);
            console.log('this form', data);
            commit('FETCH_SECTION1', data);
            return data;

        } catch (err) {
            console.log('error', err);
            commit('LOGOUT')
        }
    },
    async fetchSection1({ commit, dispatch }, payload) {
        try {
            const {data} = await sectionsapi.fetchSection1(payload);
            console.log('this form', data);
            commit('FETCH_SECTION1', data);
            return data;

        } catch (err) {
            console.log('error', err);
            commit('LOGOUT')
        }
    }

   
}

export default {
    state,
    getters,
    mutations,
    actions,
}
