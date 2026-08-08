<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->words(3, true),
            'description'=>fake()->sentence(1, true),
            'price'=>fake()->randomFloat(2, 100, 10000),
            'quantity'=>fake()->numberBetween(1, 100),
            


        ];
    }
}
