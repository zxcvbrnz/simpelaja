<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="px-4 md:px-0">
                        <div class="h-28 px-2 bg-icterina rounded-xl">
                            <div class="py-4 mx-4 font-bold">
                                <div>Jumlah Puskesmas</div>
                                <div class="text-5xl font-roboto font-medium mt-3">340</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:px-0">
                        <div class="h-28 bg-orange-web rounded-xl">
                            <div class="py-4 mx-4 font-bold">
                                <div>Jumlah Puskesmas</div>
                                <div class="text-5xl font-roboto font-medium mt-3">340</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:px-0">
                        <div class="h-28 bg-carolina-blue rounded-xl">
                            <div class="py-4 mx-4 font-bold">
                                <div>Jumlah Puskesmas</div>
                                <div class="text-5xl font-roboto font-medium mt-3">340</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:px-0">
                        <div class="h-28 bg-orange-web rounded-xl">
                            <div class="py-4 mx-4 font-bold">
                                <div>Jumlah Puskesmas</div>
                                <div class="text-5xl font-roboto font-medium mt-3">340</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
