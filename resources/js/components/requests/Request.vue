<template>
    <div class="user-messages">
        <form action="#" class="chat__form">
            <span class="chat__form-text">Тема сообщения</span>
            <input type="text" name="subject" class="chat__form-input chat__form-input-subject">
            <span class="chat__form-text">Текст сообщения</span>
            <textarea
                    name="body"
                    id=""
                    cols="30"
                    rows="4"
                    class="chat__form-input"
            >
            </textarea>
            <button class="btn btn-primary" type="submit">Отправить</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Request"
    }
</script>

<style scoped>
    .chat {
        background-color: #fff;
        border: 1px solid #d3e0e9;
        border-radius: 3px;
    }
    .chat__form-text {
        color: #777;
    }
    .chat__form-input {
        outline: none;
        border: 1px solid #d3e0e9;
        width: 100%;
        padding: 10px;
    }
    .chat__form-input-subject {
        margin-bottom: 10px;
        padding: 5px 10px;
    }
</style>