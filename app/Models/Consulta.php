<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = "consulta";

    protected $fillable = ['data',
        'hora',
        'tipo',
        'descricao',
        'animal_id',
        'colaborador_id',
    ];

    protected $casts = [
        "animal_id"=>"integer",
        "colaborador_id"=>"integer",
    ];

    public function animal(){
        // 1-1
        return $this->belongsTo(Animal::class,
            'animal_id', 'id');
    }
    public function colaborador(){
        // 1-1
        return $this->belongsTo(Colaborador::class,
            'colaborador_id', 'id');
    }
}
