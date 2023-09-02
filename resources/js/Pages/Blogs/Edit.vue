<template>
    <Head title="Blog Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blog Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="title" value="Title" />
                                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>

                            <div>
                                <InputLabel for="subtitle" value="Subtitle" />
                                <TextInput id="subtitle" type="text" class="mt-1 block w-full" v-model="form.subtitle" />
                                <InputError class="mt-2" :message="form.errors.subtitle" />
                            </div>

                            <div>
                                <InputLabel for="slug" value="Slug" />
                                <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" />
                                <InputError class="mt-2" :message="form.errors.slug" />
                            </div>

                            <div>
                                <InputLabel for="category" value="Category" />
                                <select id="category" class="mt-1 block w-full" v-model="form.category">
                                    <option value="" disabled>Select a category</option>
                                    <option v-for="category in categories" :value="category.id" :key="category.id">{{
                                        category.name }}</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.category" />
                            </div>

                            <div>
                                <InputLabel for="image" value="Image" />
                                <div v-if="props.blog.image">
                                    <img :src="props.blog.image" alt="Current Image" class="max-h-40 mt-2" />
                                </div>
                                <input id="image" type="file" class="mt-1 block" accept="image/*" @change="onImageChange" />
                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>
                            <div v-if="props.blog.video">
                                <video controls class="max-w-full mt-2">
                                    <source :src="props.blog.video" type="video/mp4" />
                                    <!-- Add more source elements for other video formats if needed -->
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div>
                                <InputLabel for="video" value="Video" />
                                <input id="video" type="file" class="mt-1 block" accept="video/*" @change="onVideoChange" />
                                <InputError class="mt-2" :message="form.errors.video" />
                            </div>

                            <div class="my-6">
                                <label for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                                <textarea v-model="form.content" name="content" id="content"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                                <InputError class="mt-2" :message="form.errors.content" />
                            </div>

                            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Update
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    blog: {
        type: Object,
        default: () => ({}),
    },
    categories: Array, // Pass the list of available categories as a prop
});

// Use the existing props to initialize the form data for editing
const form = useForm({
    title: props.blog.title,
    subtitle: props.blog.subtitle,
    image: null,
    video: null,
    slug: props.blog.slug,
    category: props.blog.category, // Assuming blog.category contains the selected category ID
    content: props.blog.content,
});

const onImageChange = (event) => {
    form.image = event.target.files[0];
};

const onVideoChange = (event) => {
    form.video = event.target.files[0];
};

const submit = () => {
    const formData = new FormData();
    formData.append("title", form.title);
    formData.append("subtitle", form.subtitle);
    formData.append("image", form.image);
    formData.append("video", form.video);
    formData.append("slug", form.slug);
    formData.append("category_id", form.category); // Assuming category_id is the correct field name
    formData.append("content", form.content);

    form.put(route("blogs.update", props.blog.id), formData);
};
</script>
