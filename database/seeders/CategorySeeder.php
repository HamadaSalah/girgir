<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'name' => 'New born'
        ]);
        Category::create([
            'name' => 'Baby gender'
        ]);
        Category::create([
            'name' => 'Wedding'
        ]);
    }
}
