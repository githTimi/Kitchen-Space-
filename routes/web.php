<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
//Route::get('/', function () {
//    return view('welcome');
// });
Route::get('/', [HomeController::class, 'home_page']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/add_food', [AdminController::class, 'add_food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);
Route::get('/view_food', [AdminController::class, 'view_food']);
Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);
Route::get('/update_food/{id}', [AdminController::class, 'update_food']);
Route::post('/food/{id}/add_cart', [HomeController::class, 'add_cart'])
     ->name('food.add_cart');
Route::post('/book_table', [OrderController::class, 'book_table']);
Route::get('/book_destroy/{id}', [OrderController::class, 'book_destroy'])->name('book_destroy');

 Route::resource('food', AdminController::class);
Route::resource('cart', CartController::class);
Route::resource('order', OrderController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
