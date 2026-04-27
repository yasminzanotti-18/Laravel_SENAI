<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Alunos</title>
</head>
<body>
    <h1>Cadastro Alunos</h1>

    @if(session('sucess'))
        <p style="color:green">{{ session('sucess')}}</p>
    @endif

    <form action="{{ route('aluno.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{old('nome')}}">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email..." require value="{{old('email')}}">
        <br><br>

        <label for="turma_id">ID da Turma:</label>
        <input type="number" name="turma_id" id="turma_id" placeholder="ID da Turma..." require value="{{old('email')}}">

         <select name="turma_id" id="turma_id">
            @foreach ($turmas as $turma)
                <option value="{{$turma->id}}">{{$turma->serie}}</option>
            @endforeach
        </select>

        <h2>Informações Pessoais</h2>

       <label>Telefone:</label>
       <input type="text" name="telefone">
       <br><br>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento">
        <br><br>

        <label>Endereço:</label>
        <input type="text" name="endereco">
        <br><br>

        <label>Idade:</label>
        <input type="number" name="idade">
        <br><br>

        <button type="submit">Salvar</button>

</form>
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

































<h1>Cadastrar Aluno</h1>

<form action="{{route('aluno.salvar')}}" method="POST">
@csrf

<h2>Dados do Aluno</h2>

<label>Nome:</label>
<input type="text" name="nome" required>
<br><br>

<label>Email:</label>
<input type="email" name="email" required>
<br><br>

<label>ID Turma:</label>
<input type="number" name="turma_id">
<br><br>

<hr>

<h2>Informações Pessoais</h2>

<label>Telefone:</label>
<input type="text" name="telefone">
<br><br>

<label>Data de nascimento:</label>
<input type="date" name="data_nascimento">
<br><br>

<label>Endereço:</label>
<input type="text" name="endereco">
<br><br>

<label>Idade:</label>
<input type="number" name="idade">
<br><br>

<button type="submit">Salvar</button>

</form>


