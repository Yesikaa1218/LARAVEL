<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Materia;

class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->word,
            'capacidad' => $this->faker->numberBetween(10, 100),
            'fkEmpMat' => $this->faker->randomNumber(), // Asume que fkEmpMat es un número
            'Activo' => $this->faker->boolean,
            'clave' => Materia::inRandomOrder()->first()->clave ?? $this->faker->word, // Usar valor de Materia si existe
            'grupo' => $this->faker->numberBetween(1, 10),
            'horario' => $this->faker->word,
            'frecuencia' => $this->faker->randomElement(['S', 'M', 'T', 'W', 'R', 'F', 'U']), // Dos letras o días de la semana
            'aula' => $this->faker->word,
            'plan' => $this->faker->numberBetween(420, 440), // Ajusta según los valores permitidos
            'Modalidad' => $this->faker->word,
        ];
    }
}
