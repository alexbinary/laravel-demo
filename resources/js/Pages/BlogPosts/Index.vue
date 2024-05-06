<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

defineProps({ posts: Array })
</script>

<template>
  <Head title="Blog Posts" />
  <h1>Hello, Blog posts</h1>

  <ul>
    <li v-for="post in posts">
      <Link :href="$route('blogposts.show', {blogpost: post})">
        {{ post.title }}
      </Link>
    </li>
  </ul>
  <p v-if="posts.length===0">No posts</p>

  <p><Link :href="$route('blogposts.create')">New post</Link></p>
</template>