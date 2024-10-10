<?php

namespace Database\Seeders;

use App\Models\Withdrawal;
use Illuminate\Database\Seeder;

class WithdrawalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Withdrawal::factory()
            ->count(10)
            ->create();
        Withdrawal::factory()
            ->count(10)
            ->withNote()
            ->create();
    }
}
