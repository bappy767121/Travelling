<template>
  <div class="popular-wrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="post-header border-bottom text-center">
            <h3 class="">Popular post</h3>
            <p>Obcaecati voluptatem hic ducimus maiores accusantium adipisci aspernatur accusantium adipisci aspernatur.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-sm-6" v-for="populer in blogs" :key="populer.id">
          <a class="popular-post" href="">
            <img :src="getImageUrl(populer.image1)" alt="{{ populer.title }}" class="img-fluid">
            <div class="post-content">
              <h4 class="ptitle">{{ populer.title }}</h4>
              <p class="text-muted">{{ formatCreatedAt(populer.created_at) }}</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  blogs: Object
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
const imagePaths = {
  blogImg1: '/public/frontend/assets/images/blog/blog-img1.jpg',
  blogImg2: '/public/frontend/assets/images/blog/blog-img2.jpg',
  blogImg3: '/public/frontend/assets/images/blog/blog-img3.jpg'
};
</script>
  