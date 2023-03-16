<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\SiteController;
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

// Route pour le chat
Route::get('/', [SiteController::class, 'index'])
    ->name('accueil')
    ->middleware('auth');

// Routes pour l'enregistrement
Route::get('/enregistrement', [EnregistrementController::class, 'create'])
    ->name('enregistrement');

Route::post('/enregistrement', [EnregistrementController::class, 'store']);

// Routes pour la connexion/deconnexion
Route::get('/connexion', [ConnexionController::class, 'connexion'])
    ->name('connexion');

Route::post('/connexion', [ConnexionController::class, 'authentifier']);

Route::get('/deconnexion', [ConnexionController::class, 'deconnecter']);

// Route pour l'envoie de message à LaraGPT
Route::post('/soumission', [SiteController::class, 'store'])
    ->middleware('auth');
