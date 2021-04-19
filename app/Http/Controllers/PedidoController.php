<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Pedido;
use App\Http\Requests\PedidoRequest;
use App\Mail\pedido_autorizacao_mail;
use App\Mail\acesso_autorizado_mail;

class PedidoController extends Controller
{
    public function create(File $file){
        return view('pedidos.create')->with([
            'file'   => $file,
            'pedido' => new Pedido(), 
        ]);
    }  

    public function store(PedidoRequest $request, Pedido $pedido){
        $validated = $request->validated();
        Pedido::create($validated);
        Mail::send(new pedido_autorizacao_mail($request));
        request()->session()->flash('alert-success', 'Solicitação de acesso enviada com sucesso');
        return back();
    } 

    public function pendentes(){
        $pedidos = Pedido::where('autorizador_id','=',NULL)->get();
        return view('pedidos.pendentes',[
            'pedidos' => $pedidos
        ]);
    }


    public function autorizar(Pedido $pedido){

        $this->authorize('admin');
        $pedido->autorizador_id = Auth::user()->id;
        $pedido->autorizado_em = Carbon::now();
        $url = URL::temporarySignedRoute('acesso_autorizado', now()->addMinutes(2880), [
            'file_id' => $pedido->file_id,
            'email'   => $pedido->email,
        ]);

        Mail::send(new acesso_autorizado_mail($url,$pedido->email));
        request()->session()->flash('alert-info',
        'Autorização do arquivo enviada com sucesso para o email: ' . $pedido->email);
        return back();
    }

    
}
