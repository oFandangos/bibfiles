@extends('main')

@section('content')

<div class="card">
    <div class="card-header"><b>Solicitação de acesso ao arquivo: </b> {{$file->original_name}}</b></div>
        <div class="card-body">
            @include('pedidos.partials.form')
        </div>
</div>

@endsection

@section('javascripts_bottom')
  <script src="{{asset('/js/app.js')}}"></script>
@endsection('javascript_head')
