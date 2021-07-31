<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\RowController;
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
Route::resource('/rows', RowController::class);

Route::get('/cards', [CardController::class, 'index'])->name('cards');
Route::get('/cards/{card}', [CardController::class, 'show'])->name('cards.show');
Route::post('/cards/{row}', [CardController::class, 'store'])->name('cards.store');
Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');
Route::put('/cards/{card}/update', [CardController::class, 'update'])->name('cards.update');
