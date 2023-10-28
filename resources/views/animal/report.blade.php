<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório Animais</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2 class="text-center mb-2">{{$title}}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Peso - Kg</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Tutor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos ?? '' as $item)
                @php
                   $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                   $srcImagem = public_path()."/storage/".$nome_imagem;
                @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="h-32 w-32 object-cover rounded-full"><img src="{{$srcImagem}}" width="100px"
                        alt="imagem"></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->peso }}</td>
                    <td>{{ $item->porte }}</td>
                    <td>{{ $item->raca }}</td>
                    <td>{{ $item->tutor_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
