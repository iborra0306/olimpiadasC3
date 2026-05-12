<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Prueba;
use App\Models\ResultadoOlimpiadasCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        $this->call(CentroSeeder::class);
        $this->call(CiclosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        if (App::environment('local')) {
            $this->call(EdicionesSeeder::class);
            $this->call(CursoSeeder::class);
            $this->call(PruebasTableSeeder::class);
        }
        ResultadoOlimpiadasCache::factory(30)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->command->info('Tablas inicializadas con datos!');

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
