<?php

namespace App\Http\Controllers;

use App\Models\Herro;
use App\Models\PopulerBlog;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = PopulerBlog::with('category')->whereNull('video')->where('section_id', 1)->take(4)->get();
        $sblogs = PopulerBlog::with('category')->whereNull('video')->where('section_id', 3)->take(5)->get();
        $mblogs = PopulerBlog::with('category')->whereNull('video')->whereNull('section_id')->orderBy('created_at', 'DESC')->get();
        $fblogs = PopulerBlog::with('category')->where('section_id', 2)->take(2)->get();
        $rblogs = PopulerBlog::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
        $categories = Category::get();
        $herro = Herro::where('id', 6)->first();
        return Inertia::render('Home', [
            'blogs' => $blogs,
            'categories' => $categories,
            'herro' => $herro,
            'fblogs' => $fblogs,
            'rblogs'=>$rblogs,
            'mblogs' => $mblogs,
            'sblogs' => $sblogs,
        ])
            ->withViewData(['title' => 'Home Page']);
    }

    public function about()
    {
        $categories = Category::get();
        return Inertia::render('About', ['categories' => $categories])->withViewData(['title' => 'About Us']);
    }
    public function contact()
    {
        $categories = Category::get();
        return Inertia::render('Contact', ['categories' => $categories])->withViewData(['title' => 'Contact Us']);
    }

    public function postByCategory($id, $name)
    {
        $blogs = PopulerBlog::with('category')->whereNull('video')->where('section_id', 1)->take(5)->get();
        $sblogs = PopulerBlog::with('category')->whereNull('video')->where('section_id', 3)->take(5)->get();
        $mblogs = PopulerBlog::with('category')->whereNull('video')->where('category_id', $id)->orderBy('created_at', 'DESC')->get();
        $fblogs = PopulerBlog::with('category')->where('section_id', 2)->take(2)->get();
        $categories = Category::get();
        $category = Category::where('id', $id)->first();
        $rblogs = PopulerBlog::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
        return Inertia::render('Category', ['categories' => $categories, 'blogs' => $blogs, 'sblogs' => $sblogs,'category' => $category, 'fblogs' => $fblogs, 'mblogs'=>$mblogs, 'rblogs'=>$rblogs])->withViewData(['title' => 'Contact Us']);
    }

    public function videoPost()
    {
        $categories = Category::get();
        $rblogs = PopulerBlog::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
        $pblogs = PopulerBlog::with('category')->whereNull('video')->where('section_id', 1)->take(5)->get();
        $blogs = PopulerBlog::with('category')->whereNotNull('video')->get();
        return Inertia::render('Video', ['blogs' => $blogs,'rblogs' => $rblogs,'pblogs' => $pblogs, 'categories' => $categories])->withViewData(['title' => 'Home Page']);
    }

    public function singleBlog($id, $name)
    {
        $categories = Category::get();
        $blog = PopulerBlog::where('id', $id)->first();
        $rblogs = PopulerBlog::with('category')->orderBy('created_at', 'DESC')->take(5)->get();
        // dd( $blog);
        return Inertia::render('SingleBlog', ['categories' => $categories, 'blog' => $blog, 'rblogs' => $rblogs])->withViewData(['title' => 'Contact Us']);
    }
}