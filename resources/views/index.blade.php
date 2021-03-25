@extends('main')

@section('content')

@inject('arquivo','App\Models\File')

<div class="card">
    <div class="card-header"><b>Consulta de Arquivos</b></div>
        <div class="card-body">
            @include('files.partials.exibir')
        </div>  
</div>

@endsection
