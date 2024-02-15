<script setup>
import { usePage } from '@inertiajs/vue3';
import SideLink from './SideLink.vue';

// const request = usePage().props.request
</script>
<template>
    <aside id="sidebar-multi-level-sidebar font-roboto leading-4"
        class="shadow-lg fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="relative h-full px-3 py-4 overflow-y-auto bg-polynesian-blue transition-all ease-in-out duration-300">
            <ul class="space-y-2 text-slate-300 font-thin text-sm">
                <li>
                    <div class="flex items-center p-4 rounded-lg space-x-3">
                        <!-- <img width="50em" src="" alt="puskesmas"> -->
                        <span class=" font-thin font-salsa text-xl text-white leading-tight">
                            Simpel Aja
                        </span>
                    </div>
                </li>
                <hr>
                <li>
                    <div class="flex items-center px-4 pt-3 rounded-lg">
                        <span class="text-md leading-tight font-bold text-slate-400">
                            Menu
                        </span>
                    </div>
                </li>
                <li>
                    <SideLink class="items-center" :href="route('dashboard')" :active="route().current('dashboard')">
                        <!-- :active="route().current('dashboard')" -->
                        <svg aria-hidden="true" class="w-6 h-6 transition duration-75 text-white" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </SideLink>
                </li>
                <li v-if="$page.props.auth.user.role == 'admin'">
                    <SideLink :href="route('data.puskesmas')" :active="route().current('data.puskesmas')
                        || route().current('detail.puskesmas')
                        || route().current('add.puskesmas')
                        || route().current('detail.puskesmas.desa')
                        || route().current('detail.puskesmas.sdm')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition duration-75 text-white"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <span class="ml-3">Puskesmas</span>
                    </SideLink>
                </li>
                <li v-if="$page.props.auth.user.role == 'puskesmas'">
                    <SideLink :href="route('detail.profil')" :active="route().current('detail.profil')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition duration-75 text-white"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <span class="ml-3">Detail Puskesmas</span>
                    </SideLink>
                </li>
                <li>
                    <div class="flex items-center px-4 pt-3 rounded-lg text-slate-400">
                        <span class="text-md font-bold leading-tight">
                            Indikator
                        </span>
                    </div>
                </li>
                <li>
                    <SideLink :href="route('ukm.program')" :active="route().current('ukm.program')
                        || route().current('program.detail')
                        || route().current('program.detail.data')
                        || route().current('program.detail.admin')
                        || route().current('program.detail.admin.user')
                        || route().current('add.ukms')
                        || route().current('edit.ukm')
                        || route().current('add.subprogram')
                        || route().current('edit.subprogram')
                        ">
                        <span class="ms-10">UKM</span>
                    </SideLink>
                </li>
                <li>
                    <SideLink :href="route('ukpp.pelayanan')" :active="route().current('ukpp.pelayanan')
                        || route().current('pelayanan.detail')
                        || route().current('pelayanan.detail.data')
                        || route().current('pelayanan.detail.admin')
                        || route().current('pelayanan.detail.admin.user')
                        || route().current('add.ukpps')
                        || route().current('edit.ukpp')
                        || route().current('add.subpelayanan')
                        || route().current('edit.subpelayanan')
                        ">
                        <span class="ms-10">UKPP</span>
                    </SideLink>
                </li>
                <li>
                    <SideLink :href="route('dashboard')">

                        <span class="ms-10">Manajemen</span>
                    </SideLink>
                </li>
                <li>
                    <SideLink :href="route('dashboard')">

                        <span class="ms-10">Nasional Mutu</span>
                    </SideLink>
                </li>
            </ul>
            <div class="text-slate-400 absolute bottom-0 text-xs font-thin -ms-3">
                Copyright @Tebarkode Teknologi
            </div>
        </div>
    </aside>
</template>