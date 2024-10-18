<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Package;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $provider = Provider::create([
            'name'=>'Hamada Shops',
            'address' => '35 amman, Jordan',
            'email'=>'hamada@shops.com',
            'password'=>'Password',
            'logo' => 'provider-logo.png'
        ]);
        $provider->info()->create([
            'email'=>'hamada@shops.com',
            'telegram' => 'telegram',
            'instagram' => 'instagram',
            'whatsapp' => 'whatsapp',
            'twitter' => 'twitter',
            'facebook' => 'facebook',
            'youtube' => 'youtube',
            // 'phones' => ['9719444444444', '9719444444444'],
            'wechat' => 'wechat',
            'license_number' => 'license_number',
            'license_expire_date' => now(),
            'country' => 'country',
            'city' => 'city',
            'address' => 'address',
            'province' => 'province',
            'zip_code' => 'zip_code',
            'lat' => 'lat',
            'lng' => 'lng',
            // 'location' => [' Location 1: Downtown Dubai, near Burj Khalifa, Dubai, United Arab Emirates.', ' Location 1: Downtown Dubai, near Burj Khalifa, Dubai, United Arab Emirates.'],
            'mission' => 'Our store organizes all types of parties with creative touches that give your event a unique flair',
            'vision' => 'Our store organizes all types of parties with creative touches that give your event a unique flair',
            'values' => 'Our store organizes all types of parties with creative touches that give your event a unique flair',
            'about' => 'Our store organizes all types of parties with creative touches that give your event a unique flair. Enjoy parties tailored to your preferences and budget, with our meticulous attention to detail.',
        ]);


        Provider::create([
            'name'=>'test',
            'address' => '35 amman, Jordan',
            'email'=>'test@shops.com',
            'password'=>'Password',
            'logo' => 'provider-logo.png'
        ]);

        File::create([
            'name'=>'file',
            'path'=>'provider1.png',
            'fileable_type'=>'App\Models\Provider',
            'fileable_id'=> 1,
        ]);

        File::create([
            'name'=>'file',
            'path'=>'provider1.png',
            'fileable_type'=>'App\Models\Provider',
            'fileable_id'=> 2,
        ]);


        for($i=1; $i<=25; $i++){
            
            Package::create([
                'name'=>'Pink Theme Wedding',
                'description'=>'100 Guests, DJ Muisc, Drinks, Decor 100 Guests 100 Guests, DJ Muisc, Drinks, Decor',
                'cost'=>'200',
                'category_id'=>rand(1,4),
                'provider_id'=>1,
                'order_count' => rand(1,200)
            ]);

            File::create([
                'name'=>'file',
                'path'=>'package'. $i%4 .'.png',
                'fileable_type'=>'App\Models\Package',
                'fileable_id'=> $i,
            ]);

        }
    }
}
