<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favoutire>
 */
class FavoutireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition(): array
     {
        return [
            'user_id' => $this->faker->randomElement(User::where('type', 'user')->pluck('id')->toArray()),
            'service_id' => $this->faker->randomElement(Service::pluck('id')->toArray()),
        ];
     }
}
