<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\MealController as M;
use App\Http\Controllers\HomeController as H;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [H::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/rate/{movie}', [H::class, 'rate'])->name('rate')->middleware('gate:user');

Route::prefix('restaurant')->name('r_')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [R::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [R::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{restaurant}', [R::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{restaurant}', [R::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{restaurant}', [R::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{restaurant}', [R::class, 'update'])->name('update')->middleware('gate:admin');
    Route::delete('/delete-meals/{restaurant}', [R::class, 'destroyAll'])->name('delete_meals')->middleware('gate:admin');
});

Route::prefix('meal')->name('m_')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [M::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [M::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{meal}', [M::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{meal}', [M::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{meal}', [M::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{meal}', [M::class, 'update'])->name('update')->middleware('gate:admin');
});