<template>
    <div>
        <div>
            <div v-if="isExpanded">
                <slot :closeExpansion="closeExpansion"></slot>
            </div>
            <div>
                <button type="button" class="btn btn-outline-secondary" @click="toggleExpansion">
                    {{ showDetailsTxt }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'BaseAccordion',
        props: ['lessTxt', 'moreTxt'],
        data() {
            return {
                isExpanded: false,
            };
        },
        computed: {
            showDetailsTxt() {
                return this.isExpanded ? (this.lessTxt || '- Voir moins de détails') : (this.moreTxt || '+ Voir plus de détails');
            },
        },
        methods: {
            toggleExpansion() {
                this.isExpanded = !this.isExpanded;
            },
            closeExpansion() {
                this.isExpanded = false;
            }
        },
    }
</script>

<style scoped>

</style>
