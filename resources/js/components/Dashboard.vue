<template>
    <div class="container">
        <div v-if="hasExamination">
            <show-now v-if="currentExaminations.length"
                      :examinations="currentExaminations"
                      class="mb-5">
            </show-now>
            <show-future v-if="futureExaminations.length"
                         :examinations="futureExaminations"
                         class="mb-5">
            </show-future>
            <router-link :to="{ name: 'examination-create' }"
                         tag="button"
                         type="button"
                         class="btn btn-primary btn-lg btn-block mb-5">
                Nouveau jury
            </router-link>
            <show-past v-if="pastExaminations.length"
                       :examinations="pastExaminations"
                       class="mb-5">
            </show-past>
        </div>
        <div v-else>
            <div class="alert alert-warning" role="alert">
                Vous n'avez actuellement aucun jury
            </div>
            <button type="button" class="btn btn-outline-secondary btn-lg m-auto d-block" @click="reloadExaminations">
                Actualiser
            </button>
            <router-link :to="{ name: 'examination-create' }"
                         tag="button"
                         type="button"
                         class="btn btn-primary btn-lg btn-block mb-5">
                Nouveau jury
            </router-link>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import * as types from '../store/types';

    import ShowNow from './Examination/ShowNow.vue';
    import ShowFuture from './Examination/ShowFuture.vue';
    import ShowPast from './Examination/ShowPast.vue';

    export default {
        name: 'Dashboard',
        components: {
            ShowNow,
            ShowFuture,
            ShowPast,
        },
        computed: {
            hasExamination() {
                return this.userExaminations.length;
            },
            currentDate() {
                return new Date();
            },
            currentExaminations() {
                return this.userExaminations.filter(exam => {
                    return exam.is_happening === 1;
                });
            },
            futureExaminations() {
                return this.userExaminations.filter(exam => {
                    const examTime = new Date(exam.starting_at);
                    return exam.is_happening === 0 && examTime.getTime() > this.currentDate.getTime();
                }).sort(function (a, b) {
                    const key1 = new Date(a.starting_at);
                    const key2 = new Date(b.starting_at);

                    if (key1 < key2) {
                        return -1;
                    } else if (key1 === key2) {
                        return 0;
                    } else {
                        return 1;
                    }
                });
            },
            pastExaminations() {
                return this.userExaminations.filter(exam => {
                    const examTime = new Date(exam.starting_at);
                    return exam.is_happening === 0 && examTime.getTime() < this.currentDate.getTime();
                });
            },
            ...mapState({
                userExaminations: state => state.examinationStore.userExaminations,
            }),
        },
        mounted() {
            this.$store.dispatch(types.FETCH_EXAMINATIONS);
        },
        methods: {
            reloadExaminations() {
                this.$store.dispatch(types.FETCH_EXAMINATIONS);
            },
        },
    }
</script>

<style scoped>

</style>
