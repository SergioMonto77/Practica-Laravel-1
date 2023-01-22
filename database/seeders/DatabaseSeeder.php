<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Libro};

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //primero debo llamar a la tabla padre(user) y posteriormente la tabla hija (libros). Es hija ya que esta depende de la otra
        User::factory(10)->create();
        
        Libro::factory(100)->create(); //como he hecho el use de su namespace puedo ponerlo así. Si no lo pondría de esta forma: \App\Models\User::factory(10)->create();
    }
}
