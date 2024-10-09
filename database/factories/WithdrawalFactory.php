<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Withdrawal>
 */
class WithdrawalFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'name' => $this->faker->name,
            'IBAN' => $this->faker->iban('NL'),
            'bank_name' => $this->faker->company,
            'swift_code' => $this->faker->swiftBicNumber,
            'address' => $this->faker->address,
            'currency' => $this->faker->currencyCode,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'status' => 'pending',
        ];
    }

    /**
     * Indicate that the withdrawal is with a note
     *
     * @return \Database\Factories\WithdrawalFactory
     */
    public function withNote(): WithdrawalFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'user_note' => $this->faker->sentence,
            ];
        });
    }
}
