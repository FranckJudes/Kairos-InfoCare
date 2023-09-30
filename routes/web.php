<?php

use App\Http\Controllers\Authentification\AuthentificationController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\Entites\EntitesController;
use App\Http\Controllers\GroupeUtilisateur\GroupeUtilisateurController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Utilisateur\UtilisateurController;
use App\Http\Controllers\RendezVous\RendezVousController;
use App\Http\Controllers\Classement\ClassementController;
use App\Http\Controllers\PasswordDefaut\PasswordController;
use App\Http\Controllers\Parametres\ParametresController;
use App\Http\Controllers\Langue\LangageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientFiles\PatientFileController;
Route::get('/dashboard', function () {
    
    return view('admin.dashboard');
});

Route::get('/resetPassword', function () {
    
    return view('auth.resetAuth');
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
        Route::get('resetPassword','resetPage')->name('resetPage');
        Route::post('dochangePasseword','changePassword')->name('changePassword');
        Route::delete('logout','logout')->name('logout');
    }
);

// Settings L'Application
Route::controller(ParametresController::class)->group(
    function(){
        Route::get('/settings','index')->name('settings');
    }
);

//Choix de la langue
Route::controller(LangageController::class)->group(
    function(){
        Route::get('locale/{langue}','setLang')->name('locale');
    }
);

// Route::get('/get-children/{id}', [EntitesController::class, 'getChildren'])->name('api.getChildren');
Route::get('/get-tree', [ClassementController::class, 'getEntites']);
Route::get('/getDossierPatient/{id}', [PatientFileController::class, 'getDossierPatient']);


// Details

Route::get('/detailsIndex/{id}', [PatientFileController::class, 'detailsIndex']);
Route::get('/afficherPDF/{id}',  [PatientFileController::class, 'afficherPDF']);




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
//Groupe Classemnt
Route::resource('classement', ClassementController::class);
//Groupe Mot de passe par Defaut
Route::resource('passwords', PasswordController::class);
//Groupe Mot de passe par Defaut
Route::resource('patientFiles', PatientFileController::class);

// Suppression 
Route::get('deleteEntite/{id}', [EntitesController::class, 'delete']);
Route::get('deleteUtilisateur/{id}', [UtilisateurController::class, 'delete']);
Route::get('deleteGroupeUtilisateur/{id}', [GroupeUtilisateurController::class, 'delete']);
Route::post('passwordUpdate', [PasswordController::class, 'updatePassword']);
Route::get('deleteClassement/{id}', [ClassementController::class, 'delete']);
Route::get('deletePatient/{id}', [PatientController::class, 'delete']);
Route::get('/deletePatientFiles/{id}', [PatientFileController::class,'delete'])->name('deletePatientFiles.delete');

