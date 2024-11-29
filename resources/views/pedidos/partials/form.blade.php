<form method="POST" action="/novopedido">
@csrf
<input type="hidden" name="file_id" value="{{$file->id}}">
<div class="card">
  <div class="card-header">Formulário de Requisição do Arquivo</div>

    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">

                <div class="form-group">
                    <label for="nome" class="required">Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome',$pedido->nome)}}">
                </div>

                <div class="form-group">
                        <label for="email" class="required">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email',$pedido->email)}}">
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="finalidade">Finalidade do uso do arquivo: </label><br>
            <textarea name="finalidade" rows="5" cols="60">{{old('finalidade',$pedido->finalidade)}}</textarea>
        </div>

        <div class="form-group">
          <div class="captcha">
            <span>{!! captcha_img('flat') !!}</span>
            <button type="button" class="btn btn-danger reload" id="reload">&#x21bb</button>
          </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="captcha" placeholder="Digite o captcha">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar Pedido</button>
        </div>

</form>
