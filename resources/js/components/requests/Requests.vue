<template>
    <div>
        <div v-for="message in messages">
            <div class="align-items-center">
                {{ message.subject }}
            </div>
            <p>{{ message.body }}</p>
            <p>{{ message.created_at }}</p>
            <hr>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages'],
        name: "Requests",
        methods: {},
        mounted() {
            console.log(this.messages);
        }
    }
</script>

<style scoped>
.message-status {
    margin-left: 5px;
}
</style>