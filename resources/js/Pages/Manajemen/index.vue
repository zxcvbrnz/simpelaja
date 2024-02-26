<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const data = usePage().props.data;
</script>

<template>
    <Head title="Indikator Upaya Kesehatan Masyarakat" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Indikator Manajemen Puskesmas
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
                                    Manajemen Puskesmas
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-6 p-6">
                    <Link v-for="(data, index) in data" :key="index" :href="route('manajemen.detail', { id: data.id })"
                        class="group relative cursor-pointer overflow-hidden bg-white px-2 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10 sm:w-72 md:w-56 lg:w-full h-[9rem]">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full group-hover:bg-gradient-to-r group-hover:from-cyan-500 group-hover:to-purple-400 transition-all duration-300 group-hover:scale-[10] "></span>
                    <div class="flex relative z-10 mx-auto max-w-md">
                        <span class="grid h-20 w-20 place-items-center rounded-full transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="transition-all text-slate-400 w-20 h-20 group-hover:text-white" viewBox="0 0 16 16">
                                <path
                                    d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z" />
                                <path
                                    d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z" />
                            </svg>
                        </span>
                        <span
                            class="pt-5 ms-6 text-lg leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90 overflow-hidden whitespace-nowrap text-ellipsis">
                            {{ data.manajemen }}
                        </span>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
