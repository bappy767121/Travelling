<template>
    <Head :title="blog.title" />
    <Navbar :categories="categories" />

    <div class="page-header jumbotron p-3 p-md-5 text-white" :style="{ backgroundImage: getImageUrl(blog.image1) }">
        <div class="dark-overlay"></div>
        <div class="container">
            <div class="col-md-6 px-0 mx-auto ">
                <div class="text-center page-banner-coontent">
                    <h2>{{ blog.title }}</h2>

                </div>
            </div>
        </div>
    </div>
    <main class="container">
        <div class="row">
            <div class="col-md-8 blog-main col-sm-7">
                <div class="blog-post text-center blog-post-single">
                    <div class="blog-block-img">
                        <img :src="blogImageUrl(blog.image1)" alt="" class="img-fluid">
                    </div>
                    <p class="blog-post-cat">Lifestyle</p>
                    <a href="#">
                        <h2 class="blog-post-title">{{ blog.title }}</h2>
                    </a>


                    <div class="col-md-12 blog-main col-sm-12" v-html="blog.content"></div>

                    <div class="single-tags tagcloud">
                        <a href="#" rel="tag">Stories</a>
                        <a href="#" rel="tag">Technology</a>
                        <a href="#" rel="tag">Tips</a>
                        <a href="#" rel="tag">WordPress</a>
                    </div>
                </div>
                <!-- /.blog-post -->
                <div class="clearfix"></div>

                <!-- COMMENT SECTION  -->
                <div class="comment" id="respond">

                    <div class="section-header">
                        <h3>Leave a comment</h3>
                        <hr>
                    </div>


                    <form action="#" method="post" id="commentform" class="comment-form">
                        <p class="comment-notes">
                            <span id="email-notes">Your email address will not be published.</span> Required fields are
                            marked <span class="required">*</span>
                        </p>

                        <p class="comment-form-comment">
                            <label for="comment">Comment</label>
                            <textarea id="comment" name="comment" cols="45" rows="8" required="required"></textarea>
                        </p>

                        <p class="comment-form-author">
                            <label for="author">Name <span class="required">*</span></label>
                            <input id="author" name="author" value="" size="30" required="required" type="text">
                        </p>

                        <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label>
                            <input id="email" name="email" value="" size="30" required="required" type="text">
                        </p>

                        <p class="comment-form-url"><label for="url">Website</label>
                            <input id="url" name="url" value="" size="30" type="text">
                        </p>

                        <p class="form-submit">
                            <a href="#" class="btn btn-sm btn-dark">COmment Submit</a>
                        </p>
                    </form>
                </div>
                <!--  COMMENT SECTION  END -->
            </div>
            <!-- /.blog-main -->

            <!-- blog-main SIDEBAR RIGHT -->
            <BlogSlider />
            <!-- /.blog-sidebar -->
        </div>
        <!-- /.row -->
    </main>
    <!-- <Contaner :blogs="blogs"/> -->
    <Popular />
    <Footer />
</template>
<script setup>
import BlogSlider from '../Components/BlogSlider.vue';
import Footer from '../Components/Footer.vue';
import Navbar from '../Components/Navbar.vue';
import Popular from '../Components/Popular.vue';
import { usePage, Head } from '@inertiajs/vue3';

const { props } = usePage();
const blog = props.blog;
const categories = props.categories;
const getImageUrl = (imageName) => {
    // Ensure that the image path is correctly formed
    return `url(/uploads/${imageName})`;
};
const blogImageUrl = (imageName) => {
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