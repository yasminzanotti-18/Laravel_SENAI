<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>
    <h1>Relatório do Produto</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>PRECO</th>
                 <th>QUANTIDADE</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
           @forelse($produtos as $produto)
           <tr>
              <td>{{$produto->id}}</td>
              <td>{{$produto->nome}}</td>
              <td>{{$produto->preco}}</td>
              <td>{{$produto->quantidade}}</td>
              <td> 
              <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
              </td>
              <td> 
                <form action="{{route('produto.deletar', $produto->id)}}" method="POST " onsubmit="return confirm('Deseja realmente excluir');"> 
                  @csrf  
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                 </form>
              </td>
           </tr>
        @empty
           <tr>
            <td colpan="3"> Nenhum Produto encontrado</td>
            </tr>
        @endforelse

      </tbody>
   </table>
</body>
</html>
