import * as types from '../types';

export default {
    [types.GET_EXAMINATION_PROP]: state => {
        return payload => state[payload];
    },
};
