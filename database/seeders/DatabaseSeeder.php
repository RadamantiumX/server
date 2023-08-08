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
             'name' => 'epikkaAdmin',
             'email' => 'admin@epikka.com',
             'password'=>bcrypt('kj78la!0a'),
             'role'=>'admin'
         ]);

         
         
    }
}
