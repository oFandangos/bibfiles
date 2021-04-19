<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'name' => 'User de Teste',
            'codpes' => '100000',
            'email' => 'Teste@Teste.com',
            'email_verified_at'  => '10',
            'password' => 'Teste',
            'remember_token' => 'Teste',

        ];

        User::create($entrada); 
        User::factory(20)->create();
    }
}