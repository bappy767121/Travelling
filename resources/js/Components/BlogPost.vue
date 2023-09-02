<template>
  <div class="col-md-8 blog-main col-sm-7">
    <!-- Blog Post 1 -->
    <div class="blog-post" v-for="populer in sblogs" :key="populer.id">
      <div class="blog-block-img">
        <img :src="getImageUrl(populer.image1)" alt="" class="img-fluid">
      </div>
      <p class="blog-post-cat">{{ populer.category.name }}</p>
      <a :href="`/blog/${populer.id}/${populer.title}`">
        <h2 class="blog-post-title">{{ populer.title }}</h2>
      </a>
      <p class="blog-post-meta">
        {{ formatCreatedAt(populer.created_at) }}
      </p>
      <p>
        {{ populer.subtitle }}
      </p>
      <a :href="`/blog/${populer.id}/${populer.title}`" class="read-more">Continue Reading</a>
    </div>

    <!-- Blog Post 2 -->
    <div class="blog-post" v-for="blog in slicedBlogs" :key="blog.id">
      <div class="row">
        <div class="col-lg-6">
          <div class="blog-post-thumbnail-zone">
            <img :src="getImageUrl(blog.image1)" alt="" class="img-fluid">
          </div>
        </div>
        <div class=" col-lg-6">
          <div class="blog-post-content">
            <p class="blog-post-cat mt0">{{ blog.category.name }}</p>
            <a :href="`/blog/${blog.id}/${blog.title}`">
              <h3>{{ blog.title }}</h3>
            </a>
            <p class="blog-post-meta">
              {{ formatCreatedAt(blog.created_at) }}
            </p>
            <p>
              {{ blog.subtitle }}
            </p>
            <a :href="`/blog/${blog.id}/${blog.title}`" class="read-more">Continue Reading</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Pagination controls -->
    <div class="pagination-controls">
      <button class="page-button" :disabled="pagination.currentPage === 1" @click="pagination.currentPage -= 1">
        Previous
      </button>
      <span>{{ pagination.currentPage }}</span>
      <button class="page-button" :disabled="pagination.currentPage * pagination.itemsPerPage >= filteredBlogs.length"
        @click="pagination.currentPage += 1">
        Next
      </button>
    </div>

    <!-- Blog Post 3 -->


  </div>
  <!-- /.blog-main -->
</template>
<script setup>
import { defineProps, computed, reactive } from 'vue';

const props = defineProps({
  blogs: Object,
  categories: Object,
  mblogs: Object,
  sblogs: Object,
});

const pagination = reactive({
  currentPage: 1,
  itemsPerPage: 5,
});

const filteredBlogs = computed(() => {
  return props.mblogs;
});


const slicedBlogs = computed(() => {
  if (Array.isArray(filteredBlogs.value)) {
    const startIndex = (pagination.currentPage - 1) * pagination.itemsPerPage;
    const endIndex = startIndex + pagination.itemsPerPage;
    return filteredBlogs.value.slice(startIndex, endIndex);
  } else {
    return [];
  }
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
<style setup>
p {
  text-align: justify;
}

.pagination-controls {
  display: flex;
  align-items: center;
  justify-content: right;
}

.page-button {
  background-color: #e9613f;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
}

.page-button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

.page-button:hover:not(:disabled) {
  background-color: #e23e32;
  transform: translateY(-2px);
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}
</style>