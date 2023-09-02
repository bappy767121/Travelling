<template>
    <header class="blog-header">
        <!-- Main Menu -->
        <nav class="navbar navbar-expand-lg center-navigation shadow-lg" id="center-navigation">
            <div class="container">
                <Link class="navbar-brand" href="#"><img class="logo-dark d-sm-block d-lg-none" :src="logoPath"
                    alt="Logo-side"></Link>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="icofont icofont-navigation-menu"></i> </span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <Link class="nav-link" href="/" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Home
                            </Link>
                        </li>

                        <li class="nav-item dropdown">
                            <Link class="nav-link " href="/about" id="navbarDropdown3" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            About
                            </Link>
                        </li>
                        <li class="nav-item dropdown">
                            <Link class="nav-link " href="/contact" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Contact Us
                            </Link>
                        </li>

                        <li class="nav-item">
                            <Link class="nav-link page-scroll header-logo d-none d-lg-block" href="#"><img :src="logoPath"
                                alt="Logo" class="img-fluid"></Link>
                        </li>
                        <li class="nav-item dropdown">
                            <Link class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                            </Link>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                <Link v-for="category in categories" :key="category.id" :href="`/category/${category.id}/${category.name}`" class="dropdown-item">{{ category.name }}</Link>

                            </div>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link page-scroll " href="/video">Video</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link page-scroll " href="https://themeforest.net/user/dreambuzz/portfolio">Buy
                            Now</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
  
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  categories: Object
});

const logoPath = '/frontend/assets/images/logo.png'
</script>
  