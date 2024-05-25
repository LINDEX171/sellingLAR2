<?php

use App\Http\Controllers\CategorieController;
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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/categorie',[CategorieController::class,'index'])->name('categorie');
Route::get('/liste-categorie',[CategorieController::class,'liste'])->name('liste');
Route::post('/storecategories',[CategorieController::class,'store'])->name('enregistrerCategorie');
Route::get('/update-categorie/{id}',[CategorieController::class,'updatecategorie']);
Route::post('/updatestorecategorie',[CategorieController::class,'updatestorecategorie']);
Route::get('/delete-categorie/{id}',[CategorieController::class,'deletecategorie']);
