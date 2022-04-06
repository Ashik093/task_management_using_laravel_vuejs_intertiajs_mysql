<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head ,useForm} from '@inertiajs/inertia-vue3';
const form = useForm({
    title: '',
    date: '',
    duration: '',
    description: ''
});

</script>

<template>
    <Head title="Task Add" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks Add
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                       <form @submit.prevent="form.post('/task/store')">
                           <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    <span>Enter Title</span>
                                </label>
                                <input type="text" id="title" v-model="form.title" class="w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <div v-if="form.errors.title">
                                    <p class="text-sm text-red-600">
                                        {{form.errors.title}}
                                    </p>
                                </div>
                           </div>
                           <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    <span>Enter Date</span>
                                </label>
                                <input type="date" id="date" v-model="form.date" class="w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <div v-if="form.errors.date">
                                    <p class="text-sm text-red-600">
                                        {{form.errors.date}}
                                    </p>
                                </div>
                           </div>
                           <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    <span>Enter Duration</span>
                                </label>
                                <input type="text" id="duration" v-model="form.duration" class="w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <div v-if="form.errors.duration">
                                    <p class="text-sm text-red-600">
                                        {{form.errors.duration}}
                                    </p>
                                </div>
                           </div>
                           
                            <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    <span>Enter Description</span>
                                </label>
                                <textarea type="text" id="description" v-model="form.description" class="w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                <div v-if="form.errors.description">
                                    <p class="text-sm text-red-600">
                                        {{form.errors.description}}
                                    </p>
                                </div>
                           </div>
                            <div>
                                <button type="submit"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
