<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Detail User Puskesmas" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    Tambah User Puskesmas
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
                                    Tambah User Puskesmas
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-1 md:grid-cols-2 space-y-4 md:space-y-0 md:space-x-6">
                            <div>
                                <InputLabel for="name" value="Nama Puskesmas" />
                                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full"
                                    autocomplete="name" required />
                                <InputError :message="form.errors.name" class="mt-2" />
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full"
                                        autocomplete="email" required />
                                    <InputError :message="form.errors.email" class="mt-2" />
                                </div>
                                <div class="grid grid-cols-2 space-x-2">
                                    <div>
                                        <InputLabel for="password" value="Password" />
                                        <TextInput id="password" v-model="form.password" type="password"
                                            class="mt-1 block w-full" required autocomplete="password" />
                                        <InputError :message="form.errors.password" class="mt-2" />
                                    </div>
                                    <div>
                                        <InputLabel for="password_confirmation" value="Konfirmasi Password" />
                                        <TextInput id="password_confirmation" v-model="form.password_confirmation"
                                            type="password" required class="mt-1 block w-full"
                                            autocomplete="password_confirmation" />
                                        <InputError :message="form.errors.password_confirmation" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <Button
                                class="text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"
                                type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
