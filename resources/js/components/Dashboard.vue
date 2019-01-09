<template>
    <div class="container">
        <div v-if="hasExamination">
            <ExaminationNow v-if="currentExaminations.length"
                            :examinations="currentExaminations"
                            class="mb-5">
            </ExaminationNow>
            <ExaminationFuture v-if="futureExaminations.length"
                               :examinations="futureExaminations"
                               class="mb-5">
            </ExaminationFuture>
            <button type="button" class="btn btn-primary btn-lg btn-block mb-5">Nouveau jury</button>
            <ExaminationPast v-if="pastExaminations.length"
                             :examinations="pastExaminations"
                             class="mb-5">
            </ExaminationPast>
        </div>
        <div v-else>
            <div class="alert alert-warning" role="alert">
                Vous n'avez actuellement aucun jury
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block">Nouveau jury</button>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    import ExaminationNow from './examinations/ExaminationNow.vue';
    import ExaminationFuture from './examinations/ExaminationFuture.vue';
    import ExaminationPast from './examinations/ExaminationPast.vue';

    export default {
        name: "dashboard",
        components: {
            ExaminationNow,
            ExaminationFuture,
            ExaminationPast,
        },
        computed: {
            hasExamination() {
                return this.examinations.length;
            },
            currentDate() {
                return new Date();
            },
            currentExaminations() {
                return this.examinations.filter(exam => {
                    return exam.is_happening === 1;
                });
            },
            futureExaminations() {
                return this.examinations.filter(exam => {
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
                return this.examinations.filter(exam => {
                    const examTime = new Date(exam.starting_at);
                    return exam.is_happening === 0 && examTime.getTime() < this.currentDate.getTime();
                });
            },
            ...mapState(['examinations', 'marksForCurrentManagedExaminations']),
        },
        mounted() {
            this.$store.dispatch('fetchExaminations');
            this.$store.dispatch('fetchMarksForCurrentManagedExaminations');
        },
    }
</script>

<style scoped>

</style>
