<template>
    <section>
        <h2 class="display-4" v-text="examinations.length >= 2 ? 'Vos jurys terminés' : 'Votre jury terminé' "></h2>
        <div class="list-group">
            <a href="#"
               class="list-group-item list-group-item-action"
               v-for="examination in examinations"
               :key="examination.id">
                {{ examination.name }}
            </a>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ExaminationPast",
        props: ['examinations'],
    }
</script>

<style scoped>

</style>
