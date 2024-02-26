<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Swal from 'sweetalert2';

const data = usePage().props.data;
const form = useForm({
    id_manajemen: data.id,
    nama_submanajemen: '',
    ket_nilai_0: '',
    ket_nilai_4: '',
    ket_nilai_7: '',
    ket_nilai_10: '',
});

const submitCreate = () => {
    form.post(route('submanajemen.creating', { id: data.id }), {
        onSuccess: () => {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Telah Menambahkan Data Baru',
                icon: 'success',
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
                                <Link :href="route('manajemen.detail', { id: data.id })"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ data.manajemen }}</Link>
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
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <form @submit.prevent="submitCreate" class="flex flex-wrap">
                        <div class="w-full md:w-1/2 space-y-3 pe-4">
                            <div>
                                <InputLabel for="nama_submanajemen" value="Nama Manajemen" />

                                <TextInput id="nama_submanajemen" v-model="form.nama_submanajemen" type="text"
                                    class="mt-1 block w-full" autocomplete="nama_submanajemen" />

                                <InputError :message="form.errors.nama_submanajemen" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="ket_nilai_0" value="Keterangan Nilai 0" />

                                <TextInput id="ket_nilai_0" v-model="form.ket_nilai_0" type="text" class="mt-1 block w-full"
                                    autocomplete="ket_nilai_0" />

                                <InputError :message="form.errors.ket_nilai_0" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="ket_nilai_4" value="Keterangan Nilai 4" />

                                <TextInput id="ket_nilai_4" v-model="form.ket_nilai_4" type="text" class="mt-1 block w-full"
                                    autocomplete="ket_nilai_4" />

                                <InputError :message="form.errors.ket_nilai_4" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 space-y-3">
                            <div>
                                <InputLabel for="ket_nilai_7" value="Keterangan Nilai 7" />

                                <TextInput id="ket_nilai_7" v-model="form.ket_nilai_7" type="text" class="mt-1 block w-full"
                                    autocomplete="ket_nilai_7" />

                                <InputError :message="form.errors.ket_nilai_7" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="ket_nilai_10" value="Keterangan Nilai 10" />

                                <TextInput id="ket_nilai_10" v-model="form.ket_nilai_10" type="text"
                                    class="mt-1 block w-full" autocomplete="ket_nilai_10" />

                                <InputError :message="form.errors.ket_nilai_10" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" :disabled="form.processing"
                                class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600">
                                <span>Submit</span>
                            </button>
                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Created.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
