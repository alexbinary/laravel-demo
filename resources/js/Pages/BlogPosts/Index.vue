<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import Layout from '../Layout.vue'
import Title from '../Title.vue'

defineProps({ posts: Array })
</script>

<template>
  <Head title="Blog Posts" />
  <Layout>
    <Title>Hello, Blog posts</Title>

    <ul class="flex flex-wrap justify-start gap-4 mb-5">
      <li v-for="{post,picture_url} in posts" class="w-80 border border-gray-200 bg-gray-50 rounded group hover:shadow hover:scale-105 transition overflow-hidden">
        <Link :href="$route('blogposts.show', {blogpost: post})">
          <img :src="picture_url" class="object-cover h-48 w-96"/>
          <div class="p-4">
            <p class="font-bold text-xl mb-2 line-clamp-2">{{ post.title }}</p>
            <p class="text-gray-500 line-clamp-4">{{ post.content }}</p>
            <p class="mt-3 text-right group-hover:text-blue-800">Read more</p>
          </div>
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