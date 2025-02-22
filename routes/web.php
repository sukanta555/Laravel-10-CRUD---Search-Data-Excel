<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

// Route to download a single product as Excel
Route::get('/products/{product}/download', [ProductController::class, 'downloadExcel'])->name('products.download');
Route::get('/download-products', [ProductController::class, 'downloadAllExcel'])->name('products.download.all');


// # https://www.itsolutionstuff.com/post/laravel-10-crud-application-example-tutorialexample.html 