<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Funcionário</title>
</head>
<body>
    <h1>Atualizar Funcionário</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            required value="{{ old('nome', $funcionario->nome) }}"
        >
        <br><br>

        <label for="sobrenome">Sobrenome: </label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome..."
            required value="{{ old('sobrenome', $funcionario->sobrenome) }}"
        >
        <br><br>

        <label for="cargo">Cargo: </label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo..."
            required value="{{ old('cargo', $funcionario->cargo) }}"
        >
        <br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email', $funcionario->email) }}"
        >
        <br><br>

        <label for="data_admissao">Data de Admissão: </label>
        <input type="date" name="data_admissao" id="data_admissao"
            required value="{{ old('data_admissao', $funcionario->data_admissao) }}"
        >
        <br><br>

        <label for="salario">Salário: </label>
        <input type="number" step="0.01" name="salario" id="salario" placeholder="Salário..."
            required value="{{ old('salario', $funcionario->salario) }}"
        >
        <br><br>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>