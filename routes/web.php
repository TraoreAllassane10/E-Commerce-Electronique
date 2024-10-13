<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/', function () {
    return Inertia::render('Acceuil');
});

Route::get('/signup', function () {
    return Inertia::render('Auth/Inscription');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Connexion');
});

//Toutes les routes des pages de produits
Route::get('/produits', function () {
    return Inertia::render('Produit/TousLesProduits');
});

Route::get('/Telephone', function () {
    return Inertia::render('Produit/Telephone');
});

Route::get('/Casque BT', function () {
    return Inertia::render('Produit/Casque');
});

Route::get('/Laptop', function () {
    return Inertia::render('Produit/Laptop');
});

Route::get('/Tablette', function () {
    return Inertia::render('Produit/Ipad');
});

Route::get('/Montre', function () {
    return Inertia::render('Produit/Montre');
});


//Toutes les routes de l'administrateur

Route::get('/dashboard', function() {
    return Inertia::render('Admin/Clients');
});

Route::get('/clients', function() {
    return Inertia::render('Admin/Clients');
});

Route::get('/admin/produits', function() {
    return Inertia::render('Admin/Produits');
});
Route::get('/commandes', function() {
    return Inertia::render('Admin/Commandes');
});
Route::get('/utilisateurs', function() {
    return Inertia::render('Admin/Utilisateurs');
});
Route::get('/parametres', function() {
    return Inertia::render('Admin/Parametres');
});





require __DIR__.'/auth.php';
