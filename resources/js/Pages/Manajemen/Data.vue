<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2';

const { manajemen, username, data, sub, auth } = usePage().props;

$(document).ready(function () {

    var table = $('#example').DataTable({
        responsive: true
    })
        .columns.adjust()
        .responsive.recalc();
});

const form = useForm({
    skala: '',
});

const skalaOptions = [
    { value: 0, label: sub.ket_nilai_0 },
    { value: 4, label: sub.ket_nilai_4 },
    { value: 7, label: sub.ket_nilai_7 },
    { value: 10, label: sub.ket_nilai_10 }
];

const submitCreate = () => {
    form.post(route('manajemen.data.add', { id_sub: sub.id }), {
        onSuccess: () => {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Telah Menambahkan Data Baru',
                icon: 'success',
            }).then((result) => {
                location.reload();
            });
            form.reset();
        },
    });
}
</script>

<template>
    <Head title="Indikator Manajemen Puskesmas" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    {{ sub.nama }}
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
                                <Link :href="route('manajemen.index')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Manajemen Puskesmas</Link>
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
                                <Link :href="route('manajemen.detail', { id: manajemen.id })"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ manajemen.manajemen }}</Link>
                            </div>
                        </li>
                        <li v-if="auth.user.role == 'admin'">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <Link
                                    :href="route('manajemen.detail.admin', { id_manajemen: manajemen.id, id_sub: sub.id })"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ sub.nama_submanajemen }}</Link>
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
                                    {{ auth.user.role == 'admin' ? username : sub.nama_submanajemen }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <div v-if="auth.user.role == 'puskesmas'" class="grid sm:grid-cols-1 md:grid-cols-2 mb-6">
                        <form @submit.prevent="submitCreate" class="space-y-2 w-full">
                            <InputLabel>Skala</InputLabel>
                            <div>
                                <select name="" id="" v-model="form.skala"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                    <option value="" disabled hidden class="text-gray-500">Pilih Skala</option>
                                    <option v-for="(opt, index) in skalaOptions" :key="index" :value="opt.value">{{
                                        opt.label }} </option>
                                </select>
                            </div>
                            <div class="flex items-center gap-4">
                                <button :disabled="form.processing" type="submit"
                                    class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600">Submit</button>
                                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr class="text-start">
                                <th data-priority="1">Tanggal</th>
                                <th data-priority="4">Skala</th>
                                <th data-priority="5">Keterangan Skala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, index) in data" :key="index">
                                <td>{{ dayjs(String(data.created_at)).format('DD MMMM YYYY') }}</td>
                                <td>{{ data.hasil }}</td>
                                <td>{{ data.ket_skala }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
