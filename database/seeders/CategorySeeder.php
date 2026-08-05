<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            ['name' => 'Web Full-Stack', 'slug' => 'web'],
            ['name' => 'AI / MLOps',     'slug' => 'ai-mlops'],
            ['name' => 'Embarqué',       'slug' => 'embedded'],
            ['name' => 'Open Source',    'slug' => 'open-source'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}

