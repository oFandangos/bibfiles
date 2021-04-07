@extends('main')

@section('content')

@inject('arquivo','App\Models\File')

<hr>

<div class="card">
    <div class="card-header"><b>Consulta de Arquivos</b></div>
        <div class="card-body">

            <form method="get" action="/files">
                <div class="row">
                    <div class=" col-sm input-group">
                    <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome do arquivo">  

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"> Buscar </button>
                    </span>
                    </div>
                </div>
            </form>

            <br>

            @include('files.partials.exibir')
        </div>  
</div>

@endsection