<template>
    <transition name="modal">
        <div class="modal-mask" v-if="showModal">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header" class="modal-title">
                            En savoir plus
                        </slot>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                                @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <slot name="body" :open-modal="openModal">
                            Erreur : aucun message à afficher
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    @click="closeModal">
                                Annuler
                            </button>
                            <button type="button"
                                    class="btn btn-primary"
                                    @click="saveChanges">
                                Enregistrer
                            </button>
                        </slot>
                    </div>

                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    // Based on: https://vuejs.org/v2/examples/modal.html
    export default {
        name: 'BaseModal',
        data() {
            return {
                showModal: false,
            };
        },
        methods: {
            openModal() {
                this.showModal = true;
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                this.showModal = false;
                document.body.style.overflow = 'auto';
            },
            saveChanges() {
                this.$emit('saveChanges');
                this.closeModal();
            },
        },
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: block;
        transition: opacity .3s ease;
        overflow-y: auto;
        max-height: 100vh;
    }

    .modal-wrapper {
        min-height: calc(100% - (2rem * 2));
        display: flex;
        align-items: center;
    }

    .modal-container {
        width: 85%;
        max-width: 70em;
        margin: 2rem auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
