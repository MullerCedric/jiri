import * as types from '../types';

export default {
    [types.PUSH_OR_SET_CUSTOM_WEIGHTING]({commit, state}, payload) {
        if (_.find(state['customWeightings'], {name: payload.name, apply_for_user: payload.apply_for_user})) {
            commit(types.SET_CUSTOM_WEIGHTING_PROP, payload);
        } else {
            commit(types.PUSH_CUSTOM_WEIGHTING, payload);
        }
    },
    [types.REMOVE_CUSTOM_WEIGHTING]({commit, state}, payload) {
        commit(types.REMOVE_CUSTOM_WEIGHTING, payload);
    },
};
