<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $skills = [
        // Backend
        ['name' => 'Laravel',  'level' => 4, 'group' => 'Backend', 'order' => 1],
        ['name' => 'Python',   'level' => 4, 'group' => 'Backend', 'order' => 3],
        ['name' => 'PHP',      'level' => 4, 'group' => 'Backend', 'order' => 4],

        // Frontend
        ['name' => 'Tailwind', 'level' => 3, 'group' => 'Frontend', 'order' => 1],
        ['name' => 'Blade',    'level' => 4, 'group' => 'Frontend', 'order' => 2],

        // AI / MLOps
        ['name' => 'Anthropic API', 'level' => 3, 'group' => 'AI/MLOps', 'order' => 1],
        ['name' => 'DeepSeek API',  'level' => 3, 'group' => 'AI/MLOps', 'order' => 2],
        ['name' => 'Ollama',        'level' => 3, 'group' => 'AI/MLOps', 'order' => 3],

        // DevOps
        ['name' => 'Railway',  'level' => 2, 'group' => 'DevOps', 'order' => 1],
    ];

    foreach ($skills as $skill) {
        Skill::updateOrCreate(
            ['name' => $skill['name']],
            $skill
        );
    }
}
}
