<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Parametre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('parametres')->delete();
        Parametre::create([
            'id' => 1,
            'montantAdhesion' => 1000,
            'montantCotisation' => 6000,
        ]);
        
    }
}
