<template>
    <!-- Paginator -->
    <div>
        <component
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            :is="link.url ? 'Link' : 'span'"
            class="px-1"
            :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }"
        >
        </component>
    </div>
</template>

<script setup>
defineProps({
    links: Array
})
</script>
