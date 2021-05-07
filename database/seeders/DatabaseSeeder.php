<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Pedido;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('productos');
        Storage::makeDirectory('productos');

        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);
        Categoria::factory(4)->create();
        
        Pedido::factory(20)->create();
        $this->call(ProductoSeeder::class);
    }
}
