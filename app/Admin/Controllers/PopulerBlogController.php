<?php

namespace App\Admin\Controllers;

use App\Models\BlogSection;
use App\Models\Category;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\PopulerBlog;

class PopulerBlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PopulerBlog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PopulerBlog());

        $grid->column('title', __('Title'));
        $grid->column(('category.name'));
        $grid->column('image1')->image();
        $grid->column('image2')->image();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PopulerBlog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('category_id', __('Category id'));
        $show->field('image1')->image();
        $show->field('image2')->image();
        // $show->field("video", "Video")->file($server = '', $download = true);
        // $show->field('content')->ckeditor('content');
        $show->field('meta_title', __('Meta title'));
        $show->field('meta_key', __('Meta key'));
        $show->field('meta_des', __('Meta des'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PopulerBlog());

        $form->text('title', __('Title'));
        $form->text('subtitle', __('Subtitle'));
        $form->select('category_id', __("Category"))->options(Category::all()->pluck('name', 'id'));
        $form->image('image1', 'Image1')->removable();
        $form->image('image2', 'Image2')->removable();
        $form->file('video', 'Video')->removable();
        $form->select('section_id', __("Section"))->options(BlogSection::all()->pluck('name', 'id'));
        $form->ckeditor('content');
        $form->text('meta_title', __('Meta title'));
        $form->text('meta_key', __('Meta key'));
        $form->textarea('meta_des', __('Meta des'));

        return $form;
    }
}