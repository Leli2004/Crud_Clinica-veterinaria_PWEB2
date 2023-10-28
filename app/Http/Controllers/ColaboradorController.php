<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use PDF;
use App\Charts\colaboradorChart;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::all();

        return view('colaborador.list')->with(['colaboradores'=> $colaboradores]);
    }

    public function create()
    {
        return view('colaborador.form');
    }

    public function store(Request $request) //request: métodos enviados no formulário (get ou post)
    {

        $request->validate([
            'nome'=>'required|max:120',
            'cpf'=>'required|max:14',
            'telefone'=>'required|max:15',
            'cargo'=>'required|max:50',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatório!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatório!",
            'telefone.max'=>" Só é permitido 15 caracteres no :attribute !",
            'cargo.required'=>"O :attribute é obrigatório!",
            'cargo.max'=>" Só é permitido 50 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'telefone'=>$request->telefone,
            'cargo'=>$request->cargo,
        ];

        $imagem = $request->file('imagem');
            //verifica se existe imagem no formulário
            if($imagem){
            $nome_arquivo =
            date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio = "imagem/colaborador/";
            //salva imagem em uma pasta do sistema
            $imagem->storeAs($diretorio,$nome_arquivo,'public');

            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Colaborador::create($dados); //ou  $request->all()

        return redirect('colaborador')->with('success', "Cadastrado com sucesso!");
    }

    public function show(Colaborador $colaborador)
    {
        //
    }

    public function edit($id)
    {
        $colaborador = Colaborador::find($id); // select * from colaborador where id = $id

        return view('colaborador.form')->with([
            'colaborador'=> $colaborador,
            ]);
    }

    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nome'=>'required|max:120',
            'cpf'=>'required|max:14',
            'telefone'=>'required|max:15',
            'cargo'=>'required|max:50',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatório!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatório!",
            'telefone.max'=>" Só é permitido 15 caracteres no :attribute !",
            'cargo.required'=>"O :attribute é obrigatório!",
            'cargo.max'=>" Só é permitido 50 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'data_nascimento'=> $request->data_nascimento,
            'cpf'=> $request->cpf,
            'telefone'=>$request->telefone,
            'cargo'=>$request->cargo,
        ];

        $imagem = $request->file('imagem');
            //verifica se existe imagem no formulário
            if($imagem){
            $nome_arquivo =
            date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio = "imagem/colaborador/";
            //salva imagem em uma pasta do sistema
            $imagem->storeAs($diretorio,$nome_arquivo,'public');

            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Colaborador::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('colaborador')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $colaborador = Colaborador::findOrFail($id);

        $colaborador->delete();

        return redirect('colaborador')->with('success', "Deletado com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $colaboradores = Colaborador::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
            $colaboradores = Colaborador::all();
        }

        return view('colaborador.list')->with(['colaboradores'=> $colaboradores]);
    }

    public function chart(colaboradorChart $colaborador){
        return view('colaborador.chart')->with(['colaborador'=>  $colaborador->build()]);
    }

}
