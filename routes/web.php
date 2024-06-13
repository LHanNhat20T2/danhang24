<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGateSettingController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontEndController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\PaymentGatewaySetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartTableController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ReservationController;
use PHPUnit\Framework\Attributes\Group;



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::post('address', [DashboardController::class, 'createAddress'])->name('address.store');
Route::put('address/{id}/edit', [DashboardController::class, 'updateAddress'])->name('address.update');
Route::delete('address/{id}', [DashboardController::class, 'destroyAddress'])->name('address.destroy');

Route::group([], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

// Show home page
Route::get('/', [FrontEndController::class, 'index'])->name('home');

// Show product detail page
Route::get('/menu/{slug}', [FrontEndController::class, 'showProduct'])->name('frontend.product.show');

// Product Modal
Route::get('/load-product-modal/{productId}', [FrontEndController::class, 'loadProductModal'])->name('load-product-modal');

// Add to cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProduct'])->name('get-cart-products');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');

// Cart page
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart-update-qty', [CartController::class, 'cartQtyUpdate'])->name('cart.quantity-update');
Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

// Cart ordertable

// Checkout page
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('checkout/{id}/delivery-cal', [CheckoutController::class, 'CalculateDeliveryCharge'])->name('checkout.delivery-cal');
Route::post('checkout', [CheckoutController::class, 'checkoutRedirect'])->name('checkout.redirect');


// Payment route
Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('make-payment', [PaymentController::class, 'makePayment'])->name('make-payment');


Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');



Route::get('/paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');


Route::middleware(['auth', 'roles:admin'])->group(function () {
});
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::match(['get', 'post'], 'admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('admin/profile', [AdminDashboardController::class, 'adminProfile'])->name('admin.profile');
Route::post('admin/profile/store', [AdminDashboardController::class, 'adminProfileStore'])->name('admin.profile.store');

// About
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');

// Category
Route::resource('category', CategoryController::class)->names([
    'index' => 'admin.category.index',
    'create' => 'admin.category.create',
    'store' => 'admin.category.store',
    'edit' => 'admin.category.edit',
    'update' => 'admin.category.update',
    'destroy' => 'admin.category.destroy',
]);

// Product
Route::resource('product', ProductController::class)->names([
    'index' => 'admin.product.index',
    'create' => 'admin.product.create',
    'store' => 'admin.product.store',
    'edit' => 'admin.product.edit',
    'update' => 'admin.product.update',
    'destroy' => 'admin.product.destroy',
]);

// Product image
Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
Route::resource('product-gallery', ProductGalleryController::class);

// Product detail
// Delivey Area
Route::resource('delivery-area', DeliveryAreaController::class)->names([
    'index' => 'admin.delivery-area.index',
    'create' => 'admin.delivery-area.create',
    'store' => 'admin.delivery-area.store',
    'edit' => 'admin.delivery-area.edit',
    'update' => 'admin.delivery-area.update',
    'destroy' => 'admin.delivery-area.destroy',
]);

// Order route
Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('order/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');


Route::get('order/status/{id}', [OrderController::class, 'getOrderStatus'])->name('admin.orders.status');
Route::put('order/status-update/{id}', [OrderController::class, 'orderStatusUpdate'])->name('admin.orders.status-update');


// Booking
Route::get('booking', [BookingController::class, 'index'])->name('admin.booking.index');


// setting route payment gateway
Route::get('/payment-gate-setting', [PaymentGateSettingController::class, 'index'])->name('payment-setting.index');



require __DIR__ . '/auth.php';
