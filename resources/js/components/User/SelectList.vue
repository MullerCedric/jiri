<template>
    <div>
        <user-find-or-add @user-selected="addUser"
                          :users="users"
                          :add-txt="addTxt"
                          :create-txt="createTxt"
                          :omit-users="localUsersList">
        </user-find-or-add>

        <ul v-if="localUsersList.length > 0">
            <li v-for="(user, key) in localUsersList" :key="key">
                <span :title="user.email">
                    {{ user.name }}
                </span>
                <span v-if="hasCustomWeightings(user.id)">◾</span>
                <button type="button" @click="$refs.weightingDashboard[key].openModal()"
                        v-if="withModal && projectsList.length > 0">
                    🖋️
                </button>
                <button type="button" @click="removeUser(user)">
                    ❌
                </button>

                <weighting-dashboard v-if="withModal"
                                     :projects-list="projectsList"
                                     :user="user"
                                     ref="weightingDashboard">
                </weighting-dashboard>
            </li>
        </ul>
        <p v-else>{{ noneTxt || 'Aucun utilisateur n\'a encore été ajouté' }}</p>
    </div>
</template>

<script>
    import * as types from '../../store/types';
    import mixingMethods from '../../mixins/methods';

    import UserFindOrAdd from "./FindOrAdd.vue";
    import WeightingDashboard from "./WeightingDashboard";

    export default {
        name: 'SelectList',
        components: {WeightingDashboard, UserFindOrAdd},
        mixins: [mixingMethods],
        props: ['users', 'listFromState', 'noneTxt', 'addTxt', 'createTxt', 'withModal'],
        data() {
            return {
                localUsersList: [],
            };
        },
        computed: {
            usersList() {
                return this.listFromState || [];
            },
            projectsList() {
                return this.$store.getters[types.GET_EXAMINATION_PROP]('projectsList');
            },
            weightingsList() {
                return this.$store.getters[types.GET_CUSTOM_WEIGHTING];
            },
        },
        watch: {
            usersList() {
                this.localUsersList = this.usersList;
            },
        },
        mounted() {
            this.localUsersList = this.listFromState || [];
        },
        methods: {
            addUser(user) {
                this.localUsersList.push({
                    id: parseInt(user.id, 10),
                    name: user.name,
                    email: user.email,
                });
                this.$emit('users-selected', this.localUsersList);
            },
            removeUser(user) {
                this.removeItem(this.localUsersList, user);
                this.$emit('users-selected', this.localUsersList);
            },
            hasCustomWeightings(userId) {
                return _.filter(this.weightingsList, {'apply_for_user': userId}).length;
            },
        },
    }
</script>

<style scoped>

</style>
