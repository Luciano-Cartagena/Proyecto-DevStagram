<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            //Este faker va a crear un post con titulo, descripción e imagen. Genera los datos de forma aletoria, toma uno
            //de los 3 de RandomElement y se lo va asignar.
            //Correr el Factory:: 
            //sail artisan tinker(Nos permite interactuar con la app o la BDs)
            //App\Models\Post::factory()->times(200)->create();
            //Cuando corramos este factory va a generar datos de prueba para cada uno de estos campos. Probar la migración 
            //tenga definidos los tipos de datos correctos. Si hay un error, el error este en la BD.
            'titulo' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . '.jpg',

            //ramdomElement de un listado o arreglo va a seleccionar diferentes.
            'user_id' => $this->faker->randomElement([11, 12, 13])
        ];
    }
}
