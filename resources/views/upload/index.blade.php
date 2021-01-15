@extends('laravel-usp-theme::master')

@section('content')

@inject('arquivo','App\Models\File')

<div class="card">
    <div class="card-header"><b>Enviar Arquivos</b></div>
        <div class="card-body">
            @include('files.partials.enviar')
        </div>  
</div>

@endsection