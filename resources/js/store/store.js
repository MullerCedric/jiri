import Vue from 'vue';
import Vuex from 'vuex';

import examinationStore from './Examination/store';
import markStore from './Mark/store';
import userStore from './User/store';
import weightingStore from './Weighting/store';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        examinationStore,
        markStore,
        userStore,
        weightingStore,
    },
});
