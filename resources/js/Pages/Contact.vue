<template>
    <Navbar :categories="categories"/>
    <div class="page-header jumbotron p-3 p-md-5 text-white mb-0">
        <div class="dark-overlay"></div>
        <div class="container">
            <div class="col-md-6 px-0 mx-auto ">
                <div class="text-center page-banner-coontent">
                    <h2>Contact us</h2>
                    <p>Eum perspiciatis Ipsa explicabo rerum veritatis repellat atque id quidem cumque et temporibus eaque.</p>
                </div>
            </div>
        </div>
    </div>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div class="contact-form text-center">
                        <h3>Have any question on mind?</h3>
                        <p>Cum recusandae odio! Commodi officia illum eaque labore porro in aperiam.</p>
                        <p></p>
                        <form action="process.php">
                            <div class="form-group">
                                <input type="email" placeholder="Put your email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Write subject " name="subject" id="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Write Your Message" class="form-control"></textarea>
                            </div>
                            <a href="#" class="btn btn-danger">Send</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer/>
</template>
<script setup>
import Navbar from '../Components/Navbar.vue';
import Footer from '../Components/Footer.vue';
import { usePage } from '@inertiajs/vue3';
const { props } = usePage();
const categories = props.categories;


</script>