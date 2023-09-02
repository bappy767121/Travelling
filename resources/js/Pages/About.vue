<template>
  <Head title="About Us" />
  <div>
    <Navbar :categories="categories"/>
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="about-content">
              <h3>Who I am?</h3>
              <h5>A professional Marketer, Web developer.</h5>
              <p class="font-italic">
                Have five years' experience in photography, blogging. Love
                cycling, writing, singing, and traveling around the world.
              </p>
              <blockquote>
                <i class="icofont icofont-quote-left"></i> Don't Just Dream,
                Take action to Make it real.
              </blockquote>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro
                aut iste distinctio dicta beatae voluptates earum repellat,
                illum tempora. Tenetur dignissimos perferendis dolor, non quae
                maiores eveniet, in sit sint?
              </p>
              <p class="sign">Mike Hussy</p>
            </div>
          </div>

          <div class="col-lg-3">
            <img :src="imagePath" alt="" class="img-fluid">
          </div>
          <div class="col-lg-3">
            <img :src="imagePath" alt="" class="img-fluid">
          </div>

        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>
  
<script setup>
import Navbar from '../Components/Navbar.vue';
import Footer from '../Components/Footer.vue';
const imagePath = '/frontend/assets/images/blog/pic-1.jpg'
import { usePage, Head} from '@inertiajs/vue3';
const { props } = usePage();
const categories = props.categories;
</script>
  