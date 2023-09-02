<template>
    <!-- blog-main SIDEBAR RIGHT -->
    <aside class="col-md-4 blog-sidebar col-sm-5">

        <div class="p-3 mb-3 bg-light rounded text-center">
            <div class="top-header ">
                <div class="input-group">
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 mb-3 bg-light rounded text-center">
            <div class="sidebar-about">
                <div class="about-img">
                    <img :src="aboutImagePath" alt="" class="img-fluid rounded-circle">
                </div>
                <h4 class="py-2">Hi! -That's Me</h4>
                <p class="mb-3">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                    purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>

                <ul class="list-inline social-link">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="py-3">
            <div class="sidebar-block">
                <h4 class="sidebar-title">Categories</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="#">Fashion <span>(10)</span></a></li>
                    <li><a href="#">Lifestyle <span>(5)</span></a></li>
                    <li><a href="#">Hairstyle <span>(7)</span></a></li>
                </ol>
            </div>
        </div>

        <div class="py-3">
            <div class="sidebar-block latest-post">
                <h4 class="sidebar-title">Latest Posts</h4>
                <ol class="list-unstyled">
                    <li v-for="blog in rblogs" :key="blog.id">
                        <a :href="`/blog/${blog.id}/${blog.title}`">
                            <div class="rpost-img">
                                <img :src="getImageUrl(blog.image1)" alt="{{ blog.title }}" class="img-fluid">
                            </div>
                            <h5>{{ blog.title }}</h5>
                            <p class="text-muted">{{ formatCreatedAt(blog.created_at) }}</p>
                        </a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="py-3">
            <div class="bg-light text-center subscribe">
                <h4 class="sidebar-title">Subscribe Now</h4>
                <p class="text-muted">Subscribe For latest Newsletter</p>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Type Your Email here">
                    <a href="#" class="btn btn-sm  btn-danger btn-rounded">Subscribe</a>
                </form>
                <p class="font-italic">Don't worry ! We don't spam</p>
            </div>
        </div>

    </aside>
    <!-- /.blog-sidebar -->
</template>
<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
  blogs: Object,
  categories: Object,
  rblogs:Object // Received blog data from parent component
});
const filteredBlogs = computed(() => {
  return props.blogs.filter(blog => blog.section_id === null);
});
const filteredPosts = computed(() => {
  return props.blogs.filter(populer => populer.section_id === 1);
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
const aboutImagePath = '/frontend/assets/images/blog/author.jpeg'
const widget1Path = '/frontend/assets/images/blog/widget-1.jpg'
const widget2Path = '/frontend/assets/images/blog/widget-2.jpg'
const widget3Path = '/frontend/assets/images/blog/widget-3.jpg'
const widget4Path = '/frontend/assets/images/blog/widget-4.jpg'
</script>