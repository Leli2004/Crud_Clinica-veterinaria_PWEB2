<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RelacionamentoController;

Route::get('/',
    [MainController::class, 'index'])->name('index');

//ROTAS TUTOR
Route::resource('/tutor', TutorController::class);

Route::post('/tutor/search',
    [TutorController::class, 'search'])->name('tutor.search');

Route::get('/tutor/destroy/{id}',
    [TutorController::class, 'destroy'])->name('tutor.destroy');

//ROTAS ANIMAL
Route::resource('/animal', AnimalController::class);

Route::post('/animal/search',
    [AnimalController::class, 'search'])->name('animal.search');

Route::get('/animal/report',
    [AnimalController::class, 'report'])->name('animal.report');

Route::get('/animal/destroy/{id}',
    [AnimalController::class, 'destroy'])->name('animal.destroy');


//ROTAS CONSULTA
Route::resource('/consulta', ConsultaController::class);

Route::post('/consulta/search',
    [ConsultaController::class, 'search'])->name('consulta.search');

Route::get('/consulta/destroy/{id}',
    [ConsultaController::class, 'destroy'])->name('consulta.destroy');


//ROTAS COLABORADOR
Route::resource('/colaborador', ColaboradorController::class);

Route::post('/colaborador/search',
    [ColaboradorController::class, 'search'])->name('colaborador.search');

Route::get('/colaborador/chart',
    [ColaboradorController::class, 'chart'])->name('colaborador.chart');

Route::get('/colaborador/destroy/{id}',
    [ColaboradorController::class, 'destroy'])->name('colaborador.destroy');


//ROTAS FORNECEDOR
Route::resource('/fornecedor', FornecedorController::class);

Route::post('/fornecedor/search',
    [FornecedorController::class, 'search'])->name('fornecedor.search');

Route::get('/fornecedor/report',
    [FornecedorController::class, 'report'])->name('fornecedor.report');

Route::get('/fornecedor/destroy/{id}',
    [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');


//ROTAS PRODUTO
Route::resource('/produto', ProdutoController::class);

Route::post('/produto/search',
    [ProdutoController::class, 'search'])->name('produto.search');

Route::get('/produto/chart',
    [ProdutoController::class, 'chart'])->name('produto.chart');

Route::get('/produto/destroy/{id}',
    [ProdutoController::class, 'destroy'])->name('produto.destroy');


Route::get('/relacionamento',
    [RelacionamentoController::class, 'index'])->name('relacionamento');