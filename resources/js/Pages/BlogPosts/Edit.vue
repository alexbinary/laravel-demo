<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import Layout from '../Layout.vue'
import Title from '../Title.vue'
import HomeLink from '../HomeLink.vue'
import BlogPostForm from '../BlogPostForm.vue'

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
    <Layout>
        <HomeLink></HomeLink>

        <Title>Edit post</Title>

        <BlogPostForm v-model="form" @submit="form.post($route('blogposts.update', { blogpost: post }))"></BlogPostForm>
        
    </Layout>
</template>