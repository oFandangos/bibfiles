<?php

namespace App\Http\Controllers;

use Response;
use App\Models\File;
use App\Models\Requisicao;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Http\Requests\RequisicaoRequest;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function index(Request $request, File $file){
        $file = File::get();
        return view('index')->with('file',$file);
    }    

    public function store(FileRequest $request)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $file = new File;
        $file->original_name = $request->original_name;
        $file->path = $request->file('file')->store('.');
        //alterar user id posteriormente quando houver session
        $file->user_id = 'teste';
        $file->save();
        return back()->with('success', 'Arquivo enviado com sucesso');
    }

    public function show(File $file)
    {
        $this->authorize('admin');
        return Storage::download($file->path, $file->original_name);
    }

    public function destroy(File $file)
    {
        $this->authorize('admin');
        $file->delete();
        return back()->with('success', 'Arquivo Deletado'); ;
    } 

    public function enviar(Request $request){
        $this->authorize('admin');
        return view('upload.index');
    }    

    public function consulta(Request $request){

        if ($request->busca != null){
            $file = File::where('original_name','LIKE',"%{$request->busca}%")->paginate(10);
        } else {
            $file = File::paginate(10);
        }
        return view('consulta.index')->with('file',$file);
    }    

    public function requisicao(File $file){
        return view('requisicao.index')->with([
            'file' => $file,
            'requisicao' => new Requisicao()
        ]);
    }  

    public function pedido(RequisicaoRequest $request, Requisicao $requisicao){
        $validated = $request->validated();
        $requisicao = new Requisicao;
        $requisicao->files_id = $request->files_id;
        $requisicao->nome = $request->nome;
        $requisicao->email = $request->email;
        $requisicao->finalidade = $request->finalidade;
        $requisicao->save();
        return back()->with('success', 'Arquivo enviado com sucesso'); ;;
    } 

}
