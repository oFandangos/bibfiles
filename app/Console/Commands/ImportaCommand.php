<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ImportaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /* Script usado quando migramos o sistema, mantido para histórico apenas
        
        $lista = file_get_contents("http://public.fflch.usp.br/lista.txt");
        $lista = explode(PHP_EOL, $lista);
        foreach($lista as $arquivo){
            $file = File::where('original_name',$arquivo)->first();
            if(!$file) $file = new File;

            $web = Http::retry(10, 600)->get('http://public.fflch.usp.br/w/' . $arquivo);
            
            $file->original_name = $arquivo;
            $file->name = $arquivo;
            $file->path =  md5($arquivo) . '.pdf';
            Storage::disk('local')->put($file->path,$web->body());
            $file->user_id = 1;
            $file->save();
        }
        */

        return 0;
    }
}
