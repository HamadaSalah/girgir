<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Category::create([
            'name' => 'Birthday'
        ]);

        Category::create([
            'name' => 'Wedding'
        ]);

        Category::create([
            'name' => 'New born'
        ]);

        Category::create([
            'name' => 'Baby gender'
        ]);

        Category::create([
            'name' => 'Engagement'
        ]);

        Category::create([
            'name' => 'Graduation'
        ]);
        Category::create([
            'name' => 'Corporate Events'
        ]);


        for($i=1; $i<=6; $i++){
            File::create([
                'name'=>'file',
                'path'=>'cat'. $i+1 .'.png',
                'fileable_type'=>'App\Models\Category',
                'fileable_id'=> $i,
            ]);
        }



    }
}
