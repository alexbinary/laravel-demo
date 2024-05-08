<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <p class="mb-4">
        <Link :href="$route('blogposts.index')" class="text-gray-500">< Home</Link>
    </p>
</template>