<template>
    <Head title="Users" />
    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">
                Users
            </h1>
            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-3">New User</Link>

        </div>
        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg" />
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users.data" :key="user.id" class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ user.id }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ user.name }}</td>
                                <td v-if="user.can.edit" class="whitespace-nowrap px-6 py-4">
                                    <Link :href="`/users/${user.id}/edit`">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <Pagination :links="users.links" class="mt-6" />
</template>

<script setup>
import { ref, watch } from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import { router } from '@inertiajs/vue3';
import debounce from 'lodash/debounce'

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object
})

let search = ref(props.filters.search) //Seta o valor do campo para o que foi digitado e volta do servidor

watch(search, debounce(function (value) {
    router.get('/users', {search: value}, {
        preserveState: true, //Mantem o estado do componente
        replace: true //Evita que a cada caractere digitado se crie um histórico no navegador
    })
},500))
</script>
