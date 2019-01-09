<template>
    <section>
        <h2 class="display-4" v-text="examinations.length >= 2 ? 'Vos jurys à venir' : 'Votre jury à venir' "></h2>
        <div class="list-group">
            <div class="list-group-item"
                 v-for="examination in examinations"
                 :key="examination.id">
                <div class="float-right text-right">
                    <button type="button" class="btn btn-outline-secondary">Modifier ce jury</button>
                    <p class="small">Planifié pour le {{ convertDate(examination.starting_at) }}</p>
                </div>
                <p class="lead">Le jury <i>{{ examination.name }}</i> commencera dans<countdown :starting-date="examination.starting_at"></countdown></p>

                <p>Un e-mail sera envoyé aux membres du jury à la fin du décompte</p>
                <div>
                    <button type="button" class="btn btn-primary btn-lg m-auto d-block">Envoyer un e-mail maintenant</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Countdown from './Countdown.vue';

    export default {
        name: "ExaminationFuture",
        components: {
            Countdown
        },
        props: ['examinations'],
        methods: {
            convertDate(inputFormat) {
                function pad(s) { return (s < 10) ? '0' + s : s; }
                const d = new Date(inputFormat);
                return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/') + ' à ' + [pad(d.getHours()), d.getMinutes()].join('h');
            }
        },
    }
</script>

<style scoped>

</style>
