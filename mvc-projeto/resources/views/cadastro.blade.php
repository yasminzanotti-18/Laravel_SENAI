<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
    <h1>Cadastro Produto<h1>

    @if(session('sucess'))
       <p style="color:green">{{session('sucess')}}</p>
    @endif

    <form action="{{route('produto.salvar') }}" method="POST">
       @csrf  
       <label for="nome">Nome: </label>
       <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{old('nome') }}">
       <br><br>
       <label for="preco">Preco:</label>
       <input type="preco" name="preco" id="preco" placeholder="Preco..." required value="{{old('preco')}}">
       <br><br>
       <label for="preco">Quantidade:</label>
       <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade..." required value="{{old('quantidade')}}">
       <input type="submit" value="Cadastrar">
    </form>
    @if($errors->any())
    <div style="color:rgb(236, 58, 34)">
        <ul>
            @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
            @endforeach
        </ul>
    </div>                
   @endif         
 </body>
</html>