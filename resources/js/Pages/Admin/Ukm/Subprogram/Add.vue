<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});
</script>

<template>
    <Head title="Indikator Upaya Kesehatan Masyarakat" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Indikator Upaya Kesehatan Masyarakat (UKM)
                </h2>
                <nav class="flex bg-white px-4 py-6 shadow-md" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <Link :href="route('dashboard')"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                            </Link>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                    Indikator
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <Link :href="route('ukm.program')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Upaya Kesehatan Masyarakat</Link>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                    Tambah
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-wrap mt-6 p-6 bg-white shadow-md rounded-sm">
                    <div class="w-full md:w-1/2 space-y-3 pe-4">
                        <div>
                            <InputLabel for="nama" value="Nama Program" />

                            <TextInput id="nama" v-model="form.nama" type="text" class="mt-1 block w-full"
                                autocomplete="nama" />

                            <InputError :message="form.errors.nama" class="mt-2" />
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div class="w-1/3">
                                <InputLabel for="target" value="Target" />

                                <TextInput id="target" v-model="form.target" type="number" class="mt-1 block w-full"
                                    autocomplete="target" />

                                <InputError :message="form.errors.target" class="mt-2" />
                            </div>
                            <div class="w-2/3">
                                <InputLabel for="str_target" value="Text Target" />

                                <TextInput id="str_target" v-model="form.str_target" type="text" class="mt-1 block w-full"
                                    autocomplete="str_target" />

                                <InputError :message="form.errors.str_target" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-1/2">
                            <InputLabel for="satuan" value="Satuan" />

                            <TextInput id="satuan" v-model="form.satuan" type="text" class="mt-1 block w-full"
                                autocomplete="satuan" />

                            <InputError :message="form.errors.satuan" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 space-y-3">
                        <InputLabel class="mb-3" value="Type Rumus" />
                        <div class="flex space-x-6">
                            <div class="flex space-x-2">
                                <input type="radio" name="type" id="type1" v-model="form.selectedType" value="type1">
                                <InputLabel for="type1" value="Type 1" />
                            </div>
                            <div class="flex space-x-2">
                                <input type="radio" name="type" id="type2" v-model="form.selectedType" value="type2">
                                <InputLabel for="type2" value="Type 2" />
                            </div>
                        </div>
                        <div class="w-full">
                            <InputLabel for="nama" value="Rumus" />
                            <div class="flex items-center">
                                <!-- Display for Type 1 -->
                                <div class="w-2/3" v-if="form.selectedType === 'type1' || form.selectedType === 'type2'">
                                    <!-- First input -->
                                    <TextInput id="nama" v-model="form.pembilang" type="text" class="mt-1 block w-full"
                                        autocomplete="nama" />
                                    <InputError :message="form.errors.pembilang" class="mt-2" />
                                </div>
                                <span v-if="form.selectedType === 'type1'" class="font-bold px-3">x</span>
                                <div class="w-1/3" v-if="form.selectedType === 'type1'">
                                    <!-- Second input -->
                                    <TextInput id="denominator" v-model="form.kali" type="text" class="mt-1 block w-full"
                                        autocomplete="kali" />
                                    <InputError :message="form.errors.kali" class="mt-2" />
                                </div>
                            </div>
                            <div v-if="form.selectedType === 'type1'">
                                <!-- Display for Type 2 -->
                                <TextInput id="penyebut" v-model="form.penyebut" type="text" class="mt-1 block w-full"
                                    autocomplete="penyebut" />
                                <InputError :message="form.errors.penyebut" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="flex pt-4 mb-4">
                        <Link :href="route('add.ukms')"
                            class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600">
                        <span>Submit</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
