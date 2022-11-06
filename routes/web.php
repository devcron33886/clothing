<?php

use App\Http\Livewire\CardProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Auth::routes();

Livewire::component('card-product', CardProduct::class);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@about')->name('about');
Route::get('/contact-us', 'HomeController@contact')->name('contact');

Route::post('/newsletters/subscribe', 'NewsletterController@store')->name('newsletters.subscribe');

Route::get('/collections/{category:slug}', \App\Http\Controllers\CategoryShowController::class)->name('category');

Route::get('/collections/product/{product:slug}', App\Http\Controllers\ProductShowController::class)->name('product');

Route::get('/collections', \App\Http\Controllers\ShopController::class)->name('shop');

Route::get('/addToCart/{id}', ['uses' => 'CartController@getAddToCart', 'as' => 'cart.addToCart']);
Route::get('/shopping/shopping-basket', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::get('/remove/cart/item/{id}', [
    'uses' => 'CartController@getRemoveItem',
    'as' => 'cart.removeItem',
]);
Route::get('/remove/cart', [
    'uses' => 'CartController@getRemoveAll',
    'as' => 'cart.removeAll',
]);

Route::get('/increment/cart/item/{id}', [
    'uses' => 'CartController@getIncrement',
    'as' => 'cart.increment',
]);

Route::get('/decrement/cart/item/{id}', [
    'uses' => 'CartController@getDecrement',
    'as' => 'cart.decrement',
]);

Route::get('/shop/check-out', [App\Http\Controllers\CheckoutController::class, 'index'])->name('shop.check-out');

Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('order.store');

Route::get('/order-success/{id}', 'OrderController@orderSuccess')->name('order.success');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'EventController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Shop
    Route::delete('shops/destroy', 'ShopController@massDestroy')->name('shops.massDestroy');
    Route::post('shops/media', 'ShopController@storeMedia')->name('shops.storeMedia');
    Route::post('shops/ckmedia', 'ShopController@storeCKEditorImages')->name('shops.storeCKEditorImages');
    Route::resource('shops', 'ShopController');

    // Home Slide
    Route::delete('home-slides/destroy', 'HomeSlideController@massDestroy')->name('home-slides.massDestroy');
    Route::post('home-slides/media', 'HomeSlideController@storeMedia')->name('home-slides.storeMedia');
    Route::post('home-slides/ckmedia', 'HomeSlideController@storeCKEditorImages')->name('home-slides.storeCKEditorImages');
    Route::resource('home-slides', 'HomeSlideController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Shipping Type
    Route::delete('shipping-types/destroy', 'ShippingTypeController@massDestroy')->name('shipping-types.massDestroy');
    Route::resource('shipping-types', 'ShippingTypeController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
