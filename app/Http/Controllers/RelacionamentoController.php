<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Produto;
use App\Models\Tutor;

class RelacionamentoController extends Controller
{
    public function index(){
        $animal = Animal::with(['tutor_id'])->get();

        dd($animal[0]->tutor->nome);
    }

    public function store(){
        //$tutor = Tutor::find(1);
        $tutor = Tutor::find($tutor->id);

        $animal = Animal::create(
            [
                'tutor_id'=>$tutor->id,
            ]
        );
        dd($animal);
    }
}