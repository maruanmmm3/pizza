<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Decimal;
class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->word(20);
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'precio' => $this->faker->randomFloat(NULL, 0, 100),
            'descripcion' => $this->faker->text(150),

            'categoria_id' => Categoria::all()->random()->id,
        
        ];
    }
}
