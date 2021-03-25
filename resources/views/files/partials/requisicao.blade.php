<form method="POST" action="/requisicoes">
@csrf
<div class="card">
  <div class="card-header">Informações Gerais</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nome" class="required">Nome: </label>
                    <input type="number" class="form-control" id="nome" name="nome" value="{{old('nome',$requisicoes->nome)}}">
                </div>

                <div class="col-sm form-group">
                    <div class="form-group">
                        <label for="email" class="required">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email',$requisicoes->email)}}">
                    </div>
                </div>
            </div>
        <div class="form-group">
            <label for="finalidade">Finalidade do uso do arquivo: </label>
            <textarea name="finalidade" rows="5" cols="60">{{old('finalidade',$requisicoes->finalidade)}}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar Pedido</button>
        </div>

</form>

