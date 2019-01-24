<template>
    <div>
        <section>
            <h3 class="display-5">Étudiants participants</h3>

            <user-select :users="users"
                         :list-from-state="studentsList"
                         v-on:users-selected="setExaminersList"
                         none-txt="Aucun étudiant n'a été ajouté"
                         add-txt="Ajouter cet étudiant au jury"
                         create-txt="Créer l'utilisateur et l'ajouter au jury"
                         :with-modal="true">
            </user-select>
        </section>

        <button type="button"
                class="btn btn-secondary btn-lg m-auto d-block"
                @click="$emit('to-step', 1)">
            Revenir à l'étape 1
        </button>

        <button type="button"
                class="btn btn-primary btn-lg btn-block mb-5"
                @click="$emit('save-examination')">
            Enregistrer ce jury
        </button>
    </div>
</template>

<script>
    import * as types from '../../store/types';

    import UserSelect from "../User/SelectList.vue";

    export default {
        name: 'CreateStepTwo',
        components: {UserSelect},
        props: ['users'],
        computed: {
            studentsList() {
                return this.$store.getters[types.GET_EXAMINATION_PROP]('studentsList');
            },
        },
        methods: {
            setExaminersList(list) {
                this.$store.dispatch(types.SET_EXAMINATION, ['studentsList', list]);
            },
        },
    }
</script>

<style scoped>

</style>
