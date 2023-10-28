<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use PDF;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();

        return view('fornecedor.list')->with(['fornecedores'=> $fornecedores]);
    }

    public function create()
    {
        return view('fornecedor.form');
    }

    public function store(Request $request) //request: métodos enviados no formulário (get ou post)
    {

        $request->validate([
            'nome'=>'required|max:120',
            'cnpj'=>'required|max:20',
            'telefone'=>'required|max:15',
            'endereco'=>'required|max:300',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cnpj.required'=>"O :attribute é obrigatório!",
            'cnpj.max'=>" Só é permitido 20 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatório!",
            'telefone.max'=>" Só é permitido 15 caracteres no :attribute !",
            'endereco.required'=>"O :attribute é obrigatório!",
            'endereco.max'=>" Só é permitido 300 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'cnpj'=> $request->cnpj,
            'telefone'=>$request->telefone,
            'endereco'=>$request->cargo,
        ];

        Fornecedor::create($dados); //ou  $request->all()

        return redirect('fornecedor')->with('success', "Cadastrado com sucesso!");
    }

    public function show(Fornecedor $fornecedor)
    {
        //
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id); // select * from fornecedor where id = $id

        return view('fornecedor.form')->with([
            'fornecedor'=> $fornecedor,
            ]);
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome'=>'required|max:120',
            'cnpj'=>'required|max:20',
            'telefone'=>'required|max:15',
            'endereco'=>'required|max:300',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cnpj.required'=>"O :attribute é obrigatório!",
            'cnpj.max'=>" Só é permitido 20 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatório!",
            'telefone.max'=>" Só é permitido 15 caracteres no :attribute !",
            'endereco.required'=>"O :attribute é obrigatório!",
            'endereco.max'=>" Só é permitido 300 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'cnpj'=> $request->cnpj,
            'telefone'=>$request->telefone,
            'endereco'=>$request->cargo,
        ];

        $dados = ['nome'=> $request->nome,
            'data_nascimento'=> $request->data_nascimento,
            'cpf'=> $request->cpf,
            'telefone'=>$request->telefone,
            'cargo'=>$request->cargo,
        ];

        Fornecedor::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('fornecedor')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->delete();

        return redirect('fornecedor')->with('success', "Deletado com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $fornecedores = Fornecedor::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
            $fornecedores = Fornecedor::all();
        }

        return view('fornecedor.list')->with(['fornecedores'=> $fornecedores]);
    }

    public function report(){
        $fornecedores = Fornecedor::orderBy('nome')->get();

        $data = [
            'title'=>"Relatorio Listagem de fornecedores",
            'fornecedores'=> $fornecedores
        ];

        $pdf = PDF::loadView('fornecedor.report',$data);

        return $pdf->download("listagem_fornecedores.pdf");
    }

}

