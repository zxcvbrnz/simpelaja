<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Swal from 'sweetalert2';

const data = usePage().props.data;
const form = useForm({
    id_ukpp: data.id,
    subpelayanan: '',
    str_pembilang: '',
    str_penyebut: '',
    kali: '',
    target: '',
    str_target: '',
    satuan: '',
    type: '',
});

const submitCreate = () => {
    form.post(route('create.subpelayanan', { id: data.id }), {
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
    <Head title="Indikator Upaya Kesehatan Perseorangan dan Penunjang" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Indikator Upaya Kesehatan Perseorangan dan Penunjang (UKPP)
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
                                <Link :href="route('ukpp.pelayanan')"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Upaya Kesehatan Perseorangan dan Penunjang</Link>
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
                                <Link :href="route('pelayanan.detail', { id: data.id })"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ data.pelayanan }}
                                </Link>
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
                                <InputLabel for="nama" value="Nama Program" />

                                <TextInput id="nama" v-model="form.subpelayanan" type="text" class="mt-1 block w-full"
                                    autocomplete="nama" />

                                <InputError :message="form.errors.subpelayanan" class="mt-2" />
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

                                    <TextInput id="str_target" v-model="form.str_target" type="text"
                                        class="mt-1 block w-full" autocomplete="str_target" />

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
                                    <input type="radio" name="type" id="type1" v-model="form.type" value="1">
                                    <InputLabel for="type1" value="Type 1" />
                                </div>
                                <div class="flex space-x-2">
                                    <input type="radio" name="type" id="type2" v-model="form.type" value="2">
                                    <InputLabel for="type2" value="Type 2" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel for="nama" value="Rumus" />
                                <div class="flex items-center">
                                    <!-- Display for Type 1 -->
                                    <div class="w-2/3" v-if="form.type === '1' || form.type === '2'">
                                        <!-- First input -->
                                        <TextInput id="str_pembilang" v-model="form.str_pembilang" type="text"
                                            class="mt-1 block w-full" autocomplete="str_pembilang" />
                                        <InputError :message="form.errors.str_pembilang" class="mt-2" />
                                    </div>
                                    <span v-if="form.type === '1'" class="font-bold px-3">x</span>
                                    <div class="w-1/3" v-if="form.type === '1'">
                                        <!-- Second input -->
                                        <TextInput id="kali" v-model="form.kali" type="number" class="mt-1 block w-full"
                                            autocomplete="kali" />
                                        <InputError :message="form.errors.kali" class="mt-2" />
                                    </div>
                                </div>
                                <div v-if="form.type === '1'">
                                    <!-- Display for Type 2 -->
                                    <TextInput id="str_penyebut" v-model="form.str_penyebut" type="text"
                                        class="mt-1 block w-full" autocomplete="str_penyebut" />
                                    <InputError :message="form.errors.str_penyebut" class="mt-2" />
                                </div>
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
