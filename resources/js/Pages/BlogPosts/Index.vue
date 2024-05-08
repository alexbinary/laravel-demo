<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import Layout from '../Layout.vue'

defineProps({ posts: Array })
</script>

<template>
  <Head title="Blog Posts" />
  <Layout>
    <h1 class="text-3xl mb-4 font-bold">
      Hello, Blog posts
    </h1>

    <ul class="flex flex-wrap justify-start gap-4 mb-5">
      <li v-for="post in posts" class="w-80 border border-gray-200 bg-gray-50 p-2 rounded">
        <Link :href="$route('blogposts.show', {blogpost: post})">
          {{ post.title }}
        </Link>
      </li>
    </ul>
    <p v-if="posts.length===0">No posts</p>

    <p class="mt-4">
      <Link :href="$route('blogposts.create')"
            class="border border-gray-400 p-2 rounded-md bg-gray-200
                    hover:bg-gray-300">
        New post
      </Link>
    </p>
  </Layout>
</template>