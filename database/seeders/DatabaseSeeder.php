<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(50)->create();

         \App\Models\User::factory()->create([
             'name' => 'EduEpsiweb',
             'email' => 'adminEdu@espiweb.com',
             'password'=>bcrypt('SeBa2010!'),
             'role'=>'admin'
         ]);
         \App\Models\User::factory()->create([
            'name' => 'JuanEpsiweb',
            'email' => 'adminJuan@espiweb.com',
            'password'=>bcrypt('JuAn2023!'),
            'role'=>'admin'
        ]);
         /*\App\Models\Msg::create([
            'nombre'=>'Ariel',
            'email'=>'ariel@mail.com',
            'telefono'=>'1165363974',
            'mensaje'=>'nada en especial'
         ]);*/
    }
}
