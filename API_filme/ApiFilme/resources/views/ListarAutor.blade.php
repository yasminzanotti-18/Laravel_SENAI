<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>E-MAIL</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Autores as $Autor)
                    <tr>
                        <td>{{ $Autor->id }}</td>
                        <td>{{ $Autor->nome }}</td>
                        <td>{{ $Autor->dataNascimento }}</td>
                        <td>{{ $Autor->email }}</td>
                        <td>{{ $Autor->telefone }}</td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="13">Nenhum Autor encontrado</td>
                    </tr>
                @endforelse
            </tbody>
    </body>
</html>