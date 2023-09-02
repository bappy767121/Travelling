<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    blogs: {
        type: Object,
        default: () => ({}),
    },
    categories: Array
});

const form = useForm({
    title: "",
    subtitle: "",
    content: "",
    image: null,
    video: null,
    category: "", // Updated to category_id
    slug: "",
});

// Fetch categories and populate the categories array



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
    formData.append("content", form.content);
    formData.append("image", form.image);
    formData.append("video", form.video);
    formData.append("category_id", form.category); // Use category_id
    formData.append("slug", form.slug);

    form.post(route("blogs.store"), formData);
};
</script>

<template>
    <Head title="Blog Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blog Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
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
                                <InputLabel for="title" value="Title" />

                                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                    autofocus autocomplete="username" />

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
                                <InputLabel for="image" value="Image" />

                                <input id="image" type="file" class="mt-1 block " accept="image/*"
                                    @change="onImageChange" />

                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>
                            <div>
                                <InputLabel for="video" value="Video" />

                                <input id="video" type="file" class="mt-1 block" accept="video/*" @change="onVideoChange" />

                                <InputError class="mt-2" :message="form.errors.video" />
                            </div>

                            <div class="my-6">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                                <textarea type="text" v-model="form.content" name="content" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.content" class="text-sm text-red-600">
                                    {{ form.errors.content }}
                                </div>
                            </div>
                            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>