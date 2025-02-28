<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::resource('products', ProductController::class);
//  List All Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Show Create Form & Store New Product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Show Single Product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Show Edit Form & Update Product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Delete Product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Download Single Product as Excel
Route::get('/products/{product}/download', [ProductController::class, 'downloadExcel'])->name('products.download');

// Download All Products as Excel
Route::get('/products/download', [ProductController::class, 'downloadAllExcel'])->name('products.download.all');

// Route to download a single product as Excel
Route::get('/products/{product}/download', [ProductController::class, 'downloadExcel'])->name('products.download');
Route::get('/download-products', [ProductController::class, 'downloadAllExcel'])->name('products.download.all');

 // symlink create
    Route::get('/storage-link', function() {
        $targetFolder = storage_path('app/public');
        $linkFolder = public_path('storage');
        
        if (!file_exists($linkFolder)) {
            symlink($targetFolder, $linkFolder);
            return 'Storage link created successfully!';
        } else {
            return 'The "storage" link already exists.';
        }
    });

// # https://www.itsolutionstuff.com/post/laravel-10-crud-application-example-tutorialexample.html 
require __DIR__.'/auth.php';
