<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\MonCompteController;
use Illuminate\Support\Facades\DB;


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
    $nbtotalMembre = DB::table('users')->count();
    $montantAdhesion = DB::table('adhesions')->sum('montantAdhesion');
    $montantCotisation = DB::table('cotisations')->sum('montantPayer');
    $montantEncaisse = $montantAdhesion + $montantCotisation ;
    return view('welcome',compact('nbtotalMembre','montantEncaisse'));
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('membres', MembreController::class);

Route::resource('cotisations', CotisationController::class)->except(['create','store']);
Route::get('/cotisations/create/{id}',[CotisationController::class, 'create'])->middleware(['auth'])->name('cotisations.create');
Route::match(['post','put','patch'],'/cotisations/{id}', [CotisationController::class, 'store'])
              // ->middleware('auth')
               ->name('cotisations.store');

Route::resource('adhesions', AdhesionController::class)->middleware(['auth']);
Route::resource('parametres', ParametreController::class)->middleware(['auth']);

Route::get('/monCompte/{id}', [MonCompteController::class, 'show'])
                ->middleware('auth')
                ->name('moncompte.show');

Route::get('/moncompte/{id}/edit', [MonCompteController::class, 'edit'])
                ->middleware('auth')
                ->name('moncompte.edit');

Route::match(['put','patch'],'/moncompte/{id}', [MonCompteController::class, 'update'])
               ->middleware('auth')
               ->name('moncompte.update');

Route::get('/changepassword/{id}/edit', [MonCompteController::class, 'editpassword'])
               ->middleware('auth')
               ->name('mdp.edit');

Route::match(['put','patch'],'/modifiepassword/{id}', [MonCompteController::class, 'updatepassword'])
              ->middleware('auth')
              ->name('mdp.update');

require __DIR__.'/auth.php';
