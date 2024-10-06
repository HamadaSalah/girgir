<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => \Str::uuid()->toString(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'cover' => $this->faker->imageUrl(),
            'created_by' => $this->faker->randomElement(ServiceProvider::pluck('id')->toArray()),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }


    /**
     * Indicate that the service is a package.
     *
     * @return \Database\Factories\ServiceFactory
     */
    public function package(): ServiceFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'package',
            ];
        });
    }

    /**
     * Indicate that the service is a service.
     *
     * @return \Database\Factories\ServiceFactory
     */
    public function service(): ServiceFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'service',
            ];
        });
    }

    public function configure()
    {
        return $this->afterCreating(function ($service) {
            if ($service->type === 'service') {
                $service->varieties()->create([
                    'title' => $this->faker->sentence(),
                    'description' => $this->faker->paragraph(),
                    'cover' => $this->faker->imageUrl(),
                ]);
            }elseif ($service->type === 'package') {
                $service->features()->create([
                    'title' => $this->faker->sentence(),
                    'description' => $this->faker->paragraph(),
                ]);
            }

            $service->images()->create([
                'path' => $this->faker->imageUrl(),
            ]);
        });
    }

}

