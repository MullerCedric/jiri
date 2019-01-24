<template>
    <span>
        {{ days | two_digits }} {{ days | plural('jour') }}, {{ hours | two_digits }} {{ hours | plural('heure') }}, {{ minutes | two_digits }} {{ minutes | plural('minute') }} et {{ seconds | two_digits }} {{ seconds | plural('seconde') }}
    </span>
</template>

<script>
    export default {
        name: 'Countdown',
        filters: {
            two_digits: function (value) {
                if (value < 0) {
                    return '00';
                }
                if (value.toString().length <= 1) {
                    return `0${value}`;
                }
                return value;
            },
            plural: function (value, text) {
                return value > 1 ? text + 's' : text;
            },
        },
        props: ['startingDate'],
        data() {
            return {
                now: Math.trunc((new Date()).getTime() / 1000)
            }
        },
        computed: {
            dateInMilliseconds() {
                return Math.trunc(Date.parse(this.startingDate) / 1000)
            },
            seconds() {
                return (this.dateInMilliseconds - this.now) % 60;
            },
            minutes() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
            },
            hours() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24;
            },
            days() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
            },
        },
        mounted() {
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);
        },
    }
</script>

<style scoped>

</style>
