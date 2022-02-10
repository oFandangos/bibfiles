@extends('main')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Autorização</th>
            <th>Arquivo Requisitado</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Finalidade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>
                <details>
                    <summary>Clique aqui para avaliar a requisição</summary>
                    <br>
                    <form method="post" action="/autorizar/{{$pedido->id}}">         
                        @csrf
                        <div class="col-sm form-group">
                            <button type="submit" class="btn btn-success" name="autorizar_action" value="acesso_autorizado"
                            onClick="return confirm('Tem certeza que deseja autorizar o pedido?')"></i>Autorizar Pedido</button>

                            <button type="submit" class="btn btn-danger" name="autorizar_action" value="acesso_negado"
                            onClick="return confirm('Tem certeza que deseja negar o pedido?')"></i>Negar Pedido</button>
                            <br><br>

                            <label for="justificativa">Insira a justificativa em caso do acesso ser negado: </label><br>
                            <textarea name="justificativa" rows="5" cols="40"></textarea>
                        </div>

                    </form>
                </details>
                </td>
                <td>             
                    {{ $pedido->file->name }}  ({{ $pedido->file->original_name }})
                </td>
                <td>            
                    {{$pedido->nome}}
                </td>
                <td>
                    {{$pedido->email}}
                </td>
                <td>
                    {{$pedido->finalidade}} 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection