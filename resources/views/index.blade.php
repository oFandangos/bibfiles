@extends('main')

@section('content')

<div class="card">
    <div class="card-header"><b>Sistema de Upload de arquivos da Biblioteca - FFLCH USP</b></a></div>
    <div class="card-body">
        <div class="col-sm">
            <a href="/enviar" class="btn btn-success"> 
            <i class="fas fa-upload"></i>
                Enviar Arquivos
            </a>
        </div>
        <br>
        <div class="col-sm">
            <a href="/consulta" class="btn btn-success"> 
            <i class="fas fa-search"></i>
                Acessar arquivos enviados 
            </a>
        </div>
    </div>
</div>


@endsection
