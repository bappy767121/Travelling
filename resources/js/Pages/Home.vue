<template>
    <div>

        <Head title="Salman Mahmud" />
        <Navbar :categories="categories" />
        <Slider :herro="herro"/>
        <Contaner :sblogs="sblogs" :categories="categories" :fblogs="fblogs" :rblogs="rblogs" :mblogs="mblogs" />
        <Popular :blogs="blogs" />
        <Footer />
    </div>
</template>
  
<script setup>
import { Head } from "@inertiajs/vue3";
import Navbar from '../Components/Navbar.vue';
import Slider from '../Components/Slider.vue';
import Contaner from '../Components/Contaner.vue';
import Popular from '../Components/Popular.vue';
import Footer from '../Components/Footer.vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const blogs = props.blogs;
const sblogs = props.sblogs;
const categories = props.categories;
const herro = props.herro;
const fblogs = props.fblogs;
const rblogs = props.rblogs;
const mblogs = props.mblogs;

</script>
  