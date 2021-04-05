@extends('main')

@section('content')

<div class="card">
    <div class="card-header"><b>Informação Sobre o Arquivo</b></div>
        <div class="card-body">
        <div>
            <b>Nome do Arquivo:</b> {{$file->original_name}}<br>
            <b>Status de Circulação:</b> {{$file->acesso}}<br><br>
        </div>
            @include('files.partials.requisicao')
        </div>  
</div>

@endsection

