<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Licenciatura;
use App\Models\PlanEstudios;

class MateriaFactory extends Factory
{
    protected $model = \App\Models\Materia::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materia_licenciatur' => $this->faker->word,
            'creditos_materia_lic' => $this->faker->numberBetween(1, 5),
            'horas_semana_materia_lic' => $this->faker->numberBetween(1, 10),
            'optativa_materia_lic' => $this->faker->boolean,
            'semestre_materia_lic' => $this->faker->numberBetween(1, 8),
            'descripcion_materia_lic' => $this->faker->sentence,
            'requisitos_materia_lic' => $this->faker->sentence,
            'wordpress_id' => $this->faker->randomNumber(),
            'licenciatura_id' => Licenciatura::inRandomOrder()->first()->id, // Obtener un ID de licenciatura aleatorio
            'plan_de_estudio_id' => PlanEstudios::inRandomOrder()->first()->id, // Obtener un ID de plan de estudio aleatorio
            'active' => 1,
            'clave' => $this->faker->unique()->word,
        ];
    }
}
