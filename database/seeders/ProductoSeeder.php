<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::factory(10)->create();

        foreach ($productos as $producto){
            Imagen::factory(1)->create([
                'imageable_id' => $producto->id,
                'imageable_type' => Producto::class
            ]);
            $producto->pedidos()->attach([
                rand(1, 4),
                rand(1, 4)
            ]);
        }
    }
}
