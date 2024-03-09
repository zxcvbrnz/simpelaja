<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Swal from 'sweetalert2';

const { data } = usePage().props;

const form = useForm({
    mutu: data.mutu,
    str_penyebut: data.str_penyebut,
    str_pembilang: data.str_pembilang,
    kali: data.kali,
    type: data.type,
    target: data.target,
    type_target: data.type_target,
    nilai_4: data.nilai_4,
    type_nilai_4: data.type_nilai_4,
    nilai_7_start: data.nilai_7_start,
    nilai_7_end: data.nilai_7_end,
    nilai_10: data.nilai_10,
    type_nilai_10: data.type_nilai_10,
});

const typeNah = [
    { value: '>', label: 1 },
    { value: '<', label: 2 },
    { value: '>=', label: 3 },
    { value: '<=', label: 4 }
];

const submitCreate = () => {
    form.patch(route('mutu.update', { id: data.id }), {
        onSuccess: () => {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Berhasil Memperbaharui Data',
                icon: 'success',
            });
        },
    });
}
</script>

<template>
    <Head title="Indikator Nasional Mutu" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Edit {{ data.mutu }}
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
                                    Edit {{ data.mutu }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <form @submit.prevent="submitCreate">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 space-y-3 pe-4">
                                <div>
                                    <InputLabel for="mutu" value="Nama Indikator" />

                                    <TextInput id="mutu" v-model="form.mutu" type="text" class="mt-1 block w-full"
                                        autocomplete="mutu" required />

                                    <InputError :message="form.errors.mutu" class="mt-2" />
                                </div>
                                <div class="flex space-x-6">
                                    <div class="flex space-x-2">
                                        <input type="radio" name="type" id="type1" v-model="form.type" value="1" />
                                        <InputLabel for="type1" value="Type 1" />
                                    </div>
                                    <div class="flex space-x-2">
                                        <input type="radio" name="type" id="type2" v-model="form.type" value="2" />
                                        <InputLabel for="type2" value="Type 2" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <InputLabel for="nama" value="Cara Perhitungan" />
                                    <div class="flex items-center">
                                        <!-- Display for Type 1 -->
                                        <div class="w-2/3" v-if="form.type === 1 || form.type === 2">
                                            <!-- First input -->
                                            <TextInput id="str_pembilang" v-model="form.str_pembilang" type="text" required
                                                class="mt-1 block w-full" autocomplete="str_pembilang" />
                                            <InputError :message="form.errors.str_pembilang" class="mt-2" />
                                        </div>
                                        <span v-if="form.type === 1" class="font-bold px-3">x</span>
                                        <div class="w-1/3" v-if="form.type === 1">
                                            <!-- Second input -->
                                            <TextInput id="kali" v-model="form.kali" type="number" class="mt-1 block w-full"
                                                autocomplete="kali" />
                                            <InputError :message="form.errors.kali" class="mt-2" />
                                        </div>
                                    </div>
                                    <div v-if="form.type === 1">
                                        <!-- Display for Type 2 -->
                                        <TextInput id="str_penyebut" v-model="form.str_penyebut" type="text"
                                            class="mt-1 block w-full" autocomplete="str_penyebut" />
                                        <InputError :message="form.errors.str_penyebut" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div>
                                    <InputLabel for="target" value="Target" />
                                    <div class="flex space-x-3">
                                        <select v-model="form.type_target"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1"
                                            required>
                                            <option value="null" disabled hidden>-</option>
                                            <option v-for="(opt, index) in typeNah" :key="index" :value="opt.label">{{
                                                opt.value }} </option>
                                        </select>
                                        <TextInput id="target" v-model="form.target" type="number" step="0.01"
                                            class="mt-1 block w-2/5" autocomplete="target" required />
                                        <span class="px-2 flex items-center font-bold"> % </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <InputLabel for="nilai_4" value="Nilai 4" />
                                    <div class="flex space-x-3">
                                        <select v-model="form.type_nilai_4"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1">
                                            <option value="null" disabled hidden>-</option>
                                            <option v-for="(opt, index) in typeNah" :key="index" :value="opt.label">{{
                                                opt.value }} </option>
                                        </select>
                                        <TextInput id="nilai_4" v-model="form.nilai_4" type="number" step="0.01"
                                            class="mt-1 block w-2/5" autocomplete="nilai_4" required />
                                        <span class="px-2 flex items-center font-bold"> % </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <InputLabel for="nilai_7" value="Nilai 7" />
                                    <div class="flex space-x-3">
                                        <TextInput id="nilai_7_start" v-model="form.nilai_7_start" type="number" step="0.01"
                                            required class="mt-1 block w-1/3" autocomplete="nilai_7_start" />
                                        <span class="px-2 flex items-center font-bold"> - </span>
                                        <TextInput id="nilai_7_end" v-model="form.nilai_7_end" type="number" step="0.01"
                                            required class="mt-1 block w-1/3" autocomplete="nilai_7_end" />
                                        <span class="px-2 flex items-center font-bold"> % </span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <InputLabel for="nilai_10" value="Nilai 10" />
                                    <div class="flex space-x-3">
                                        <select v-model="form.type_nilai_10"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1">
                                            <option value="null" disabled hidden>-</option>
                                            <option v-for="(opt, index) in typeNah" :key="index" :value="opt.label">{{
                                                opt.value }} </option>
                                        </select>
                                        <TextInput id="nilai_10" v-model="form.nilai_10" type="number" step="0.01" required
                                            class="mt-1 block w-2/5" autocomplete="nilai_10" />
                                        <span class="px-2 flex items-center font-bold"> % </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <button
                                class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"
                                :disabled="form.processing">Update</button>

                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Updated.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
