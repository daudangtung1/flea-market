<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterAffiliateMemberController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterDownloadMemberController;
use App\Http\Controllers\Auth\RegisterUploadMemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Carbon;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('/register-download-member', [RegisterDownloadMemberController::class, 'index'])->name('auth.register-download-member.index');
    Route::get('/register-affiliate-member', [RegisterAffiliateMemberController::class, 'index'])->name('auth.register-affiliate-member.index');

    Route::post('/register-download-member', [RegisterDownloadMemberController::class, 'store'])->name('auth.register-download-member.store');
    Route::post('/register-affiliate-member', [RegisterAffiliateMemberController::class, 'store'])->name('auth.register-affiliate-member.store');

    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        dd(1234);
    });

    Route::get('/member', function () {
        $users = User::where('status', User::STATUS['ONGOING'])->first();

        // dd($users);
    });
});

Route::group(['middleware' => 'downloadMember', 'prefix' => 'download-member'], function () {
    Route::get('/', function () {
        dd(1234);
    });
});

Route::group(['middleware' => 'affiliateMember', 'prefix' => 'affiliate-member'], function () {
    Route::get('/', function () {
        dd(1234);
    });
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/product/cart', [ProductController::class, 'cart'])->name('product.cart');
Route::post('/product/cart/remove', [ProductController::class, 'removeProduct'])->name('product.cart.remove');
Route::post('/product/cart/remove-all', [ProductController::class, 'removeAll'])->name('product.cart.removeAll');

/*develop*/
Route::get('/dev', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/dev/updateStatus', function () {
    $data = User::where('status', User::STATUS['BANNED'])
        ->where('banned_datetime', '<', Carbon::now())->get();
    foreach ($data as $user) {
        $user->status = User::STATUS['ONGOING'];
        $user->banned_datetime = NULL;
        $user->save();
    }
    dd($data);
});
