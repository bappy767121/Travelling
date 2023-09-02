<template>
  <div class="banner-bg jumbotron p-3 p-md-5 text-white" 
      :style="{ backgroundImage: getImageUrl(herro.image) }">
      <div class="dark-overlay"></div>
      <div class="container">
          <div class="col-md-8 px-0 mx-auto ">
              <div class="text-center main-banner-coontent">
                  <h1 class="display-4 text-white">Become World of Supermodel New York </h1>
                  <p class="my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently
                      about what's most interesting in this post's contents.</p>
                  <a href="#" class="btn btn-danger mt-3 btn-rounded">View POst</a>
              </div>
          </div>
      </div>
  </div>
</template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
      herro: Object,
  });
  
  const getImageUrl = (imageName) => {
    // Ensure that the image path is correctly formed
    return `url(/uploads/${imageName})`;
  };
  </script>
  