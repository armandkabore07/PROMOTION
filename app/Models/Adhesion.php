<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId','montantAdhesion','dateAdhesion',
    ];

    protected $casts = [
        'dateAdhesion' => 'datetime:Y-m-d'
    ];
   
    public function user(){
        return $this->belongsTo(User::class,'foreign_key');
    }
}
