<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\FournisseurController;
use App\Http\Controllers\Api\ArticleVenteController;


 


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('categories', CategorieController::class);

Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);

Route::post('articles', [ArticleController::class, 'create']);

Route::post('articles/create', [ArticleController::class, 'createArticle']);

Route::put('/articles/{id}', [ArticleController::class, 'updateArticle']);

Route::get('/fournisseurs/search/{id}', [FournisseurController::class, 'search']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);


Route::post('/article-ventes', [ArticleVenteController::class, 'store']);

Route::get('articles-vente', [ArticleVenteController::class, 'index']);

Route::get('articles-vente/search/{id}', [ArticleVenteController::class, 'show']);

Route::put('articles-vente/{id}', [ArticleVenteController::class, 'update']);

Route::delete('articles-vente/{id}', [ArticleVenteController::class, 'destroy']);


use App\Http\Controllers\Api\VenteConfectionController;


    // ... Autres routes

    // Route pour la création d'une vente_confection
    Route::post('vente-confections', [VenteConfectionController::class, 'store']);

    // ... Autres routes

