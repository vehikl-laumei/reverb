<script setup>

import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    messages: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    message: '',
});

const submit = () => {
    form.post('/messages');
}

</script>

<template>
    <div class="">

        <div class="">
            <div v-for="message in messages">{{ message.text }}</div>
        </div>
        <form @submit.prevent="submit" action="">
            <TextInput v-model="form.message" placeholder="Type a message"/>
            <PrimaryButton>Send</PrimaryButton>
        </form>
    </div>
</template>

<style scoped>

</style>
