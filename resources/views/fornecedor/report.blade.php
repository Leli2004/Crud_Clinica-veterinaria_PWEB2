<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório Fornecedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2 class="text-center mb-2">{{$title}}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cnpj }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->endereco }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
