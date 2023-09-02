<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('populer-blogs', PopulerBlogController::class);
    $router->resource('herros', HerroController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('blog-sections', BlogSectionController::class);$router->resource('blog-sections', BlogSectionController::class);

});
