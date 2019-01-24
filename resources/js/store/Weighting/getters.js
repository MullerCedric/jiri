import * as types from '../types';

export default {
    [types.GET_CUSTOM_WEIGHTING]: state => {
        return state['customWeightings'];
    },
    [types.GET_CUSTOM_WEIGHTING_FOR_USER]: state => {
        return payload => {
            return _.filter(state['customWeightings'], {'apply_for_user': payload});
        }
    },
};
