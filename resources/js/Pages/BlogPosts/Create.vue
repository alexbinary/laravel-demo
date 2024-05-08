<script setup>
import { Head } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import Layout from '../Layout.vue'
import Title from '../Title.vue'
import HomeLink from '../HomeLink.vue'

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

        <form @submit.prevent="form.post($route('blogposts.store'))">

            <div class="grid">
            
                <div class="grid mb-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" v-model="form.title" class="border p-2 rounded bg-gray-50">
                    <p v-if="form.errors.title" class="text-red-800">{{ form.errors.title }}</p>
                </div>

                <div class="grid mb-2">
                    <label for="category">Category</label>
                    <input type="text" name="category" v-model="form.category" class="border p-2 rounded bg-gray-50">
                    <p v-if="form.errors.category" class="text-red-800">{{ form.errors.category }}</p>
                </div>

                <div class="grid mb-2">
                    <label for="content">Content</label>
                    <textarea name="content" v-model="form.content" class="border p-2 rounded bg-gray-50 h-80"></textarea>
                    <p v-if="form.errors.content" class="text-red-800">{{ form.errors.content }}</p>
                </div>
                
                <div class="grid mb-2">
                    <label for="picture">Picture</label>
                    <input name="picture" type="file" @input="form.picture = $event.target.files[0]" />
                </div>

            </div>

            <input type="submit" value="Submit" class="border border-gray-400 p-2 rounded-md bg-gray-200 hover:bg-gray-300 mt-4">
        </form>
    </Layout>
</template>