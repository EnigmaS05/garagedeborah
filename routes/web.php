<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Page d'accueil (Le Tableau de bord)
Route::get('/', [DashboardController::class, 'index']);

// Nous ajouterons les autres routes (Véhicules, Techniciens...) juste après

use App\Http\Controllers\VehiculeController; // N'oubliez pas cette ligne en haut !

// Route intelligente qui crée automatiquement toutes les URLs (index, create, store...)
Route::resource('vehicules', VehiculeController::class);

Route::resource('techniciens', App\Http\Controllers\TechnicienController::class);

Route::resource('reparations', App\Http\Controllers\ReparationController::class);