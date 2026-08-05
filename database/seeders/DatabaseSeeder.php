<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate([
            'email' => 'test@example.com'
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password')
        ]);

        $this->call([
            CategorySeeder::class,  // 1er — projects en a besoin
            ProjectSeeder::class,   // 2ème
            SkillSeeder::class,     // 3ème
        ]);
    }

}



