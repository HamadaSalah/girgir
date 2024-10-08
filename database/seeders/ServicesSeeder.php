<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i<=25; $i++){

            $service = Service::create([
                'name' => '100 Ballons',
                'description' => '100 Ballons',
                'cost' => '50.5',
            ]);

            File::create([
                'name'=>'file',
                'path'=>'file.png',
                'fileable_type'=>'App\Models\Service',
                'fileable_id'=> $i,
            ]);
        }


    }
}
