<template>
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6" v-for="blog in fblogs" :key="blog.id">
                <div class="card flex-md-row mb-4 box-shadow card-block">
                    <img class="flex-auto d-none d-lg-block img-fluid" :src="getImageUrl(blog.image1)"
                        alt="Card image cap">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{blog.category.name}}</strong>

                        <h4 class="mb-0 card-title">
                            <a class="text-dark " href="#">{{blog.title}}</a>
                        </h4>
                        <p class="text-muted">{{ formatCreatedAt(blog.created_at) }}</p>
                        <p class="card-text mb-auto mt-1">{{ blog.subtitle }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="container">
        <div class="row">
            <!-- <div v-for="blog in blogs" :key="blog.id" class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow card-block">
                    <img class="flex-auto d-none d-lg-block img-fluid" :src="blog.imageSrc" alt="Card image cap">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ blog.slug }}</strong>
                        <h4 class="mb-0 card-title">
                            <a class="text-dark" :href="blog.link">{{ blog.title }}</a>
                        </h4>
                        <p class="text-muted">{{ blog.date }}</p>
                        <p class="card-text mb-auto mt-1">{{ blog.content }}</p>
                    </div>
                </div>
            </div> -->
            <BlogPost :blogs="blogs" :mblogs="mblogs" :sblogs="sblogs"/>
            <BlogSlider :rblogs="rblogs"/>
        </div>
        <!-- /.row -->

    </main>
    <!-- /.container -->
</template>
<script setup>
import BlogPost from './BlogPost.vue';
import BlogSlider from './BlogSlider.vue';
import { defineProps } from 'vue';

const props = defineProps({
    blogs: Object,
    fblogs: Object,
    rblogs: Object,
    mblogs:Object,
    sblogs:Object
});
const getImageUrl = (imageName) => {
  return `/uploads/${imageName}`;
};
const formatCreatedAt = (createdAt) => {
  const date = new Date(createdAt);
  const day = date.getDate();
  const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
  ];
  
  const ordinalSuffix = (day >= 11 && day <= 13) ? 'th' : (day % 10 === 1) ? 'st' : (day % 10 === 2) ? 'nd' : (day % 10 === 3) ? 'rd' : 'th';
  const formattedDate = `${day}${ordinalSuffix} ${monthNames[date.getMonth()]} ${date.getFullYear()}`;
  
  return formattedDate;
};
</script>