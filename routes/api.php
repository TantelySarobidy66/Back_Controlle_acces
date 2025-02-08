<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEdutiant;
use App\Http\Controllers\BackBook;
use App\Http\Controllers\BackAction;
use App\Http\Controllers\BackStudyLivre;
use App\Http\Controllers\BackAdmin;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Gny an'i mpianatry
Route::get('/selectEtudiant', [BackEdutiant::class, 'selectEtudiant']);
Route::post('/ajoutEtudiant', [BackEdutiant::class, 'ajoutEtudiant']);
Route::post('/modifiEtudiant', [BackEdutiant::class, 'modifiEtudiant']);
Route::post('/suppEtudiant', [BackEdutiant::class, 'suppEtudiant']);

// Gny an'i boky
Route::get('/selectBoky', [BackBook::class, 'selectBoky']);
Route::post('/ajoutBoky', [BackBook::class, 'ajoutBoky']);
Route::post('/modifiBoky', [BackBook::class, 'modifiBoky']);
Route::post('/suppBoky', [BackBook::class, 'suppBoky']);

// Action ho an'ny mpianatra 
Route::get('/selectActionEtudiant', [BackAction::class, 'selectActionEtudiant']);
Route::post('/ajoutActionEtudiant', [BackAction::class, 'ajoutActionEtudiant']);
Route::get('/selectDateAmizao/{dat}', [BackAction::class, 'selectDateAmizao']);
Route::post('/modifiActionEtudiant', [BackAction::class, 'modifiActionEtudiant']);

// Etudiant mamaky boky
Route::get('/selectStudyLivre', [BackStudyLivre::class, 'selectStudyLivre']);
Route::post('/ajoutStudyLivre', [BackStudyLivre::class, 'ajoutStudyLivre']);
Route::get('/selectDateAmizaoDaty/{dat}', [BackStudyLivre::class, 'selectDateAmizaoDaty']);
Route::post('/modifiStudyLivre', [BackStudyLivre::class, 'modifiStudyLivre']);

// Admin
Route::post('/login', [BackAdmin::class, 'login']);
Route::get('/statistique', [BackAdmin::class, 'statistique']);