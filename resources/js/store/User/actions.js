import * as types from '../types';

export default {
    [types.FETCH_ACTIVE_USERS]({commit}) {
        return axios.get('/user/active')
            .then(response => commit(types.SET_USER, ['users', response.data]))
            .catch(error => {
                console.log(error)
            });
    },
    [types.SAVE_USER] ({commit}, payload) {
        return axios.post('/user', payload)
            .then(response => {
                return response.data;
            })
            .catch(error => {
                console.log(error)
            });
    },
};
