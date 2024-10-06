<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'service_id' => $this->faker->randomElement(Service::pluck('id')->toArray()),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }

    /**
     * Indicate that the feedback is with a review.
     *
     * @return \Database\Factories\FeedbackFactory
     */
    public function withFeedback(): FeedbackFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'feedback' => $this->faker->paragraph(),
            ];
        });
    }
}
