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


        Provider::create([
            'name'=>'Hamada Shops',
            'address' => '35 amman, Jordan'
        ]);

        File::create([
            'name'=>'file',
            'path'=>'provider1.png',
            'fileable_type'=>'App\Models\Provider',
            'fileable_id'=> 1,
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
