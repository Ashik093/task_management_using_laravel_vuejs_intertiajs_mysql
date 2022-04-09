<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
defineProps({
    tasks:Object
})
</script>

<template>
    <Head title="Task" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="p-6" v-for="task in tasks" :key="task.id">
                                    <td class="p-6">{{task.title}}</td>
                                    <td class="p-6">{{task.description}}</td>
                                    <td class="p-6">{{task.date}}</td>
                                    <td class="p-6">{{task.duration}}</td>
                                    <td class="p-6"> <Link :href="route('task.edit',task.id)" class="underline text-sm text-red-600 hover:text-gray-900">Edit</Link> | <Link :href="route('task.delete',task.id)" class="underline text-sm text-red-600 hover:text-gray-900">Delete</Link></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
