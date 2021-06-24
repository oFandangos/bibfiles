{{ $files->appends(request()->query())->links() }}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Arquivo</th>
            @can('admin')
            <th>Download (somente admin)</th>
            <th>Ações</th>
            @endcan('admin')
        </tr>
    </thead>
    <tbody>
        @foreach($files as $arquivo)
            <tr>
                <td>            
                {{$arquivo->name}}
                </td>

                <td>            
                <a href="/{{$arquivo->original_name}}" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
                </td>
                @can('admin')
                <td>
                    <a href="/files/{{$arquivo->id}}" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i></a>
                </td>

                <td>
                    <form method="post" action="/files/{{$arquivo->id}}">         
                        @csrf
                        @method('delete')
                        <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                @endcan('admin')
            </tr>
        @endforeach
    </tbody>
</table>

{{ $files->appends(request()->query())->links() }}
