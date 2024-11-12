<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ChatThing from "@/Pages/ChatThing.vue";

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    messages: {
        type: Array,
        required: true,
    }
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

Echo.channel('shart-chat')
    .listen('MessagePostedEvent', (e) => {
        console.log(e.message);
        props.messages.value.push(e.message);
    });
</script>

<template>
    <div class="bg-gray-50 ">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <ChatThing :messages="messages" />
                </main>
            </div>
        </div>
    </div>
</template>
