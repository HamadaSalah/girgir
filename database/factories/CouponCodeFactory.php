<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CouponCode>
 */
class CouponCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word,
            'discount' => $this->faker->randomFloat(2, 5, 90),
            'limit' => $this->faker->numberBetween(1, 100),
            'used' => 0,
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * Indicate that the coupon code has no limit.
     *
     * @return \Database\Factories\CouponCodeFactory
     */
    public function unlimited(): CouponCodeFactory
    {
        return $this->state(fn (array $attributes) => [
            'limit' => null,
        ]);
    }

    /**
     * Indicate that the coupon code has been used.
     *
     * @return \Database\Factories\CouponCodeFactory
     */
    public function used(): CouponCodeFactory
    {
        return $this->state(fn (array $attributes) => [
            'used' => $this->faker->numberBetween(1, 100),
        ]);
    }

    /**
     * Indicate that the coupon code has expired.
     *
     * @return \Database\Factories\CouponCodeFactory
     */
    public function expired(): CouponCodeFactory
    {
        return $this->state(fn (array $attributes) => [
            'expires_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ]);
    }

    /**
     * Indicate that the coupon code is inactive.
     *
     * @return \Database\Factories\CouponCodeFactory
     */
    public function inactive(): CouponCodeFactory
    {
        return $this->state(fn (array $attributes) => [
            'status' => false,
        ]);
    }
}
