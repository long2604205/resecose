<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClothesController as AdminClothesController;
use App\Http\Controllers\Admin\ClothesServiceController;
use App\Http\Controllers\Admin\LaundryServiceController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\Clothes;
use App\Http\Controllers\Client\ClothesController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LaundryController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ShopController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Query\OrExpr;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('client.master');
// });
// Route::resource('/', HomeController::class);


//404
Route::fallback(function () {
    return view('errors.404');
});

// Route::get('/fixes/{id}', ClothesController::class, 'show')->name('fixes.show');


// Service
// Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry.index');
// Route::get('/laundry', [LaundryController::class, 'cret'])->name('laundry.index');
Route::resource('/laundry', LaundryController::class);
Route::resource('/fix-clothes', ClothesController::class);
//checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'checkoutPost'])->name('checkout.checkoutPost');
Route::get('/order-results', [OrderController::class, 'alert'])->name('checkout.alert');

//Route Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/add-to-cart-{id}', [CartController::class, 'addtocart'])->name('cart.addtocart');
Route::get('/add-to-cart-{id}', [CartController::class, 'addtocart'])->name('cart.addtocart');
Route::get('/remove-item-{id}', [CartController::class, 'removeitem'])->name('cart.removeitem');
Route::get('/update-items', [CartController::class, 'update'])->name('cart.update');
//Product
// Route::get('/product', [ClientProductController::class, 'index'])->name('productclient.index');
Route::get('/{alias}-{id}', [ClientProductController::class, 'detail'])
    ->where('alias', '^[a-z0-9-]+')
    ->where('id', '[0-9]+$')
    ->name('pro.detail');



Route::resource('/', HomeController::class)->names([
    'index' => 'home.index',
    'create' => 'home.create',
    'store' => 'home.store',
    'show' => 'home.show',
    'edit' => 'home.edit',
    'update' => 'home.update',
    'destroy' => 'home.destroy',
]);
Route::get('/about-us', [HomeController::class, 'create'])->name('home.create');
Route::resource('/shop', ShopController::class);
// Route::resource('/category-{id}', ShopController::class);
// Route::resource('/shop-{category}', ShopController::class);

Route::get('/shop-{category}', [ShopController::class, 'shows'])->name('shop.shows');
Route::get('/shop-clothing', [ShopController::class, 'clothes'])->name('shop.clothes');


//Route Admin
Route::prefix('admin')->group(function () {
    Route::resource('/', SystemController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/image-{id}', [ProductController::class, 'createImage'])->name('product.createImage');
    // Route::post('/image-{id}', [ProductController::class, 'createImage'])->name('product.createImage');
    Route::post('/store-image', [ProductController::class, 'storeImage'])->name('product.storeImage');
    Route::delete('image-delete-{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::resource('/category', CategoryController::class);
    Route::resource('/laundry-service', LaundryServiceController::class);
    Route::resource('/fix-clothes-service', ClothesServiceController::class);
    Route::resource('/order-list', OrdersController::class);
});
