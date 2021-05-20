<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;
use App\Models\Parametre;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultstringLength(191);
        Paginator::useBootstrap();
        
        //A rechercher un code pour executer automatiquement le seed et les migrations
        //Commentez les deux lignes ci-dessous avant de lancer php artisan serve et php artisan db:seed
       $parametre = Parametre::findOrFail(1);
       Config::set(['param' => ['montantAdhesion' =>  $parametre->montantAdhesion, 'montantCotisation'=> $parametre->montantCotisation]]);

    }
}
