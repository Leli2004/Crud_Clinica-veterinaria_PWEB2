
@extends('base.app')
@section("titulo", 'Listagem de Fornecedores')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($fornecedor->id)){
            $route = route('fornecedor.update', $fornecedor->id);
        } else{
            $route = route('fornecedor.store');
        }
    @endphp


    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="py-12">
        <h3 class="pt-4 text-2xl font-medium py-4">Formulário de Fornecedor</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($fornecedor->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($fornecedor->id)){{$fornecedor->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <label class="block">
                <span class="text-gray-700">Nome</span>
                <input type="text" name="nome" placeholder="Nome do fornecedor" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                value="@if(!empty($fornecedor->nome)){{$fornecedor->nome}}@elseif(!empty(old('nome'))){{old('nome')}}@else{{''}}@endif">
            </label><br><br>

            <div class="flex">
                <div class="w-1/2 mr-2">
                    <label class="block">
                        <span class="text-gray-700">CNPJ</span>
                        <input type="text" name="cnpj" placeholder="000.000.000-00" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                        value="@if(!empty($fornecedor->cnpj)){{$fornecedor->cnpj}}@elseif(!empty(old('cnpj'))){{old('cnpj')}}@else{{''}}@endif">
                    </label>
                </div>
                <div class="w-1/2 ml-2">
                    <label class="block">
                        <span class="text-gray-700">Telefone</span>
                        <input type="text" name="telefone" placeholder="(00) 00000-0000" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                        value="@if(!empty($fornecedor->telefone)){{$fornecedor->telefone}}@elseif(!empty(old('telefone'))){{old('telefone')}}@else{{''}}@endif">
                    </label>
                </div>
            </div><br><br>

            <label class="block">
                <span class="text-gray-700">Endereço</span>
                <input type="text" name="endereco" placeholder="Endereço do fornecedor" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                value="@if(!empty($fornecedor->endereco)){{$fornecedor->endereco}}@elseif(!empty(old('endereco'))){{old('endereco')}}@else{{''}}@endif">
            </label><br><br>

            <button class="rounded-2xl bg-blue-300 px-4 py-2 w-32 font-bold hover:bg-blue-400" type="submit">Salvar</button>
            <a href="{{ route('fornecedor.index') }}"><button type="button" class="rounded-2xl bg-gray-300 px-4 py-2 w-32 font-bold hover:bg-gray-400">Voltar</button></a>
        </form>
        </div>
    </div>
@endsection


