<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
    ];

    /**
     * Get all of the informations for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informations()
    {
        return $this->hasMany(Information::class);
    }
}
