<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const data = usePage().props.data;
const user = usePage().props.auth.user;

const confirmDeletion = (id, name) => {
    const form = useForm({
        id: id,
    });
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: `Kamu akan menghapus desa ${name} ini!`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('desa.delete'), {
                onSuccess: () => {
                    Swal.fire({
                        title: "Dihapus!",
                        text: "Desa telah dihapus.",
                        icon: "success"
                    }).then((result) => {
                        location.reload();
                    });
                }
            });
        }
    });
};
$(document).ready(function () {

    var table = $('#example').DataTable({
        responsive: true
    })
        .columns.adjust()
        .responsive.recalc();
});
</script>

<template>
    <Head title="Desa" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Desa
                </h2>
                <nav class="flex bg-white px-4 py-6 shadow-md" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <Link :href="route('dashboard')"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg a-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
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
                                <Link :href="route('detail.profil')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Detail User {{ user.name }}</Link>
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
                                    Desa
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <div class="flex justify-end mb-4">
                        <Link :href="route('desa.create')"
                            class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                        </svg>
                        <span>Tambah Desa</span>
                        </Link>
                    </div>
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-start">Nama Desa</th>
                                <th data-priority="2" class="text-start">Jumlah Penduduk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, index) in data" :key="index">
                                <td>{{ data.nama_desa }}</td>
                                <td class="flex justify-between items-center">
                                    <span><span
                                            class="mr-5 font-bold overflow-hidden whitespace-nowrap text-ellipsis"></span>{{
                                                data.jumlah_penduduk }}</span>
                                    <div class="flex justify-center space-x-4 items-center">
                                        <Link :href="route('desa.edit', { id: data.id })"
                                            class="text-polynesian-blue hover:text-carolina-blue">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        </Link>
                                        <button @click="() => confirmDeletion(data.id, data.nama_desa)"
                                            class="text-red-600 hover:text-red-500">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
