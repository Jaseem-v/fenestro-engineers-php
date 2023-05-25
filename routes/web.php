<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});


Route::get('/', [App\Http\Controllers\WebController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('about');
Route::get('/bookDemo', [App\Http\Controllers\WebController::class, 'bookDemo'])->name('bookDemo');
Route::post('/bookDemo', [App\Http\Controllers\WebController::class, 'bookDemo_post'])->name('bookDemo_post');
Route::get('/testimonial', [App\Http\Controllers\WebController::class, 'testimonial'])->name('testimonial');
Route::post('/testimonial_post', [App\Http\Controllers\WebController::class, 'testimonial_post'])->name('testimonial_post');
Route::get('/products', [App\Http\Controllers\WebController::class, 'products'])->name('products');
Route::get('/product/{url}', [App\Http\Controllers\WebController::class, 'product_single'])->name('product_single');
Route::get('/gallery', [App\Http\Controllers\WebController::class, 'gallery'])->name('gallery');
Route::get('/blog', [App\Http\Controllers\WebController::class, 'blog'])->name('blog');
Route::get('/blog/{url}', [App\Http\Controllers\WebController::class, 'blog_single'])->name('blog_single');
Route::get('/contact', [App\Http\Controllers\WebController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\WebController::class, 'contact_post'])->name('contact_post');
Route::get('/aaa', [App\Http\Controllers\WebController::class, 'aaa'])->name('aaa');

//Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function()
{

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');


    //SliderController
    Route::get('/slider', [App\Http\Controllers\Admin\SliderController::class,'index'])->name('admin.slider');
    Route::get('/slider/create', [App\Http\Controllers\Admin\SliderController::class,'create'])->name('admin.slider.create');
    Route::post('/slider/create', [App\Http\Controllers\Admin\SliderController::class,'save'])->name('admin.slider.save');
    Route::get('/slider/edit/{id}', [App\Http\Controllers\Admin\SliderController::class,'editShow'])->name('admin.slider.editShow');
    Route::post('/slider/edit/{id}', [App\Http\Controllers\Admin\SliderController::class,'editSave'])->name('admin.slider.editSave');
    Route::post('/slider/delete/{id}', [App\Http\Controllers\Admin\SliderController::class,'delete'])->name('admin.slider.delete');


    //ProductsCategoriesController
    Route::get('/product/categories', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'index'])->name('admin.prod_categories');
    Route::get('/product/categories/create', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'create'])->name('admin.prod_categories.create');
    Route::post('/product/categories/create', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'save'])->name('admin.prod_categories.save');
    Route::get('/product/categories/edit/{id}', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'editShow'])->name('admin.prod_categories.editShow');
    Route::post('/product/categories/edit/{id}', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'editSave'])->name('admin.prod_categories.editSave');
    Route::post('/product/categories/delete/{id}', [App\Http\Controllers\Admin\ProductsCategoriesController::class,'delete'])->name('admin.prod_categories.delete');




    //ProductController
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.products');
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.products.create');
    Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class,'save'])->name('admin.products.save');
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class,'editShow'])->name('admin.products.editShow');
    Route::post('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class,'editSave'])->name('admin.products.editSave');
    Route::post('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class,'delete'])->name('admin.products.delete');
    //Products Image Upload
    Route::get('/product_images', [App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product_images');
    Route::post('/product_images/img_uploads/{product_id}',  [App\Http\Controllers\Admin\ProductController::class,'image_uploads'])->name('admin.product_images.img_uploads');
    Route::get('/product_images/img_delete/{id}', [App\Http\Controllers\Admin\ProductController::class,'image_delete'])->name('admin.product_images.img_delete');
    Route::get('/product_images/img_fetch/{product_id}', [App\Http\Controllers\Admin\ProductController::class,'images_fetch'])->name('admin.product_images.img_fetch');






    //BlogController
    Route::get('/blog', [App\Http\Controllers\Admin\BlogController::class,'index'])->name('admin.blog');
    Route::get('/blog/create', [App\Http\Controllers\Admin\BlogController::class,'create'])->name('admin.blog.create');
    Route::post('/blog/create', [App\Http\Controllers\Admin\BlogController::class,'save'])->name('admin.blog.save');
    Route::get('/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class,'editShow'])->name('admin.blog.editShow');
    Route::post('/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class,'editSave'])->name('admin.blog.editSave');
    Route::post('/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class,'delete'])->name('admin.blog.delete');

    //Gallery
    Route::get('/gallery', [App\Http\Controllers\Admin\GalleryController::class,'index'])->name('admin.gallery');
    Route::post('/gallery/img_uploads',  [App\Http\Controllers\Admin\GalleryController::class,'image_uploads'])->name('admin.gallery.img_uploads');
    Route::get('/gallery/img_delete/{id}', [App\Http\Controllers\Admin\GalleryController::class,'image_delete'])->name('admin.gallery.img_delete');
    Route::get('/gallery/img_fetch', [App\Http\Controllers\Admin\GalleryController::class,'images_fetch'])->name('admin.gallery.img_fetch');



    //Testimonials
    Route::get('/testimonials', [App\Http\Controllers\Admin\TestimonialsController::class,'index'])->name('admin.testimonials');
    Route::post('/add_testimonial', [App\Http\Controllers\Admin\TestimonialsController::class,'add_testimonial_post'])->name('admin.add_testimonial_post');
    Route::post('/testimonial_delete/{id}', [App\Http\Controllers\Admin\TestimonialsController::class,'testimonial_delete'])->name('admin.testimonial_delete');
    Route::post('/testimonial_status/{id}', [App\Http\Controllers\Admin\TestimonialsController::class,'testimonial_status'])->name('admin.testimonial_status_ajx');


    //SettingsController
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class,'show'])->name('admin.settings');
    Route::post('/settings/update', [App\Http\Controllers\Admin\SettingsController::class,'update'])->name('admin.settings_post');




    Route::group(['controller' => App\Http\Controllers\Admin\Profile::class], function() {
        //Settings
        Route::get('/profile', 'index')->name('admin.profile');
        Route::post('/profile/change_email', 'change_email')->name('admin.profile_change_email');
        Route::post('/profile/change_password', 'change_password')->name('admin.profile_change_password');
    });

});

