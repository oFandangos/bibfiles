<form method="post" enctype="multipart/form-data" action="/files">
    @csrf 
    <input type="file" name="file">
    <br><hr>
    <label for="name" class="required">Nome do Arquivo: </label>
    <input type="text" class="form-control" id="name" name="name">
    <br>
    <button type="submit" class="btn btn-success"> Enviar </button>
</form>   
