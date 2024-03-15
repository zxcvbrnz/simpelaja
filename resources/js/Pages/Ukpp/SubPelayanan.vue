<script setup>
import { ref, onMounted, watch } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import Chart from 'chart.js/auto';

const { data, auth, name, capaian } = usePage().props;
const grapik = ref(usePage().props.grapik);
const form = useForm({
    start_time: '',
    end_time: '',
    id_ukm: name.id,
});

const filterData = async () => {
    await form.post(route('filter.pelayanan', { id: name.id }), {
        onSuccess: () => {
            grapik.value = usePage().props.grapik;
        }
    });
};

onMounted(() => {
    filterData();
});

watch(grapik, () => {
    updateChart();
});

let myChart;

const updateChart = () => {
    if (myChart) {
        myChart.data.datasets[0].data = data.map(item => grapik.value[item.id] || 0);
        myChart.update();
    }
};

$(document).ready(function () {
    var table = $('#example').DataTable({
        responsive: true
    })
        .columns.adjust()
        .responsive.recalc();

    const ctx = $('#myChart');

    myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: data.map(item => item.subpelayanan),
            datasets: [{
                label: 'Capaian',
                data: data.map(item => grapik.value[item.id] || 0),
                fill: true,
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgb(54, 162, 235)",
                pointBackgroundColor: "rgb(54, 162, 235)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(54, 162, 235)",
            },
            {
                label: "Target",
                data: data.map((item) => item.target),
                fill: true,
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgb(255, 99, 132)",
                pointBackgroundColor: "rgb(255, 99, 132)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(255, 99, 132)",
            },]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
</script>

<template>

    <Head title="Indikator Upaya Kesehatan Masyarakat" />

    <AuthenticatedLayout>
        <div class="py-4 font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-slate-500 leading-tight mb-4">
                    {{ name.pelayanan }}
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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                    {{ name.pelayanan }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-6 p-6 bg-white shadow-md rounded-sm">
                    <table id="example" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-start">No</th>
                                <th data-priority="2" class="text-start">Program</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, index) in  data " :key="index">
                                <td>
                                    <span class="font-bold">
                                        {{ index + 1 }}
                                    </span>
                                </td>
                                <td class="flex justify-between">
                                    <div class="flex items-center">
                                        <span class="ml-4 font-normal overflow-hidden whitespace-nowrap text-ellipsis">
                                            {{ data.subpelayanan }}
                                        </span>
                                        <div class="ml-4"
                                            v-for="(cap, index) in capaian.filter(item => item.id_subpelayanan_ukpp == data.id)"
                                            :key="index">
                                            <div>
                                                <div
                                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 rounded-lg dark:bg-green-800 dark:text-green-200">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <Link
                                        :href="route('pelayanan.detail.data', { id_pelayanan: name.id, id_sub: data.id })"
                                        class="text-teal-600 hover:text-teal-500">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form @submit.prevent="filterData" class="flex my-6 space-x-2 pt-10">
                        <TextInput v-model="form.start_time" type="date" class="mt-1 block w-full" required />
                        <TextInput v-model="form.end_time" type="date" class="mt-1 block w-full" required />
                        <button
                            class="text-sm text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"
                            :disabled="form.processing">Filter</button>
                    </form>
                    <a :href="route('ukpp.export', { start_time: form.start_time ? form.start_time : 0, end_time: form.end_time ? form.end_time : 0 })"
                        class=" text-sm text-white shadow-sm shadow-teal-300 px-4 py-2 rounded-sm bg-teal-700 hover:bg-teal-600">
                        Export Excel</a>
                    <div class="m-auto">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="m-auto">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
