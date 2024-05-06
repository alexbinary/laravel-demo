<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const { post } = defineProps({ post: Object })

const form = useForm({
  title: post.title,
  category: post.category,
  content: post.content,
  picture: null,
  _method: 'put',
})

</script>

<template>
    <Head title="Edit post" />
    
    <Link :href="$route('blogposts.index')">Home</Link>

    <h1>Edit post</h1>

    <form @submit.prevent="form.post($route('blogposts.update', { blogpost: post }))">
        <input type="text" name="title" v-model="form.title">
        <input type="text" name="category" v-model="form.category">
        <textarea name="content" v-model="form.content"></textarea>
        <input type="file" @input="form.picture = $event.target.files[0]" />
        <input type="submit" value="Submit">
    </form>

    <ul v-if="form.hasErrors">
        <li v-for="error in form.errors">{{ error }}</li>
    </ul>

</template>