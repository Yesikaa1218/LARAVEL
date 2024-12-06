<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnosFactory extends Factory
{
    protected $model = \App\Models\Alumnos::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Matricula' => $this->faker->unique()->numberBetween(1700000, 2200000),
            'Nombre' => $this->faker->name,
            'Plan' => $this->faker->randomElement([420, 430, 440]),
        ];
    }
}
