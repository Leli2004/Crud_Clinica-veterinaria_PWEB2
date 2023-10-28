<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use PDF;
use App\Charts\produtoChart;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('produto.list')->with(['produtos'=> $produtos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::orderBy('nome')->get();

        return view('produto.form')->with([
            'fornecedores'=> $fornecedores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required|max:120',
            'tipo'=>'required|max:120',
        ],[
            'nome.required'=>"A :attribute é obrigatória!",
            'nome.max'=>" Só é permitido 12 caracteres em :attribute !",
            'tipo.required'=>"A :attribute é obrigatória!",
            'tipo.max'=>" Só é permitido 6 caracteres em :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'tipo'=> $request->tipo,
            'fornecedor_id'=>$request->fornecedor_id,
        ];

        $imagem = $request->file('imagem');
            //verifica se existe imagem no formulário
            if($imagem){
            $nome_arquivo =
            date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio = "imagem/produto/";
            //salva imagem em uma pasta do sistema
            $imagem->storeAs($diretorio,$nome_arquivo,'public');

            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Produto::create($dados); //ou  $request->all()

        return redirect('produto')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id); //select * from produto where id = $id

        $fornecedores = Fornecedor::orderBy('nome')->get();

        return view('produto.form')->with([
            'produto'=> $produto,
            'fornecedores'=> $fornecedores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>'required|max:120',
            'tipo'=>'required|max:120',
        ],[
            'nome.required'=>"A :attribute é obrigatória!",
            'nome.max'=>" Só é permitido 12 caracteres em :attribute !",
            'tipo.required'=>"A :attribute é obrigatória!",
            'tipo.max'=>" Só é permitido 6 caracteres em :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'tipo'=> $request->tipo,
            'fornecedor_id'=>$request->fornecedor_id,
        ];

        $imagem = $request->file('imagem');
            //verifica se existe imagem no formulário
            if($imagem){
            $nome_arquivo =
            date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio = "imagem/produto/";
            //salva imagem em uma pasta do sistema
            $imagem->storeAs($diretorio,$nome_arquivo,'public');

            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Produto::updateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('produto')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect('produto')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $produtos = Produto::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $produtos = Produto::all();
        }

        return view('produto.list')->with(['produtos'=> $produtos]);
    }

    public function chart(produtoChart $produto){
        return view('produto.chart')->with(['produto'=>  $produto->build()]);
    }

}
