<template>
    <div>
        <base-modal ref="baseModal" @saveChanges="pushCustomWeighting">
            <h5 slot="header">
                Pondération personnalisée de {{ user.name }}
            </h5>
            <template slot="body">
                <ul v-if="weightingsList.length > 0">
                    <base-details v-for="(project, key) in weightingsList"
                                  :key="key"
                                  :project="project"
                                  @updateData="saveWeightings($event, key)">
                    </base-details>
                </ul>
            </template>
        </base-modal>
    </div>
</template>

<script>
    import * as types from '../../store/types';
    import mixingMethods from '../../mixins/methods';

    import BaseModal from "../shared/BaseModal.vue";
    import BaseDetails from "../Project/BaseDetails";

    export default {
        name: 'WeightingDashboard',
        components: {BaseModal, BaseDetails},
        mixins: [mixingMethods],
        props: ['projectsList', 'user'],
        data() {
            return {
                weightingsList: this.customWeightingsForUser || [],
            };
        },
        computed: {
            customWeightingsForUser() {
                return this.$store.getters[types.GET_CUSTOM_WEIGHTING_FOR_USER](this.user.id);
            },
        },
        methods: {
            openModal() {
                this.weightingsList = this.customWeightingsForUser.length ? this.customWeightingsForUser : _.cloneDeep(this.projectsList);
                this.$refs.baseModal.openModal();
            },
            saveWeightings(value, project) {
                this.weightingsList[project] = value;
            },
            pushCustomWeighting() {
                const src = this.weightingsList;
                for (let project in src) {
                    if (src.hasOwnProperty(project)) {
                        this.$store.dispatch(
                            types.PUSH_OR_SET_CUSTOM_WEIGHTING,
                            {
                                ...src[project],
                                apply_for_user: this.user.id
                            }
                        );
                    }
                }
            },
        },
    }
</script>

<style scoped>

</style>
