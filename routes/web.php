<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/photo-archives', function () {
    return view('media/media');
});
Route::get('/photo-archives/all-photos', function () {
    return view('media/all-photos');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/media', function () {
//     return view('media');
// })->middleware(['auth', 'verified'])->name('media');

require __DIR__.'/auth.php';
