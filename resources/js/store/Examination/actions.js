import * as types from '../types';
import router from '../../router';

export default {
    [types.FETCH_EXAMINATIONS]({commit}) {
        return axios.get('/all-my-examinations')
            .then(response => commit(types.SET_EXAMINATION, ['userExaminations', response.data]))
            .catch(error => {
                console.log(error)
            });
    },
    [types.SET_EXAMINATION]({commit}, payload) {
        commit(types.SET_EXAMINATION, payload);
    },
    [types.FETCH_CURRENT_USER_AS_EXAMINER]({commit}) {
        return axios.get('/user/current')
            .then(response => commit(types.SET_EXAMINATION, ['examinersList', [response.data]]))
            .catch(error => {
                console.log(error)
            });
    },
    [types.SAVE_EXAMINATION]({commit, state, rootState }) {
        const examination = {
            name: state.name,
            starting_at: state.startingAt.toJSON().slice(0, 19).replace('T', ' '),
        };

        return axios.post('/examination', examination)
            .then(response => {
                const examination_id = response.data.id;
                axios.post('/examination/' + examination_id + '/examiners', {examiners: state.examinersList})
                    .then(response => {
                        axios.post('/examination/' + examination_id + '/students', {students: state.studentsList})
                            .then(response => {
                                axios.post('/examination/' + examination_id + '/projects', {projects: state.projectsList})
                                    .then(response => {
                                        axios.post('/examination/' + examination_id + '/weightings', {weightings: rootState.weightingStore.customWeightings})
                                            .then(response => {
                                                commit(types.RESET_EXAMINATION);
                                                router.push({name: 'dashboard'})
                                            })
                                            .catch(error => {
                                                console.log(error)
                                            });
                                    })
                                    .catch(error => {
                                        console.log(error)
                                    });
                            })
                            .catch(error => {
                                console.log(error)
                            });
                    })
                    .catch(error => {
                        console.log(error)
                    });
            })
            .catch(error => {
                console.log(error)
            });
    }
};
