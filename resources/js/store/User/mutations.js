import * as types from '../types';
import {set} from '../helpers';

export default {
    [types.SET_USER]: (state, payload) => {
        set(state, payload);
    },
};
