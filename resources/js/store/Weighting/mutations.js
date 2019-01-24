import * as types from '../types';
import {pushTo} from '../helpers';

export default {
    [types.SET_CUSTOM_WEIGHTING_PROP]: (state, payload) => {
        const index = _.findIndex(state['customWeightings'], {name: payload.name, apply_for_user: payload.apply_for_user});
        Vue.set(state['customWeightings'], index, payload);
    },
    [types.PUSH_CUSTOM_WEIGHTING]: pushTo('customWeightings'),
    [types.REMOVE_CUSTOM_WEIGHTING]: (state, payload) => {
        _.remove(state.customWeightings, payload);
        state['customWeightings'] = [...state.customWeightings];
    },
};
