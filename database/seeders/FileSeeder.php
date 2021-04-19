<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'name' => 'PDF de Teste',
            'original_name' => 'pdf_de_Teste.pdf',
            'path' => './tmp/PDFdeTeste.pdf',
            'user_id'  => '10',
        ];

        File::create($entrada); 
        File::factory(20)->create();
    }
}
