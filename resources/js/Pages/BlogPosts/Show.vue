<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import Layout from '../Layout.vue'
import Title from '../Title.vue'
import HomeLink from '../HomeLink.vue'

const props = defineProps({ post: Object, picture_url: String })

function del() {
    router.delete(route('blogposts.destroy', {blogpost: props.post}))
}
</script>

<template>
    <Head :title="post.title" />
    
    <Layout>
        <HomeLink></HomeLink>

        <p v-if="picture_url"><img :src="picture_url" width=200 /></p>

        <Title>{{ post.title }}</Title>
        <p class="text-gray-500 mb-2">Category: {{ post.category }}</p>

        <p>{{ post.content }}</p>

        <p class="mt-4">
            <Link :href="$route('blogposts.edit', {blogpost: post})"
                  class="border border-gray-400 p-2 rounded-md bg-gray-200
                       hover:bg-gray-300">
                Edit
            </Link>

            <button @click="del"
                class="border border-gray-400 p-2 rounded-md bg-red-200
                     hover:bg-red-300">
                Delete
            </button>
        </p>
    </Layout>
</template>