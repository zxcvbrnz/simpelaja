<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';

const user = usePage().props.userpuskesmas;
const profildummy = {
    Kepala_puskesmas: '-',
    alamat_puskesmas: '-',
    jumlah_pustu: '-',
    jumlah_poskesdes: '-',
    jumlah_ukbm: '-',
};
const profil = usePage().props.profil ? usePage().props.profil : profildummy;
const totalDesa = usePage().props.totalDesa;
const totalPenduduk = usePage().props.totalPenduduk;
const sdm = usePage().props.sdm;

</script>

<template>
    <Head title="Detail User Puskesmas" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Detail User Puskesmas
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
                                <Link :href="route('data.puskesmas')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Puskesmas</Link>
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
                                    Detail {{ user.name }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <div class="text-xl text-slate-600 mb-6">{{ user.name }}</div>
                    <div class="flex items-center space-x-6">
                        <table>
                            <tr class="mb-6">
                                <td>
                                    <InputLabel>Kepala Puskesmas</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ profil.Kepala_puskesmas }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Alamat</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ profil.alamat_puskesmas }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah Pustu</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ profil.jumlah_pustu }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah Poskesdes</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ profil.jumlah_poskesdes }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah UKBM</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ profil.jumlah_ukbm }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah Desa</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ totalDesa }}</span>
                                </td>
                                <td>
                                    <Link :href="route('detail.puskesmas.desa', { id: user.id })"
                                        class="text-sm font-medium underline text-blue-800 hover:text-blue-600">Detail >
                                    </Link>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah Penduduk</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ totalPenduduk }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <InputLabel>Jumlah SDM</InputLabel>
                                </td>
                                <td class="ps-6"> : </td>
                                <td>
                                    <span class="font-medium text-gray-700">{{ sdm }}</span>
                                </td>
                                <td>
                                    <Link :href="route('detail.puskesmas.sdm', { id: user.id })"
                                        class="text-sm font-medium underline text-blue-800 hover:text-blue-600">Detail >
                                    </Link>
                                </td>
                            </tr>
                        </table>
                        <!-- <InputLabel>Kepala Puskesmas :</InputLabel>
                        <span class="text-slate-600">{{ profil.Kepala_puskesmas }}</span> -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
