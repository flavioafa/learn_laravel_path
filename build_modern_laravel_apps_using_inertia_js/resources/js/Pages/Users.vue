<template>
    <h1 class="text-4xl font-bold">
        Users
    </h1>
    <Nav />
    <div style="margin-top:1400px">
        The current time is {{ time }}
    </div>
    <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
</template>

<script setup>
import Nav from '../Shared/Nav.vue'
import { Link } from '@inertiajs/vue3';

defineProps({
    time: String
})

</script>
