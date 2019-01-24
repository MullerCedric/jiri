import * as types from '../types';
import {set} from '../helpers';

export default {
    [types.SET_EXAMINATION]: (state, payload) => {
        set(state, payload);
    },
    [types.RESET_EXAMINATION]: (state) => {
        Vue.set(state, 'userExaminations', []);
        Vue.set(state, 'name', '');
        Vue.set(state, 'editable', true);
        Vue.set(state, 'startingAt', new Date());
        Vue.set(state, 'examinersList', []);
        Vue.set(state, 'projectsList', []);
        Vue.set(state, 'studentsList', []);
    },
};
