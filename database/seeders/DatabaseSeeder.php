<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Parametre;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Adhesion;
use App\Models\Cotisation;
use App\Models\Type;
use Carbon\Carbon;

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

        DB::table('model_has_roles')->delete();
        DB::table('roles')->delete();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        DB::table('users')->delete();
        $user = User::create([
            'telephone' => 11111111,
            'matricule' => 'adminMatri',
            'nom' => 'admin',
            'prenom' => 'admin',
            'service' => 'adminService',
            'email' => 'admin@gmail.com',
            'soldeInitial'  => 1000,
            'password' => Hash::make('11111111'),
        ]);
    
        $userId =  $user->id; 
        $user->assignRole('admin');
        
        $todayDate = Carbon::now()->format('Y-m-d');

        Adhesion::create([
            'userId' => $userId,
            'montantAdhesion'=>1000,
             'dateAdhesion'=> $todayDate,
        ]);

        $date = Carbon::now()->format('Y');
        Cotisation::create([
            'userId' => $userId,
            'montantPayer'=>0,
            'montantRestant'=>6000,
            'annee'=>$date,
            'dateCotisation'=> $todayDate,
        ]);

        DB::table('types')->delete();
        Type::create(['libelle' => 'Information']);
        Type::create(['libelle' => 'Evenement']);
        Type::create(['libelle' => 'Activite']);

        
        
    }
}
