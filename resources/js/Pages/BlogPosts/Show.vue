<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const props = defineProps({ post: Object, picture_url: String })

function del() {
    router.delete(route('blogposts.destroy', {blogpost: props.post}))
}
</script>

<template>
    <Head :title="post.title" />
    
    <Link :href="$route('blogposts.index')">Home</Link>

    <p v-if="picture_url"><img :src="picture_url" width=200 /></p>

    <h1>{{ post.title }}</h1>
    <p>Category: {{ post.category }}</p>

    <p>{{ post.content }}</p>

    <p><button @click="del">Delete</button></p>

    <Link :href="$route('blogposts.edit', {blogpost: post})">Edit</Link>
  
</template>