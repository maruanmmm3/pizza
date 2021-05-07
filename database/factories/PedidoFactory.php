<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipo_pedido = $this->faker->randomElement(['Envio','Recoje']);
        return [
            'nombre_propietario' => User::all()->random()->name,
            'tipo_pedido' => $tipo_pedido,
            'slug' => Str::slug($tipo_pedido), 
            'user_id' => User::all()->random()->id
            
        ];
    }
}
