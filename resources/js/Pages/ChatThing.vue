<script setup>

import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    messages: {
        type: Array,
        required: true,
    },
});

</script>

<template>
<div class="">

    <div class="">
        <div v-for="message in messages">{{ message.text }}</div>
    </div>
    <TextInput placeholder="Type a message" />
    <PrimaryButton>Send</PrimaryButton>
</div>
</template>

<style scoped>

</style>
