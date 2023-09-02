<template>
    <Navbar :categories="categories" />
    <div class="page-header jumbotron p-3 p-md-5 text-white">
        <div class="dark-overlay"></div>
        <div class="container">
            <div class="col-md-6 px-0 mx-auto ">
                <div class="text-center page-banner-coontent">
                    <h2>My Video</h2>
                    <p>Eum perspiciatis Ipsa explicabo rerum veritatis repellat atque id quidem cumque et temporibus eaque.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <div class="row">
            <div class="col-md-8 blog-main col-sm-7">
                <div v-for="blog in slicedBlogs" :key="blog.id" class="blog-post">
                    <div align="center" class="embed-responsive embed-responsive-16by9">
                        <video loop controls class="embed-responsive-item">
                            <source :src="getVideo(blog.video)" type="video/mp4">
                        </video>
                    </div>
                    <p class="blog-post-cat">{{ blog.category.name }}</p>
                    <a href="#">
                        <h2 class="blog-post-title">{{ blog.title }}</h2>
                    </a>
                    <p class="py-3">{{ blog.content }}</p>

                    <a href="#" class="read-more">Continue Reading</a>
                </div>
                <!-- /.blog-post -->

                <!-- Blog Paginator -->

                <div class="pagination-controls">
                    <button class="page-button" :disabled="pagination.currentPage === 1"
                        @click="pagination.currentPage -= 1">
                        Previous
                    </button>
                    <span>{{ pagination.currentPage }}</span>
                    <button class="page-button"
                        :disabled="pagination.currentPage * pagination.itemsPerPage >= filteredBlogs.length"
                        @click="pagination.currentPage += 1">
                        Next
                    </button>
                </div>

            </div>
            <!-- /.blog-main -->



            <!-- blog-main SIDEBAR RIGHT -->
            <aside class="col-md-4 blog-sidebar col-sm-5">

                <div class="p-3 mb-3 bg-light rounded text-center">
                    <div class="top-header ">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Username">
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
        </div>
        <!-- /.row -->

    </main>
    <Popular :blogs="pblogs" />
    <Footer />
</template>
<script setup>
import Footer from '../Components/Footer.vue';
import Navbar from '../components/Navbar.vue';
import Popular from '../components/Popular.vue';
const aboutImagePath = '/frontend/assets/images/blog/author.jpeg'
const widget1Path = '/frontend/assets/images/blog/widget-1.jpg'
const widget2Path = '/frontend/assets/images/blog/widget-2.jpg'
const widget3Path = '/frontend/assets/images/blog/widget-3.jpg'
const widget4Path = '/frontend/assets/images/blog/widget-4.jpg'
import { computed, reactive } from 'vue';
const props = defineProps({
    blogs: {
        type: Object,
        default: () => ({}),
    },
    categories: {
        type: Object,
        default: () => ({}),
    },
    rblogs: {
        type: Object,
        default: () => ({}),
    },
    pblogs: {
        type: Object,
        default: () => ({}),
    },

});
const pagination = reactive({
    currentPage: 1,
    itemsPerPage: 5,
});

const filteredBlogs = computed(() => {
    return props.blogs;
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
const getVideo = (imageName) => {
    return `/uploads/${imageName}`;
};
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
