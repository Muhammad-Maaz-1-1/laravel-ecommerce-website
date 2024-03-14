<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitorsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'user'], function () {
   
});
Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('maaz.sohail.ostech@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});
Route::get('/',[visitorsController::class,'index'])->name('home');
Route::get('/login',[adminController::class,'login'])->name('login');
Route::get('/search/shop',[visitorsController::class,'search'])->name('search');
Route::get('/shop',[visitorsController::class,'shop'])->name('shop');
Route::get('/mens/products',[visitorsController::class,'mensProduct'])->name('mens_products');
Route::get('/shop/category/{id}',[visitorsController::class,'shopCategory'])->name('shop_category');
Route::post('/shop/price/search',[visitorsController::class,'priceSearch'])->name('price_search');
Route::get('/product/detail/{id}',[visitorsController::class,'productDetail'])->name('product_detail');
Route::get('/cart',[visitorsController::class,'cart'])->name('cart');
Route::post('/cart/submit',[visitorsController::class,'cartSubmit'])->name('cart_submit');
Route::post('/shop/cart',[visitorsController::class,'shopCart'])->name('shop_cart');
// Route::post('/cart/update',[visitorsController::class,'cartQuantitySubmit'])->name('cart_quantity_update');
Route::post('/ajaxupload',[visitorsController::class,'ajaxupload'])->name('ajax_upload');
Route::get('/contact',[visitorsController::class,'contact'])->name('contact');
Route::get('/checkout',[visitorsController::class,'checkout'])->name('checkout');
Route::get('/blog',[visitorsController::class,'blog'])->name('blog');
Route::get('/blog/detail',[visitorsController::class,'blogDetail'])->name('blog_detail');
Route::get('/register',[visitorsController::class,'register'])->name('register');
Route::post('/signup/submit',[visitorsController::class,'signupSubmit'])->name('signup_submit');
Route::post('/login/submit',[visitorsController::class,'loginSubmit'])->name('login_submit');
Route::post('/logout',[visitorsController::class,'logout'])->name('logout');


// admin panel
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard',[adminController::class,'index'])->name('dashboard');
    Route::get('/table',[adminController::class,'table'])->name('table');
    Route::get('/category',[adminController::class,'category'])->name('category');
    Route::get('/category/form',[adminController::class,'categoryForm'])->name('category_form');
    Route::post('/category/form/submit',[adminController::class,'categoryFormSubmit'])->name('category_form_submit');
    Route::get('/product',[adminController::class,'product'])->name('product');
    Route::get('/product/gallery',[adminController::class,'productGallery'])->name('gallery_image');
    Route::get('/product/gallery/form',[adminController::class,'productGalleryForm'])->name('gallery_image_form');
    Route::post('/product/gallery/form/submit',[adminController::class,'productGalleryFormSubmit'])->name('gallery_image_form_submit');
    Route::get('/product/form',[adminController::class,'productForm'])->name('product_form');
    Route::post('/product/form/submit',[adminController::class,'productFormSubmit'])->name('product_form_submit');
    Route::get('/comment',[adminController::class,'productComment'])->name('product_comment');
    Route::get('/comment/form',[adminController::class,'productCommentForm'])->name('product_comment_form');
    
});


// Route::post('/product/checkout/process/submit',[adminController::class,'productGalleryFormSubmit'])->name('checkout_process');
Route::post('/checkout', [visitorsController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [visitorsController::class, 'process'])->name('stripe_process');
