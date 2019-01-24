<template>
    <div class="jumbotron">
        <h2 class="display-4"
            v-text="examinations.length >= 2 ? 'Des jurys sont en cours !' : 'Un jury est en cours !' ">
        </h2>
        <div class="list-group">
            <div class="list-group-item"
                 v-for="examination in examinations"
                 :key="examination.id">
                <p class="lead">Le jury <i>{{ examination.name }}</i> a commencé. Voici les avancées en temps réel</p>

                <div v-for="(exam, exam_id) in formattedMarks" v-if="parseInt(exam_id, 10) === examination.id">
                    <user-marks-dashboard v-for="(student, studentKey) in exam"
                                          :key="studentKey"
                                          :student="student">
                    </user-marks-dashboard>
                </div>

                <div>
                    <button type="button" class="btn btn-primary btn-lg m-auto d-block">
                        Mettre fin à ce jury
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import * as types from '../../store/types';

    import UserMarksDashboard from '../User/MarksDashboard.vue';

    export default {
        name: 'ShowNow',
        components: {
            UserMarksDashboard,
        },
        props: ['examinations'],
        computed: {
            formattedMarks() {
                return this.formatMarks(this.marksForCurrentlyManagedExaminations);
            },
            ...mapState({
                marksForCurrentlyManagedExaminations: state => state.markStore.marksForCurrentlyManagedExaminations,
            }),
        },
        mounted() {
            this.$store.dispatch(types.FETCH_MARKS_FOR_CURRENTLY_MANAGED_EXAMINATIONS);
        },
        methods: {
            formatMarks(src) {
                let formatted = {};
                for (let prop in src) {
                    if (src.hasOwnProperty(prop)) {
                        formatted[src[prop].examination_id] = formatted[src[prop].examination_id] || {};
                        formatted[src[prop].examination_id][src[prop].given_to.id] = formatted[src[prop].examination_id][src[prop].given_to.id] || [];

                        formatted[src[prop].examination_id][src[prop].given_to.id].push(src[prop]);
                    }
                }
                return formatted;
            },
        },
    }
</script>

<style scoped>

</style>
