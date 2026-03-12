<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavouritesController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// Route::get('/', function () {
//     return view('index');
// })->name('index');
Route::controller(stripeController::class)->group(function(){

    Route::get('stripe/{price}', 'stripe')->name('stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});
Route::get('/shop',[CartController::class,'shop'])->name('shop');
Route::get('/whyus',[CartController::class,'whyus'])->name('whyus');
Route::get('/testimonial',[CartController::class,'testimonial'])->name('testimonial');
Route::get('/contact',[CartController::class,'contact'])->name('contact');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/', [UserController::class, 'show'])->name('index');
Route::get('/view-all-product',[UserController::class,'showall'])->name('showproduct');
 Route::get('/add-to-cart/{id}',[UserController::class,'addtocart'])->middleware(['auth', 'verified'])->name('addtocart1');
Route::get('/add-to-cart/{id}',[CartController::class,'addtocart'])->middleware(['auth', 'verified'])->name('addtocart');
Route::get('/cart-product',[CartController::class,'cartproduct'])->middleware(['auth', 'verified'])->name('cartproduct');
Route::delete('/delete-cart-product/{id}',[CartController::class,'deletecart'])->middleware(['auth', 'verified'])->name('deletecart');
route::get('/download-pdf/{id}',[OrderController::class,'downloadpdf'])->name('download_pdf');
Route::post('/change_status/{id}', [OrderController::class, 'changestatus'])->name('updateorderstatus');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/product_details/{id}',[ProductController::class,'productdetails'])->name('productdetails');
Route::post('/checkout',[CartController::class,'checkout'])->name('checkout')->middleware(['auth', 'verified']);
Route::get('/ordered_products',[OrderController::class,'orderedproduct'])->name('orderproduct')->middleware(['auth', 'verified']);
Route::post('/save-contact',[ContactController::class,'contact'])->name('save.contact')->middleware(['auth', 'verified']);
Route::post('/favourite/{id}',[FavouritesController::class,'favourite'])->name('favourite')->middleware(['auth', 'verified']);


Route::middleware('admin')->group(function () {
    Route::get('/test_admin', [AdminController::class, 'test'])->name('admin.test');
    Route::get('/add_category', [AdminController::class, 'addcategory'])->name('addcategory');
    Route::post('/category_add', [AdminController::class, 'storeCategory'])->name('category_add');
    Route::get('/view_category', [AdminController::class, 'viewcategory'])->name('viewcategory');
    Route::get('/edit_category/{id}', [AdminController::class, 'editcategory'])->name('editcategory');
    Route::post('/update_category/{id}', [AdminController::class, 'updatecategory'])->name('updatecategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deletecategory'])->name('deletecategory');
    Route::get('/add_product', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::post('/product_add', [ProductController::class, 'storeproduct'])->name('product_add');
    Route::get('/edit_product/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
    Route::put('/update_product/{id}', [ProductController::class, 'updateproduct'])->name('product_update');
    Route::get('/view_product', [ProductController::class, 'viewproduct'])->name('viewproduct');
    Route::delete('/delete_product/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
    Route::get('/view_order', [AdminController::class, 'vieworder'])->name('vieworder');
    Route::post('/search',[ProductController::class,'searchproduct'])->name('search');
    Route::get('/show_order', [OrderController::class, 'showorder'])->name('showorder');
    // Route::post('/change_status/{id}', [OrderController::class, 'changestatus'])->name('updateorderstatus');

});

require __DIR__.'/auth.php';
