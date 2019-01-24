import * as types from '../types';
import {set} from '../helpers';

export default {
    [types.SET_MARK]: (state, payload) => {
        set(state, payload);
    },
};
