<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\CouponCode;
use App\Models\Favoutire;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\User;
use App\Models\WebsiteInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        WebsiteInfo::create(
            [
                'email' => 'admin@website.com',
                'coins_rate' => 0.1,
                'withdraw_rate' => 0.1,
                'phone' => '123456789',
                'address' => 'Address',
                'facebook' => 'https://www.facebook.com',
                'twitter' => 'https://www.twitter.com',
                'instagram' => 'https://www.instagram.com',
                'tiktok' => 'https://www.tiktok.com',
                'youtube' => 'https://www.youtube.com',
                'whatsapp' => 'https://www.whatsapp.com',
                'play_store_link' => 'https://www.playstore.com',
                'app_store_link' => 'https://www.appstore.com',
                'about' => 'About us',
            ]
        );
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@website.com',
            'phone' => '123456789',
            'email_verified_at' => now(),
            'password' => 'Admin3@1',
            'type' => 'admin',
            'active' => true,
            'coins' => 0,
        ]);
        
        User::factory(50)->create();

        $this->call(CategorySeeder::class);
        $this->call(PackagesSeeder::class);
        $this->call(ServicesSeeder::class);

        $this->call(WithdrawalSeeder::class);
    }
}
