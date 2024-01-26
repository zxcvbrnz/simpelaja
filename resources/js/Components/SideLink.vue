<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'flex items-center bg-orange-web text-slate-950 py-2 px-2 rounded-sm' : 'flex items-center hover:bg-orange-web hover:text-slate-950 py-2 px-2 transition duration-300 easy-in-out rounded-sm'
);
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
