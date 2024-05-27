<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'liste_article']);
Route::get('/ajouter', [ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement', [ArticleController::class, 'add_article']);
Route::get('/update-articles/{id}', [ArticleController::class, 'update_article']);
Route::post('/update/traitement', [ArticleController::class, 'update_article_traitement']);
