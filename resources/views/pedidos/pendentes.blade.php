@extends('main')

@section('content')

@foreach($pedidos as $pedido)

{{ $pedido->nome }} - {{ $pedido->email }} - {{ $pedido->finalidade }} 
<form method="post" action="/autorizar/{{$pedido->id}}">         
    @csrf
    <button type="submit"><i class=""></i> Autorizar</button>
</form>
                    <br>

@endforeach

@endsection