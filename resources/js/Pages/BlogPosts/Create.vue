<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import Layout from '../Layout.vue'
import Title from '../Title.vue'
import HomeLink from '../HomeLink.vue'
import BlogPostForm from '../BlogPostForm.vue'

const form = useForm({
  title: null,
  category: null,
  content: null,
  picture: null,
})

</script>

<template>
    <Head title="New post" />
    <Layout>
        <HomeLink></HomeLink>

        <Title>New post</Title>

        <BlogPostForm v-model="form" @submit="form.post($route('blogposts.store'))"></BlogPostForm>

    </Layout>
</template>