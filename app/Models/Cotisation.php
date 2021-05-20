<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId','montantPayer','montantRestant','annee','dateCotisation',
    ];

   
    protected $casts = [
        'dateCotisation' => 'datetime:Y-m-d'
    ];
    public function user(){
        return $this->belongsTo(User::class,'foreign_key');
    }
}
