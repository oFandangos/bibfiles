<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\File;
use App\Http\Requests\PedidoRequest;
use Illuminate\Support\Facades\URL;

class PedidoController extends Controller
{
    public function create(File $file){
        return view('pedidos.create')->with([
            'file'   => $file,
            'pedido' => new Pedido(), 
        ]);
    }  

    public function store(PedidoRequest $request){
        $validated = $request->validated();
        Pedido::create($validated);
        return back()->with('success', 'Solicitação enviada com sucesso'); ;;
    } 

    public function pendentes(){
        $pedidos = Pedido::where('autorizador_id','=',NULL)->get();
        return view('pedidos.pendentes',[
            'pedidos' => $pedidos
        ]);
    }


    public function autorizar(Pedido $pedido){

        $url = URL::temporarySignedRoute('acesso_autorizado', now()->addMinutes(120), [
            'file_id' => $pedido->file_id,
            'email'   => $pedido->email,
        ]);

        # Enviar um email para pessoa que fez a solicitação

        # Enviar essa url neste email: $url

        #  registrar que autorizou e quando em $pedido->autorizador_id e $pedido->autorizado_em

        dd($url);
    }

    
}
