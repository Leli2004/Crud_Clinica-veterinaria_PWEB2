
@extends('base.app')
@section("titulo", 'Listagem de Colaboradores')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($colaborador->id)){
            $route = route('colaborador.update', $colaborador->id);
        } else{
            $route = route('colaborador.store');
        }
    @endphp


    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="py-12">
        <h3 class="pt-4 text-2xl font-medium py-4">Formulário de colaborador</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($colaborador->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($colaborador->id)){{$colaborador->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <label class="block">
                <span class="text-gray-700">Nome</span>
                <input type="text" name="nome" placeholder="Nome do Colaborador" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                value="@if(!empty($colaborador->nome)){{$colaborador->nome}}@elseif(!empty(old('nome'))){{old('nome')}}@else{{''}}@endif">
            </label><br><br>

            <div class="flex">
                <div class="w-1/2 mr-2">
                    <label class="block">
                        <span class="text-gray-700">CPF</span>
                        <input type="text" name="cpf" placeholder="000.000.000-00" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                        value="@if(!empty($colaborador->cpf)){{$colaborador->cpf}}@elseif(!empty(old('cpf'))){{old('cpf')}}@else{{''}}@endif">
                    </label>
                </div>
                <div class="w-1/2 ml-2">
                    <label class="block">
                        <span class="text-gray-700">Telefone</span>
                        <input type="text" name="telefone" placeholder="(00) 00000-0000" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                        value="@if(!empty($colaborador->telefone)){{$colaborador->telefone}}@elseif(!empty(old('telefone'))){{old('telefone')}}@else{{''}}@endif">
                    </label>
                </div>
            </div><br><br>

            <label class="block">
                <span class="text-gray-700">Cargo</span>
                <input type="text" name="cargo" placeholder="Cargo do colaborador" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                value="@if(!empty($colaborador->cargo)){{$colaborador->cargo}}@elseif(!empty(old('cargo'))){{old('cargo')}}@else{{''}}@endif">
            </label><br><br>

            @php
                    $nome_imagem = !empty($colaborador->imagem) ? $colaborador->imagem : 'sem_imagem.jpg';
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
            <a href="{{ route('colaborador.index') }}"><button type="button" class="rounded-2xl bg-gray-300 px-4 py-2 w-32 font-bold hover:bg-gray-400">Voltar</button></a>
        </form>
        </div>
    </div>
@endsection


