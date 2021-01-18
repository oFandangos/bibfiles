<form method="post" enctype="multipart/form-data" action="/file/store">
    @csrf 
    <input type="file" name="file">
    <br><hr>
    <label for="original_name" class="required">Nome do Arquivo: </label>
    <input type="text" class="form-control" id="original_name" name="original_name">
    <br>
    <button type="submit" class="btn btn-success"> Enviar </button>
</form>   
