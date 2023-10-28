<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = "animal";

    protected $fillable = ['nome',
        'peso',
        'porte',
        'raca',
        'tutor_id',
        'imagem',
    ];

    protected $casts = [
        "'tutor_id',"=>"integer"
    ];

    public function tutor(){
        // 1-N
        return $this->hasMany(Tutor::class,
        'tutor_id', 'id');
    }
}
