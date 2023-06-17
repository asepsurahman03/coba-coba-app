<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Parser\Multiple;
use App\Http\Controllers\MultipleController;

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

Route::get('images',[MultipleController::class, 'index']);
Route::post('images-upload',[MultipleController::class, 'store']);
