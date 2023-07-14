<template>
    <Head title="Home">
        <meta
            type="description"
            content="Home information"
            head-key="description"
        />
    </Head>
    <h1 class="text-4xl font-bold">Blog</h1>
    <br />

    <Highlight :code="snippet" />
</template>

<script setup>
import Highlight from '@/Components/Highlight.vue'
let snippet = `
class Example
{
    public function __construct()
    {
        //
    }
}`.trim()
</script>
