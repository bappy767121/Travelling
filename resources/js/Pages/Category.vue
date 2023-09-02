<template>
<Head :title="category.name" />
<Navbar :categories="categories"/>

<div class="page-header jumbotron p-3 p-md-5 text-white" :style="{ background: getImageUrl(category.image) }">
        <div class="dark-overlay"></div>
        <div class="container">
            <div class="col-md-6 px-0 mx-auto ">
                <div class="text-center page-banner-coontent">
                    <h2>{{category.name}}</h2>
                    <p>Eum perspiciatis Ipsa explicabo rerum veritatis repellat atque id quidem cumque et temporibus eaque.</p>
                </div>
            </div>
        </div>
    </div>
    <Contaner :sblogs="sblogs" :fblogs="fblogs" :mblogs="mblogs" :rblogs="rblogs"/>
    <Popular :blogs="blogs"/>
    <Footer/>
</template>
<script setup>
import Contaner from '../Components/Contaner.vue';
import Footer from '../Components/Footer.vue';
import Navbar from '../Components/Navbar.vue';
import Popular from '../Components/Popular.vue';
import { usePage, Link, Head } from '@inertiajs/vue3';

const { props } = usePage();
const blogs = props.blogs;
const categories = props.categories;
const category = props.category;
const fblogs = props.fblogs;
const mblogs = props.mblogs;
const rblogs = props.mblogs;
const sblogs = props.sblogs;
const getImageUrl = (imageName) => {
    // Ensure that the image path is correctly formed
    return `url(/uploads/${imageName})`;
};
</script>