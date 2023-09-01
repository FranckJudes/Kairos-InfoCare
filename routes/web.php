<?php

use App\Http\Controllers\Authentification\AuthentificationController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\Entites\EntitesController;
use App\Http\Controllers\GroupeUtilisateur\GroupeUtilisateurController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Utilisateur\UtilisateurController;
use App\Http\Controllers\RendezVous\RendezVousController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    
    return view('admin.dashboard');
});
Route::get('/', function () {
    
    return view('admin.main-layout');
});

Route::controller(CalendrierController::class)->group(
    function(){
        Route::get('agenda','index')->name('agenda');
    }
);
Route::controller(AuthentificationController::class)->group(
    function(){
        Route::get('/login','index')->name('login');
        Route::post('doLogin','doLogin')->name('doLogin');
    }
);
Route::get('/get-children/{id}', [EntitesController::class, 'getChildren'])->name('api.getChildren');

//Groupe Utilisateur
Route::resource('GroupeUtilisateur', GroupeUtilisateurController::class);
//Groupe Utilisateur
Route::resource('Utilisateur', UtilisateurController::class);
//Groupe Patient
Route::resource('patient', PatientController::class);
//Groupe entites
Route::resource('entites', EntitesController::class);
//Groupe rendezVous
Route::resource('rendezVous', RendezVousController::class);