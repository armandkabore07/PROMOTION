<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'informations';
    public $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'body',
        'montant_depense',
        'type_id',
    ];

        /**
         * Get the type that owns the Information
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function type()
        {
            return $this->belongsTo(Type::class, 'type_id', 'id');
        }
    
}
