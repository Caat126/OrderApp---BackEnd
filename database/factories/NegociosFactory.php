<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocios>
 */
class NegociosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => 6,
            'nombre' => fake()->company(),
            'imagen' => 'default.png',
            'descripcion' => fake()->sentence(),
            'estado' => true,
        ];
    }
}
