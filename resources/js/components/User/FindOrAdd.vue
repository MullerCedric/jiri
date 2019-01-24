<template>
    <div>
        <label for="examiner-name">Nom : </label>
        <input type="text"
               id="examiner-name"
               placeholder="John Doe"
               list="users-list"
               v-model="userName">

        <datalist id="users-list" title="Suggestion d'utilisateurs existants">
            <option v-for="user in unusedUsers"
                    :value="user.name">
                {{ user.email }}
            </option>
        </datalist>
        <base-accordion v-if="!exists"
                        more-txt="+ Créer un nouvel utilisateur"
                        less-txt="- Annuler">
            <template slot-scope="{ closeExpansion }">
                <label for="examiner-email">Adresse e-mail : </label>
                <input type="email"
                       id="examiner-email"
                       placeholder="example@domain.com"
                       @keyup.enter="addUser(closeExpansion)"
                       v-model="userEmail">
                <button type="button"
                        class="btn btn-primary btn-lg m-auto d-block"
                        @click="addUser(closeExpansion)">
                    {{ createTxt || 'Créer l\'utilisateur' }}
                </button>
            </template>
        </base-accordion>
        <div v-else>
            <button type="button"
                    class="btn btn-primary btn-lg m-auto d-block"
                    @click="emitUser(exists)">
                {{ addTxt || 'Ajouter cet utilisateur' }}
            </button>
        </div>
    </div>
</template>

<script>
    import * as types from '../../store/types';

    import BaseAccordion from '../shared/BaseAccordion.vue';

    export default {
        name: 'UserFindOrAdd',
        components: {BaseAccordion},
        props: ['users', 'addTxt', 'createTxt', 'omitUsers'],
        data() {
            return {
                userName: '',
                userEmail: '',
            };
        },
        computed: {
            exists() {
                return (_.find(this.users, ['name', this.userName.trim()])
                    || _.find(this.users, ['email', this.userName.trim()]));
            },
            unusedUsers() {
                let unused = _.cloneDeep(this.users);
                for (let i = 0, len = this.omitUsers.length; i < len; i++) {
                    _.remove(unused, { id: this.omitUsers[i].id });
                }
                return unused;
            },
        },
        methods: {
            emitUser(user) {
                this.$emit('user-selected', user);
                this.userName = '';
                this.userEmail = '';
            },
            addUser(closeExpansion) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,63})+$/.test(this.userEmail) && this.userName.length > 2) {
                    const newUser = this.$store.dispatch(
                        types.SAVE_USER,
                        {
                            name: this.userName,
                            email: this.userEmail,
                        }
                    );
                    this.emitUser({
                        id: newUser.id,
                        name: newUser.name,
                        email: newUser.email,
                    });

                    closeExpansion();
                }
            },
        },
    }
</script>

<style scoped>

</style>
