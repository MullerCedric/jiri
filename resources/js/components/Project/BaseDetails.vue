<template>
    <li>
        <input type="text"
               id="project-name"
               placeholder="[API/Vue] Jiri"
               v-model="projectName"
               disabled
               @input="$emit('updateData', {name: projectName, weighting: parseInt(projectWeighting, 10)})">
        <label for="project-weighting">Pondération : </label>
        <input type="number"
               id="project-weighting"
               placeholder="40"
               v-model="projectWeighting"
               @input="$emit('updateData', {name: projectName, weighting: parseInt(projectWeighting, 10)})">
        <span>%</span>
    </li>
</template>

<script>
    export default {
        name: 'BaseDetails',
        props: ['project'],
        data() {
            return {
                projectName: this.project.name,
                projectWeighting: this.project.weighting,
            };
        },
    }
</script>

<style scoped>

</style>
