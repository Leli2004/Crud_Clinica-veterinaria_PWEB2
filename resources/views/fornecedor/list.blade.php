@extends('base.app')
@section("titulo", 'Listagem de Fornecedores')
@section('content')

    <h3 class="pt-4 text-2xl font-medium py-4">Listagem de Fornecedores</h3><br>
    <div class="flex">
        <div class="w-5/6">
            <form action="{{ route('fornecedor.search') }}" method="post">
                @csrf
                <p>Filtrar por: </p>
                <select name="tipo" class="data-te-select-init rounded-md w-40">
                    <option value="nome">Nome</option>
                    <option value="cnpj">CNPJ</option>
                    <option value="telefone">Telefone</option>
                    <option value="endereco">Endereço</option>
                </select>
                <input type="text" name="valor" class="data-te-select-init rounded-md w-80">
                <button
                    type="submit"
                    class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                    Buscar
                </button>
                <a href="{{route('fornecedor.index')}}">
                    <button
                    type="button"
                    class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                    Limpar
                    </button>
                </a>
            </form>
        </div>
        <div class="w-1/6 flex grid content-center float-right">
            <div>
                <br>
                <a href="{{route('fornecedor.create')}}">
                    <button
                    class="inline-block rounded border-2 border-slate-500 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-400 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                    Cadastrar novo
                    </button>
                </a>
            </div>
        </div>
    </div><br>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">ID</th>
                    <th scope="col" class="px-6 py-4">Nome</th>
                    <th scope="col" class="px-6 py-4">CNPJ</th>
                    <th scope="col" class="px-6 py-4">Telefone</th>
                    <th scope="col" class="px-6 py-4">Endereço</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                  </tr>
                </thead>
                @foreach ($fornecedores as $item)
                <tbody>
                  <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$item->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$item->nome}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$item->cnpj}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$item->telefone}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$item->endereco}}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <a href="{{route('fornecedor.edit', $item->id)}}">
                            <button
                            type="button"
                            class="inline-block rounded border-2 border-blue-600 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-blue-600 transition duration-150 ease-in-out hover:border-blue-300 hover:bg-blue-200 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                            Editar
                            </button>
                        </a>
                        <a href="{{route('fornecedor.destroy', $item->id)}}">
                            <button
                            onclick="return confirm('Deseja excluir o registro?')"
                            class="inline-block rounded border-2 border-red-600 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-red-600 transition duration-150 ease-in-out hover:border-red-300 hover:bg-red-200 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                            Deletar
                            </button>
                        </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div><br>
        <a href="{{route('fornecedor.report')}}" target="_blank">
            <button
            class="inline-block rounded border-2 border-slate-500 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-400 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
            Relatório de fornecedores
            </button>
        </a>
      </div>
 @endsection 
