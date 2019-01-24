import * as types from '../types';

export default {
    [types.FETCH_MARKS_FOR_CURRENTLY_MANAGED_EXAMINATIONS]({commit}) {
        return axios.get('/marks/currently-managed-examinations')
            .then(response => commit(types.SET_MARK, ['marksForCurrentlyManagedExaminations', response.data]))
            .catch(error => {
                console.log(error)
            });
    },
};
