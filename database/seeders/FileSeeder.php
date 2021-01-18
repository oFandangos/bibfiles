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
            'original_name' => 'PDF de Teste',
            'path' => './tmp/PDFdeTeste.pdf',
            'user_id'  => '1',
            'acesso' => 'Publico',
        ];

        File::create($entrada); 
        File::factory(20)->create();
    }
}
