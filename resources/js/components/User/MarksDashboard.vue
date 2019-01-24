<template>
    <div>
        <div>{{ name }}</div>
        <div class="float-right text-right">{{ passages }}</div>
        <base-accordion>
            <p>
                A vu :
                <span v-for="(examiner, index) of examinersSeen">
                    {{ examiner.name }}<span v-if="index != Object.keys(examinersSeen).length - 1">, </span>
                </span>
            </p>
            <p>Note moyenne actuelle : {{ avgMark }}/20</p>
            <p>
                Meilleur projet : {{ bestProject.project ? bestProject.project.name : 'Projet inconnu' }}
                ({{ bestProject.mark }}/20)
            </p>
            <p>
                Pire projet : {{ worstProject.project ? worstProject.project.name : 'Projet inconnu' }}
                ({{ worstProject.mark }}/20)
            </p>
        </base-accordion>
    </div>
</template>

<script>
    import BaseAccordion from "../shared/BaseAccordion.vue";

    export default {
        name: 'UserMarks',
        components: {BaseAccordion},
        props: ['student'],
        computed: {
            name() {
                return this.student[0].given_to.name;
            },
            passages() {
                let nbPassages = this.examinersSeen.length, passagesTxt = nbPassages + ' passage';
                return nbPassages < 2 ? passagesTxt : passagesTxt + 's';
            },
            marksWithInfos() {
                let marksWithInfos = [];
                for (let i = 0, len = this.student.length; i < len; i++) {
                    marksWithInfos.push(this.student[i]);
                }
                return marksWithInfos;
            },
            examinersSeen() {
                let distinctMarks = _.uniqBy(this.marksWithInfos, 'given_by.id'), examiners = [];
                for (let i = 0, len = distinctMarks.length; i < len; i++) {
                    examiners.push(distinctMarks[i].given_by);
                }
                return examiners;
            },
            avgMark() {
                return _.round(_.meanBy(this.marksWithInfos, 'mark'), 2);
            },
            bestProject() {
                return _.maxBy(this.marksWithInfos, 'mark');
            },
            worstProject() {
                return _.minBy(this.marksWithInfos, 'mark');
            },
        },
    }
</script>

<style scoped>

</style>
