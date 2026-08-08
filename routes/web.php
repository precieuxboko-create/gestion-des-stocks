<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produitController;
use App\Http\Controllers\categorieController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produits', produitController::class);

Route::resource('categories', categorieController::class);