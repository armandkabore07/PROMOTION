<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricule',
        'telephone',
        'nom',
        'prenom',
        'email',
        'password',
        'service',
        'premiereConnexion',
        'soldeInitial',
    ];

    public function adhesion(){
        return $this->hasOne(Adhesion::class);
    }

    public function cotisations(){
        return $this->hasMany(Cotisation::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
/*
    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->cotisations()->delete();
             // do the rest of the cleanup...
        });
    } */

}
