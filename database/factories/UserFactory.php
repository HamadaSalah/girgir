<?php

namespace Database\Factories;

use App\Enums\UserTypesEnum;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'email_verified_at' => now(),
            'password' => 'password',
            'type' => 'user',
            'active' => true,
            'coins' => 0,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model's type is admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserTypesEnum::ADMIN,
        ]);
    }

    /**
     * Indicate that the model's type is indvidual_provider.
     */
    public function individualProvider(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserTypesEnum::INDIVIDUAL_SERVICE_PROVIDER,
        ]);
    }

    /**
     * Indicate that the model's type is company_provider.
     */
    public function companyProvider(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => UserTypesEnum::COMPANY_SERVICE_PROVIDER,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function ($user) {
            if($user->type == UserTypesEnum::COMPANY_SERVICE_PROVIDER)
            {
                ServiceProvider::create(
                    [
                        'user_id' => $user->id,
                        'uuid' => Str::uuid()->toString(),
                        'business_number' => $this->faker->unique()->randomNumber(6),
                        'profile_picture' => 'images/company-service-providers/55b44ecf-50e3-4d7b-8e03-ec1dae5b6056.jpg',
                        'business_name' => $this->faker->company,
                    ]
                );
            }elseif($user->type == UserTypesEnum::INDIVIDUAL_SERVICE_PROVIDER)
            {
                ServiceProvider::create(
                    [
                        'user_id' => $user->id,
                        'uuid' => Str::uuid()->toString(),
                        'profile_picture' => 'images/individual-service-providers/d094c5d1-b073-436f-9206-f4a535a7430f.jpg',
                        'business_name' => $this->faker->company,
                    ]
                );
            }
        });
    }

}
