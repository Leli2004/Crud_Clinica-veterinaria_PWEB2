<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produto";

    protected $fillable = ['nome',
        'tipo',
        'fornecedor_id',
        'imagem',
    ];

    protected $casts = [
        "fornecedor_id"=>"integer"
    ];

    public function fornecedor(){
        // N -N
        return $this->belongsToMany(Fornecedor::class,
            'fornecedor_id', 'id');
    }

}
