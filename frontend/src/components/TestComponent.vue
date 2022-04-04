<template>
    <div>
        <button @click="sendData">Send data</button>
        <p>
           {{passData}}
        </p>
    </div>
</template>

<script>
export default {
    props:['passData'],
    methods: {
        sendData() {
            this.$emit('sendData', "Child to parent")
        }
    }
}
</script>

<style lang="scss" scoped>
</style>