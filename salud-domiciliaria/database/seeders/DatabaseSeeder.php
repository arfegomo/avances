<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'last_name' => 'Test User',
             'email' => 'test@example.com',
             'identificacion' => '22222222',
             'celular' => '3134516034',
             'ubicacion' => 'Bucaramanga',
         ]);
    }
}
