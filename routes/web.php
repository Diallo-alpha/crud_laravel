<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'liste_article']);
Route::get('/ajouter', [ArticleController::class, 'ajouter_articles']);
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouter_article']);
Route::get('/mise_à_jour-articles/{id}', [ArticleController::class, 'mise_à_jour_article']);
Route::post('/mise_à_jour/traitement', [ArticleController::class, 'mise_à_jour_article_traitement']);
Route::get('/supprimer-articles/{id}', [ArticleController::class, 'supprimer_article']);
Route::get('/detailes-article/{id}', [ArticleController::class, 'voir_detailles']);
