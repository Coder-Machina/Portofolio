<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $web = Category::where('slug', 'web')->first()->id;
    $ai  = Category::where('slug', 'ai-mlops')->first()->id;

    $projects = [
        [
            'title'       => 'Nexus AI',
            'slug'        => 'nexus-ai',
            'short_desc'  => 'Agent IA REST API avec JWT, mémoire de session et personnalité configurable.',
            'full_desc'   => 'FastAPI + Anthropic API déployé sur api.nexusagent.dev. Auth JWT, Nginx, systemd, clés API par client.',
            'tech_stack'  => ['FastAPI', 'Python', 'Anthropic API', 'Nginx', 'JWT'],
            'github_url'  => 'https://github.com/coder-machina/nexus-page',
            'live_url'    => 'https://api.nexusagent.dev',
            'featured'    => true,
            'order'       => 1,
            'category_id' => $ai,
        ],

        [
            'title'       => 'BeninToam',
            'slug'        => 'BeninToam',
            'short_desc'  => 'Plateforme de tourisme béninois — consultation et mise en contact.',
            'full_desc'   => 'Laravel 11 + MySQL + Tailwind + Blade. MVP 5 sprints, Pest pour tests, déployé sur Railway.',
            'tech_stack'  => ['Laravel', 'Tailwind', 'MySQL', 'Pest', 'Railway'],
            'github_url'  => 'https://github.com/coder-machina/phoenix',
            'live_url'    => null,
            'featured'    => true,
            'order'       => 3,
            'category_id' => $web,
        ],
        [
            'title'       => 'TechStock',
            'slug'        => 'techstock',
            'short_desc'  => 'Application de gestion de stock de matériel informatique.',
            'full_desc'   => 'Laravel + Eloquent ORM. CRUD complet avec relations Room, Device, Intervention, Category.',
            'tech_stack'  => ['Laravel', 'MySQL', 'Blade', 'Eloquent'],
            'github_url'  => 'https://github.com/coder-machina/techstock',
            'live_url'    => null,
            'featured'    => false,
            'order'       => 4,
            'category_id' => $web,
        ],
    ];

    foreach ($projects as $project) {
        Project::updateOrCreate(
            ['slug' => $project['slug']],
            $project
        );
    }
}
}
