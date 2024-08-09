<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Curso;

class AnuncioFactory extends Factory
{
    public function definition(): array
    {
        $title=$this->faker->unique()->sentence();
        return [
            'title' => $title,
            'body' => $this->faker->text(250),
            'status' => $this->faker->randomElement([1,2]),
            'user_id'=> user::all()->random()->id,
            'curso_id' => $this->faker->boolean(50) ? Curso::all()->random()->id : null
        ];
    }
}
