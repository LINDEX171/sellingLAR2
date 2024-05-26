<?php

use App\Http\Controllers\ArticleController;
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


Route::get('/liste-categorie',[CategorieController::class,'liste'])->name('liste');
Route::post('/storecategories',[CategorieController::class,'store'])->name('enregistrerCategorie');
Route::get('/update-categorie/{id}',[CategorieController::class,'updatecategorie']);
Route::post('/updatestorecategorie',[CategorieController::class,'updatestorecategorie']);
Route::get('/delete-categorie/{id}',[CategorieController::class,'deletecategorie']);


Route::get('/liste-article',[ArticleController::class,'liste'])->name('liste1');
Route::post('/storearticles',[ArticleController::class,'store'])->name('enregistrerArticle');
Route::get('/update-article/{id}',[ArticleController::class,'updatearticle']);
Route::post('/updatestorearticle',[ArticleController::class,'updatestorearticle']);
Route::get('/delete-article/{id}',[ArticleController::class,'deletearticle']);