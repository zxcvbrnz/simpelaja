<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage, Head } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const user = usePage().props.auth.user;
const totalDesa = usePage().props.totalDesa;
const totalPenduduk = usePage().props.totalPenduduk;
const sdm = usePage().props.sdm;
const profildummy = {
    Kepala_puskesmas: '',
    alamat_puskesmas: '',
    jumlah_pustu: '',
    jumlah_poskesdes: '',
    jumlah_ukbm: '',
};
const profil = usePage().props.profil ? usePage().props.profil : profildummy;

const form = useForm({
    id_users: user.id,
    Kepala_puskesmas: profil.Kepala_puskesmas,
    alamat_puskesmas: profil.alamat_puskesmas,
    jumlah_pustu: profil.jumlah_pustu,
    jumlah_poskesdes: profil.jumlah_poskesdes,
    jumlah_ukbm: profil.jumlah_ukbm,
});
const confirmProfilUpdate = () => {
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: `Kamu akan memperbaharui profil!`,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.patch(route('update.profil'), {
                onSuccess: () => {
                    Swal.fire({
                        title: "Diperbaharui!",
                        text: "Profil kamu telah diperbaharui.",
                        icon: "success"
                    });
                },
            });
        }
    });
};
const forms = useForm({
    totalDesa: totalDesa,
    totalPenduduk: totalPenduduk,
    sdm: sdm
});
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Detail Puskesmas" />
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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                    Detail User {{ user.name }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <form @submit.prevent="confirmProfilUpdate" class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <div>
                                <InputLabel for="kepala_puskesmas" value="Kepala Puskesmas" />

                                <TextInput id="kepala_puskesmas" type="text" class="mt-1 block w-full"
                                    v-model="form.Kepala_puskesmas" required autofocus autocomplete="Kepala_puskesmas" />

                                <InputError class="mt-2" :message="form.errors.Kepala_puskesmas" />
                            </div>
                            <div>
                                <InputLabel for="alamat_puskesmas" value="Alamat" />

                                <TextInput id="alamat_puskesmas" type="text" class="mt-1 block w-full"
                                    v-model="form.alamat_puskesmas" required autocomplete="alamat_puskesmas" />

                                <InputError class="mt-2" :message="form.errors.alamat_puskesmas" />
                            </div>
                            <div>
                                <InputLabel for="jumlah_pustu" value="Jumlah Pustu" />

                                <TextInput id="jumlah_pustu" type="number" class="mt-1 block w-full"
                                    v-model="form.jumlah_pustu" required autocomplete="jumlah_pustu" />

                                <InputError class="mt-2" :message="form.errors.jumlah_pustu" />
                            </div>
                            <div>
                                <InputLabel for="jumlah_poskesdes" value="Jumlah Poskesdes" />

                                <TextInput id="jumlah_poskesdes" type="number" class="mt-1 block w-full"
                                    v-model="form.jumlah_poskesdes" required autocomplete="jumlah_poskesdes" />

                                <InputError class="mt-2" :message="form.errors.jumlah_poskesdes" />
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <InputLabel for="jumlah_ukbm" value="Jumlah UKBM" />

                                <TextInput id="jumlah_ukbm" type="number" class="mt-1 block w-full"
                                    v-model="form.jumlah_ukbm" required autocomplete="jumlah_ukbm" />

                                <InputError class="mt-2" :message="form.errors.jumlah_ukbm" />
                            </div>
                            <div>
                                <InputLabel for="totalDesa" value="Desa" />
                                <div class="flex items-center space-x-4">
                                    <TextInput id="totalDesa" type="text" class="mt-1 block w-full"
                                        v-model="forms.totalDesa" readonly autocomplete="totalDesa" />
                                    <Link :href="route('desa')" class="text-teal-600 hover:text-teal-500">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </Link>
                                </div>

                                <InputError class="mt-2" :message="forms.errors.totalDesa" />
                            </div>
                            <div>
                                <InputLabel for="totalPenduduk" value="Penduduk" />

                                <TextInput id="totalPenduduk" type="text" class="mt-1 block w-full"
                                    v-model="forms.totalPenduduk" readonly autocomplete="totalPenduduk" />

                                <InputError class="mt-2" :message="forms.errors.totalPenduduk" />
                            </div>
                            <div>
                                <InputLabel for="sdm" value="SDM" />

                                <div class="flex items-center space-x-4">
                                    <TextInput id="sdm" type="text" class="mt-1 block w-full" v-model="forms.sdm" readonly
                                        autocomplete="sdm" />
                                    <Link :href="route('sdm')" class="text-teal-600 hover:text-teal-500">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </Link>
                                </div>

                                <InputError class="mt-2" :message="forms.errors.sdm" />
                            </div>
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <button
                                class="flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"
                                :disabled="form.processing">Submit</button>
                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Success.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
