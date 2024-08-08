<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => 'anuncio/' . $this->faker->image('public/storage/anuncio', 640, 480, null, false)//ruta, ancho, alto, n, true pone direccion cmpleta, false solo el archivo
        ];
    }
}
