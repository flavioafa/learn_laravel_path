<template>
    <Head title="Create User" />
    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>
            <Link href="/users" class="text-blue-500 text-sm ml-3">Back</Link>
        </div>
    </div>
    <div class="mb-6">
        <p class="block mb-2 uppercase font-bold text-xs text-gray-700">
            {{ user.name }}
        </p>
        <p class="block mb-2 uppercase font-bold text-xs text-gray-700">
            {{ user.email }}
        </p>
        <p class="block mb-2 uppercase font-bold text-xs text-gray-700">
            {{ user.created_at }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    user: Object
})
</script>
