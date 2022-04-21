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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact/new', [App\Http\Controllers\Contacts\NewContactController::class, 'index'])->name('contact.new');
Route::post('/contact/new', [App\Http\Controllers\Contacts\NewContactController::class, 'process'])->name('contact.create');
Route::get('/contact/{contact}', [App\Http\Controllers\Contacts\ViewContactController::class, 'index'])->name('contact.view');
Route::delete('/contact/{contact}', [App\Http\Controllers\Contacts\DeleteContactController::class, 'process'])->name('contact.delete');
Route::get('/contact/{contact}/edit', [App\Http\Controllers\Contacts\UpdateContactController::class, 'index'])->name('contact.edit');
Route::post('/contact/{contact}/edit', [App\Http\Controllers\Contacts\UpdateContactController::class, 'process'])->name('contact.update');
