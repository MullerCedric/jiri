<template>
    <section class="container">
        <h2 class="display-4">Création d'un nouveau jury</h2>
        <component :is="step"
                   :examinations="userExaminations"
                   :users="users"
                   @to-step="stepView"
                   @save-examination="saveExamination">
        </component>
    </section>
</template>

<script>
    import {mapState} from 'vuex';
    import * as types from '../store/types';

    import CreateStepOne from './Examination/CreateStepOne.vue';
    import CreateStepTwo from './Examination/CreateStepTwo.vue';

    export default {
        name: 'ExaminationCreate',
        data() {
            return {
                step: CreateStepOne,
            };
        },
        computed: {
            ...mapState({
                userExaminations: state => state.examinationStore.userExaminations,
                users: state => state.userStore.users,
            }),
        },
        mounted() {
            this.$store.dispatch(types.FETCH_EXAMINATIONS);
            this.$store.dispatch(types.FETCH_ACTIVE_USERS);
        },
        methods: {
            stepView(step) {
                switch (step) {
                    case 2:
                        this.step = CreateStepTwo;
                        break;
                    default:
                        this.step = CreateStepOne;
                }
            },
            saveExamination() {
                this.$store.dispatch(types.SAVE_EXAMINATION);
            },
        },
    }
</script>

<style scoped>

</style>
