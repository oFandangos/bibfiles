Um novo pedido de acesso foi realizado no sistema de arquivos da biblioteca da FFLCH - USP<br><br>

Informações sobre o pedido:<br>
<b>Nome do Arquivo:</b> {{App\Models\File::where('id',$pedido->file_id)->first()->name}} - <b>ID:</b> {{ $pedido->file_id }}.
<b>Nome do Requisitante:</b> {{ $pedido->nome }}.<br>
<b>Email:</b> {{ $pedido->email }}.<br>
<b>Finalidade do acesso:</b> {{ $pedido->finalidade }}.<br><br>

A requisição será analisada por um administrador do sistema, caso o acesso seja garantido, um email de confirmação 
será enviado contendo o link de acesso. O link autorizador funcionará por 48h após o envio do email.

<br><br>
Mensagem automática - Sistema de Arquivos da Biblioteca - FFLCH-USP
