<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('images/download', [ImageController::class, 'download'])
    ->name('images.download');

Route::resource('images', ImageController::class)
    ->only(['index', 'create', 'store']);

Route::redirect('/', route('images.index'));
