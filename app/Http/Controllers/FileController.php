<?php

namespace App\Http\Controllers;

use Response;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index(Request $request){
        return view('index');
    }    

    public function store(FileRequest $request)
    {
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
        return Storage::download($file->path, $file->original_name);
    }

    public function destroy(File $file)
    {
        $file->delete();
        return back()->with('success', 'Arquivo Deletado'); ;
    } 

    public function enviar(Request $request){
        return view('upload.index');
    }    

    public function consulta(Request $request){
        $file = File::get();
        return view('consulta.index')->with('file',$file);
    }    

}
