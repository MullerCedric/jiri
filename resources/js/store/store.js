import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        examinations: [],
        marksForCurrentManagedExaminations: [],
    },
    mutations: {
        FETCH_EXAMINATIONS(state, payload) {
            state.examinations = payload;
        },
        FETCH_MARKS_FOR_CURRENT_MANAGED_EXAMINATIONS(state, payload) {
            state.marksForCurrentManagedExaminations = payload;
        },
    },
    actions: {
        fetchExaminations({ commit }) {
            return axios.get('/all-my-examinations')
                .then(response => commit('FETCH_EXAMINATIONS', response.data))
                .catch(error => {
                    console.log(error)
                });
        },
        fetchMarksForCurrentManagedExaminations({ commit }) {
            return axios.get('/marks/currentManagedExaminations')
                .then(response => commit('FETCH_MARKS_FOR_CURRENT_MANAGED_EXAMINATIONS', response.data))
                .catch(error => {
                    console.log(error)
                });
        },
    },
});
