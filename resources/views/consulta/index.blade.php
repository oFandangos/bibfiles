@extends('laravel-usp-theme::master')

@section('content')

@inject('arquivo','App\Models\File')

<hr>

<div class="card">
    <div class="card-header"><b>Arquivos Enviados</b></div>
        <div class="card-body">
            @include('files.partials.exibir')
        </div>  
</div>

@endsection