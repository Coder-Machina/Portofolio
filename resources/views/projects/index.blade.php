<x-layout>
<x-slot:title>Projets — Marcel TOGBOE</x-slot:title>
<x-slot:description>Découvrez tous les projets de Marcel TOGBOE : applications web full-stack, outils AI/MLOps, et projets Laravel.</x-slot:description>

{{-- HEADER --}}
<section class="site-container" style="padding-top:5rem;padding-bottom:3rem;">

    <div class="reveal">
        <span class="section-label">portfolio complet</span>
        <h1 style="font-size:clamp(2.2rem,5vw,4rem);font-weight:800;letter-spacing:-0.03em;margin-top:0.5rem;line-height:1.1;">
            Mes <span class="gradient-text">Projets</span>
        </h1>
        <p style="color:var(--text-muted);font-size:1rem;margin-top:0.75rem;max-width:36rem;line-height:1.7;">
            {{ $projects->count() }} projet{{ $projects->count() > 1 ? 's' : '' }} —
            du web full-stack à l'IA embarquée.
        </p>
    </div>

    {{-- Filter tabs --}}
    <div class="reveal reveal-delay-2" style="display:flex;flex-wrap:wrap;gap:0.625rem;margin-top:2rem;">
        <a href="{{ route('projects.index') }}"
           class="filter-tab {{ !request('category') ? 'active' : '' }}">
            Tous ({{ $categories->sum('projects_count') }})
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('projects.index', ['category' => $cat->slug]) }}"
               class="filter-tab {{ request('category') === $cat->slug ? 'active' : '' }}">
                {{ $cat->name }} ({{ $cat->projects_count }})
            </a>
        @endforeach
    </div>

</section>

{{-- GRID PROJECTS --}}
<section class="site-container" style="padding-bottom:7rem;">

    @if($projects->isEmpty())
        <div class="reveal glass-card" style="padding:5rem;text-align:center;">
            <div style="font-size:3rem;margin-bottom:1rem;">🔭</div>
            <p class="font-mono text-sm" style="color:var(--text-muted);">
                // aucun projet dans cette catégorie
            </p>
            <a href="{{ route('projects.index') }}" class="btn btn-ghost font-mono" style="margin-top:1.5rem;display:inline-flex;">
                ← Voir tous les projets
            </a>
        </div>
    @else
        <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.5rem;" class="reveal-stagger">
            @foreach($projects as $project)
                <x-project-card :project="$project"/>
            @endforeach
        </div>

        <style>
            @media(min-width:640px)  { .reveal-stagger { grid-template-columns: repeat(2,1fr) !important; } }
            @media(min-width:1024px) { .reveal-stagger { grid-template-columns: repeat(3,1fr) !important; } }
        </style>
    @endif

</section>

</x-layout>
