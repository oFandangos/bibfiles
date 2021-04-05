<table class="table table-striped">
    <thead>
        <tr>
            <th>Arquivo</th>
            <!--gate de adm-->
            <th>Download</th>
            <th>Ações</th>
            <!--fim gate de adm-->
        </tr>
    </thead>
    <tbody>
        @foreach($file as $arquivo)
            <tr>
                <td>            
                <a href="/requisicao/{{$arquivo->id}}" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
                </td>
                <!--gate de adm-->
                <td>
                    <a href="/file/{{$arquivo->id}}" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i></a>
                </td>
                <td>
                    <form method="post" action="/file/{{$arquivo->id}}">         
                        @csrf
                        @method('delete')
                        <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                <!--fim gate de adm-->
            </tr>
        @endforeach
    </tbody>
</table>
