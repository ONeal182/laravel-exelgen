<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExelGen;
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

Route::get('/forms', function () {
    return view('forms');
});
// Добавил роутинг для консроллера PDFController /app/Http/Controllers/PDFController
// Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview');
// Route::get('pdf/generate', [PDFController::class, 'generatePDF'])->name('pdf.generate');
// Route::get('create',[DocumentController::class, 'create']);
// Route::get('store',[DocumentController::class, 'store']);
Route::post('exel',[ExelGen::class, 'generateExcel']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
