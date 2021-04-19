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
                    <form method="post" action="/autorizar/{{$pedido->id}}">         
                        @csrf
                        <button type="submit"><i class=""></i>Autorizar</button>
                    </form>
                </td>
                <td>            
                    {{$pedido->files_id}} - {{App\Models\File::where('id',$pedido->files_id)->first()->name}}
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