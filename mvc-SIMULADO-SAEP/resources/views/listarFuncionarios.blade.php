<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <h1>Relatório de Funcionário</h1>

    <a href="{{ route('departamento.cadastro') }}">Cadastrar Funcionario</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>EMAIL</th>
                <th>DATA ADMISSÃO</th>
                <th>SALARIO</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->sobrenome }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->data_admissao }}</td>
                    <td>{{ $funcionario->salario }}</td>

                    {{-- <td>
                        <a href="{{ route('departamento.atualizar', $departamento->id) }}">
                            Atualizar
                        </a>
                    </td> --}}

                    <td>
                        <form action="{{ route('funcionario.deletar', $funcionario->id) }}" method="POST"
                              onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhum Funcionario encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>