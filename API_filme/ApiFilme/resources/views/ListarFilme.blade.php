<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <h1>Controle de Filmes</h1>
        <a href="/autor/listar">Listar Autores</a>
        <br>

        <form method="GET" action="{{ route('filme.listar') }}">
    
            <input
                type="text"
                name="titulo"
                placeholder="Digite o título do filme"
                value="{{ request('titulo') }}"
            >
            
            <input
                type="text"
                name="dataLancamento"
                placeholder="Digite a data de lançamento"
                value="{{ request('dataLancamento') }}"
            >

            <button type="submit">Buscar</button>

        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DATA LANÇAMENTO</th>
                    <th>SINOPSE</th>
                    <th>GENERO</th>
                    <th>ORÇAMENTO</th>
                    <th>AUTOR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($filmes as $Filme)
                    <tr>
                        <td>{{ $Filme->id }}</td>
                        <td>{{ $Filme->titulo }}</td>
                        <td>{{ $Filme->dataLancamento }}</td>
                        <td>{{ $Filme->sinopse }}</td>
                        <td>{{ $Filme->genero }}</td>
                        <td>{{ $Filme->orcamento }}</td>
                        <td>{{ $Filme->autor->id ?? 'Autor não especificado' }}</td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="6">Nenhum Filme encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>