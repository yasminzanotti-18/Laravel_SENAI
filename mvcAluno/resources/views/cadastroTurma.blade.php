<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Numero da Sala</title>
</head>
<body>
    <h1>Cadastro do Numero da Sala</h1>

    @if(session('success'))
       <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{route('turma.salvar') }}" method="POST">
       @csrf  
       <label for="numSala">numSala: </label>
       <input type="number" name="numSala" id="numSala" placeholder="Número da Sala..." required value="{{old('numSala') }}">
       <br><br>
       <label for="serie">Serie:</label>
       <input type="text" name="serie" id="serie" placeholder="Serie..." required value="{{old('serie')}}">
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