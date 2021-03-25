<?php

namespace App\Http\Controllers;

use Response;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
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
        $file = File::get();
        return view('consulta.index')->with('file',$file);
    }    

    public function requisicao(Request $request){
        return view('requisicao.index');
    }  

}
