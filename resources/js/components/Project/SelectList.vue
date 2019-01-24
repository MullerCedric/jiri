<template>
    <div>
        <ul v-if="localProjectsList.length > 0">
            <li v-for="project in localProjectsList">
                <span>
                    {{ project.name }}
                </span>
                <span>
                    {{ project.weighting }}%
                </span>
                <button type="button" @click="removeProject(project)">❌</button>
            </li>
        </ul>
        <p v-else>{{ noneTxt || 'Aucun projet n\'a encore été ajouté' }}</p>

        <base-accordion more-txt="+ Ajouter un projet à évaluer" less-txt="- Annuler">
            <template slot-scope="{ closeExpansion }">
                <label for="project-name">Intitulé : </label>
                <input type="text"
                       id="project-name"
                       placeholder="[API/Vue] Jiri"
                       @keyup.enter="addProject(closeExpansion)"
                       v-model="projectName">
                <label for="project-weighting">Pondération : </label>
                <input type="number"
                       id="project-weighting"
                       placeholder="40"
                       @keyup.enter="addProject(closeExpansion)"
                       v-model="projectWeighting">
                <span>%</span>
                <button type="button"
                        class="btn btn-primary btn-lg m-auto d-block"
                        @click="addProject(closeExpansion)">
                    {{ addTxt || 'Ajouter' }}
                </button>
            </template>
        </base-accordion>
    </div>
</template>

<script>
    import mixingMethods from '../../mixins/methods';
    import * as types from '../../store/types';

    import BaseAccordion from '../shared/BaseAccordion.vue';

    export default {
        name: 'SelectList',
        components: {BaseAccordion},
        mixins: [mixingMethods],
        props: ['listFromState', 'noneTxt', 'addTxt'],
        data() {
            return {
                localProjectsList: [],
                projectName: '',
                projectWeighting: 30,
            };
        },
        computed: {
            projectsList() {
                return this.listFromState || [];
            },
        },
        watch: {
            projectsList() {
                this.localProjectsList = this.projectsList;
            }
        },
        mounted() {
            this.localProjectsList = this.listFromState || [];
        },
        methods: {
            addProject(closeExpansion) {
                this.localProjectsList.push({
                    name: this.projectName,
                    weighting: parseInt(this.projectWeighting, 10),
                });
                this.projectName = '';
                this.projectWeighting = 30;
                closeExpansion();
                this.$emit('projects-selected', this.localProjectsList);
            },
            removeProject(project) {
                this.removeItem(this.localProjectsList, project);
                this.$store.dispatch(types.REMOVE_CUSTOM_WEIGHTING, { name: project.name });
                this.$emit('projects-selected', this.localProjectsList);
            },
        },
    }
</script>

<style scoped>

</style>
