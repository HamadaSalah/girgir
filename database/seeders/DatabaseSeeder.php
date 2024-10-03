<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CompanyServiceProvider;
use App\Models\CouponCode;
use App\Models\IndividualServiceProvider;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // CouponCode::factory(10)->create();
        // CouponCode::factory(6)->unlimited()->create();
        // CouponCode::factory(6)->used()->create();
        // CouponCode::factory(6)->expired()->create();
        // CouponCode::factory(6)->unlimited()->used()->create();
        // CouponCode::factory(6)->unlimited()->expired()->create();
        // CouponCode::factory(6)->used()->expired()->create();
        // CouponCode::factory(6)->unlimited()->used()->expired()->create();
        // CouponCode::factory(6)->inactive()->create();

        IndividualServiceProvider::factory(3)->create();
        CompanyServiceProvider::factory(6)->create();
    }
}
