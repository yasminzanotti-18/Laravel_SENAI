<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionário</title>
</head>
<body>
    <h1>Cadastro Funcionário</h1>

    <br>
    <a href="{{ route('funcionario.listar') }}">Listar Funcionários</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('funcionario.salvar') }}" method="POST">
        @csrf

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            required value="{{ old('nome') }}"
        >
        <br><br>

        <label for="sobrenome">Sobrenome: </label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome..."
            required value="{{ old('sobrenome') }}"
        >
        <br><br>

        <label for="cargo">Cargo: </label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo..."
            required value="{{ old('cargo') }}"
        >
        <br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email') }}"
        >
        <br><br>

        <label for="data_admissao">Data de Admissão: </label>
        <input type="date" name="data_admissao" id="data_admissao"
            required value="{{ old('data_admissao') }}"
        >
        <br><br>

        <label for="salario">Salário: </label>
        <input type="number" step="0.01" name="salario" id="salario" placeholder="Salário..."
            required value="{{ old('salario') }}"
        >
        <br><br>

        <label for="cpf">CPF: </label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF..."
            required value="{{ old('cpf') }}"
        >
        <br><br>

          <label for="rg">RG: </label>
        <input type="text" name="rg" id="rg" placeholder="Digite seu RG..."
            required value="{{ old('rg') }}"
        >
        <br><br>

          <label for="data_nascimento">Data de Nascimento: </label>
        <input type="date" name="data_nascimento" id="data_nascimento"
            required value="{{ old('data_nascimento') }}"
        >
        <br><br>

          <label for="cep">CEP: </label>
        <input type="text" name="cep" id="cep" placeholder="Digite seu CEP..."
            required value="{{ old('cep') }}"
        >
        <br><br>

        <select name="departamento_id" id="departamento_id">
        @foreach ($departamentos as $dep)
            <option value="{{ $dep->id }}">{{ $dep->nome }}</option>
        @endforeach
        </select>

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>