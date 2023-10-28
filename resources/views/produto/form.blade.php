
@extends('base.app')
@section("titulo", 'Listagem de Produtos')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($produto->id)){
            $route = route('produto.update', $produto->id);
        } else{
            $route = route('produto.store');
        }
    @endphp

    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="py-12">
        <h3 class="pt-4 text-2xl font-medium py-4">Formulário de Produto</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($produto->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($produto->id)){{$produto->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <label class="block">
                <span class="text-gray-700">Nome</span>
                <input type="text" name="nome" placeholder="Nome do Produto" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                value="@if(!empty($produto->nome)){{$produto->nome}}@elseif(!empty(old('nome'))){{old('nome')}}@else{{''}}@endif">
            </label><br><br>

            <label class="block">
                <span class="text-gray-700">Tipo</span>
                <select name="tipo" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                  value="@if(!empty($produto->tipo)){{$produto->tipo}}@elseif(!empty(old('tipo'))){{old('tipo')}}@else{{''}}@endif">
                      <option value="Higiene"
                          @if(!empty($produto->id)){{ ( $produto->tipo == "Higiene") ? 'selected' : '' }}
                          @else{{ '' }}@endif>Higiene
                      </option>
                      <option value="Remédios"
                          @if(!empty($produto->id)){{ ( $produto->tipo == "Remédios") ? 'selected' : '' }}
                          @else{{ '' }}@endif>Remédios
                      </option>
                      <option value="Outros"
                          @if(!empty($produto->id)){{ ( $produto->tipo == "Outros") ? 'selected' : '' }}
                          @else{{ '' }}@endif>Outros
                      </option>
                  </select>
            </label><br><br>


            <label class="block">
                <span>Fornecedor</span>
                <select name="fornecedor_id" id="" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black">
                    @foreach ($fornecedores as $item)
                        <option value="{{ $item->id }}"
                            @if(!empty($produto->id)){{ ( $item->id == $produto->fornecedor_id) ? 'selected' : '' }}
                            @else{{ '' }}@endif >{{$item->nome}}
                        </option>
                    @endforeach
                </select>
            </label><br><br>

            @php
                    $nome_imagem = !empty($produto->imagem) ? $produto->imagem : 'sem_imagem.jpg';
                @endphp
                <div>
                    <img class="h-20 w-20 object-cover full" src="/storage/{{ $nome_imagem }}" width="300px"
                        alt="imagem">
                    <br>
                    <input
                        class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-50 file:text-green-700
                                hover:file:bg-green-100"
                        type="file" name="imagem"><br>
                </div> <br>

            <button class="rounded-2xl bg-blue-300 px-4 py-2 w-32 font-bold hover:bg-blue-400" type="submit">Salvar</button>
            <a href="{{ route('produto.index') }}"><button type="button" class="rounded-2xl bg-gray-300 px-4 py-2 w-32 font-bold hover:bg-gray-400">Voltar</button></a>
        </form>
    </div>
    </div>
@endsection


