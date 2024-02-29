<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import dayjs from 'dayjs';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { data, user, sub } = usePage().props;

$(document).ready(function () {

    var table = $('#example').DataTable({
        responsive: true
    })
        .columns.adjust()
        .responsive.recalc();
});
</script>

<template>
    <Head title="Indikator Nasional Mutu" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Indikator Nasional Mutu
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
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <Link :href="route('nasionalmutu.index')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Nasional Mutu</Link>
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
                                    {{ sub.mutu }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-start">Puskesmas</th>
                                <th data-priority="2" class="text-start">Dilaporkan Pada</th>
                                <th data-priority="3" class="text-start">Nilai</th>
                                <th data-priority="4" class="text-start">Capaian</th>
                                <th data-priority="5" class="text-start">Target</th>
                                <th data-priority="6" class="text-start">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in user" :key="index">
                                <td>
                                    <span><span class="mr-5 font-bold">{{ index + 1 }}</span>{{ user.name }}</span>
                                </td>
                                <td>
                                    <div v-for="(data, index) in data.filter(item => item.id_users == user.id)"
                                        :key="index">
                                        {{ dayjs(String(data.created_at)).format('DD MMMM YYYY, HH:mm') }}
                                    </div>
                                </td>
                                <td>
                                    <div v-for="(data, index) in data.filter(item => item.id_users == user.id)"
                                        :key="index">
                                        {{ data.nilai }}
                                    </div>
                                </td>
                                <td>
                                    <div v-for="(data, index) in data.filter(item => item.id_users == user.id)"
                                        :key="index">
                                        {{ data.hasil + ' %' }}
                                    </div>
                                </td>
                                <td>
                                    {{ sub.target + ' %' }}
                                </td>
                                <td class="flex items-center">
                                    <Link :href="route('mutu.detail.admin.user', { id: sub.id, id_user: user.id })"
                                        class="text-teal-600 hover:text-teal-500">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
