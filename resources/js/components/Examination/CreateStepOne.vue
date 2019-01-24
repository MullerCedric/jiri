<template>
    <div>
        <section>
            <h3 class="display-5">À propos</h3>

            <div>
                <label for="examination-name">Intitulé/nom du jury</label>
                <input type="text" id="examination-name" v-model="examinationName">
            </div>
            <div>
                <input type="checkbox"
                       id="from-existing-examination"
                       @change="isBasedOnAnotherExamination = !isBasedOnAnotherExamination">
                <label for="from-existing-examination">Repartir d'un jury existant</label>
                <div v-if="isBasedOnAnotherExamination && examinations.length > 0">
                    <label for="existing-examination">Veuillez choisir parmis la liste ci-dessous</label>
                    <select id="existing-examination">
                        <option v-for="examination in examinations">{{ examination.name }}</option>
                    </select>
                </div>
                <div v-if="isBasedOnAnotherExamination && examinations.length < 1">
                    <p>Vous n'avez pas encore créé de jury</p>
                </div>
            </div>
            <div>
                <label>Commence le :</label>
                <Datepicker v-model="examinationDate"
                            :disabled-dates="disabledDates">
                </Datepicker>
            </div>
        </section>

        <section>
            <h3 class="display-5">Membres du jury</h3>

            <user-select :users="users"
                         :list-from-state="examinersList"
                         v-on:users-selected="setExaminersList"
                         none-txt="Aucun membre du jury n'a été ajouté"
                         add-txt="Ajouter ce membre au jury"
                         create-txt="Créer l'utilisateur et l'ajouter au jury">
            </user-select>
        </section>

        <section>
            <h3 class="display-5">Projets à évaluer par ce jury</h3>

            <project-select :list-from-state="projectsList"
                            v-on:projects-selected="setProjectsList">
            </project-select>
        </section>

        <button type="button"
                class="btn btn-primary btn-lg btn-block mb-5"
                @click="$emit('to-step', 2)">
            Choisir les élèves participants
        </button>
    </div>
</template>

<script>
    import * as types from '../../store/types';

    import Datepicker from 'vuejs-datepicker';
    import UserSelect from '../User/SelectList.vue';
    import ProjectSelect from '../Project/SelectList.vue';

    export default {
        name: 'CreateStepOne',
        components: {
            Datepicker,
            UserSelect,
            ProjectSelect,
        },
        props: ['examinations', 'users'],
        data() {
            return {
                isBasedOnAnotherExamination: false,
                disabledDates: {
                    customPredictor(date) {
                        const now = new Date();
                        if (date.getTime() < (now.getTime() - 24 * 60 * 60 * 1000)) {
                            return true;
                        }
                    }
                },
            };
        },
        computed: {
            examinationName: {
                get() {
                    return this.$store.getters[types.GET_EXAMINATION_PROP]('name');
                },
                set(value) {
                    this.$store.dispatch(types.SET_EXAMINATION, ['name', value]);
                },
            },
            examinationDate: {
                get() {
                    return this.$store.getters[types.GET_EXAMINATION_PROP]('startingAt');
                },
                set(value) {
                    this.$store.dispatch(types.SET_EXAMINATION, ['startingAt', value]);
                }
            },
            examinersList() {
                return this.$store.getters[types.GET_EXAMINATION_PROP]('examinersList');
            },
            projectsList() {
                return this.$store.getters[types.GET_EXAMINATION_PROP]('projectsList');
            },
        },
        mounted() {
            this.$store.dispatch(types.FETCH_CURRENT_USER_AS_EXAMINER);
        },
        methods: {
            setExaminersList(list) {
                this.$store.dispatch(types.SET_EXAMINATION, ['examinersList', list]);
            },
            setProjectsList(list) {
                this.$store.dispatch(types.SET_EXAMINATION, ['projectsList', list]);
            },
        },
    }
</script>

<style scoped>

</style>
