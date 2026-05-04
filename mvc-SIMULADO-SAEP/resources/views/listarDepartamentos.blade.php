<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Departamentos</title>
</head>
<body>

    <h1>Cadastrar Departamento</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('departamento.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
        <br><br>

        <label>Sigla:</label>
        <input type="text" name="sigla" value="{{ old('sigla') }}">
        <br><br>

        <label>Orçamento:</label>
        <input type="text" name="orcamento" value="{{ old('orcamento') }}">
        <br><br>

        <label>Data Criação:</label>
        <input type="date" name="data_criacao" value="{{ old('data_criacao') }}" required>
        <br><br>

        <button type="submit">Salvar</button>
    </form>

    <hr>

    <h2>Lista de Departamentos</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Orçamento</th>
            <th>Data Criação</th>
        </tr>

        @foreach ($departamentos as $dep)
            <tr>
                <td>{{ $dep->id }}</td>
                <td>{{ $dep->nome }}</td>
                <td>{{ $dep->sigla }}</td>
                <td>{{ $dep->orcamento }}</td>
                <td>{{ $dep->data_criacao }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>