<x-layout>
<x-slot:title>{{ $project->title }} — Marcel TOGBOE</x-slot:title>
<x-slot:description>{{ $project->short_desc }}</x-slot:description>

{{-- BREADCRUMB --}}
<section class="site-container" style="padding-top:4rem;">
    <nav class="reveal" style="display:flex;align-items:center;gap:0.5rem;font-family:var(--font-mono);font-size:0.72rem;">
        <a href="{{ route('home') }}"
           style="color:var(--text-muted);text-decoration:none;transition:color 0.2s;"
           onmouseover="this.style.color='var(--accent-green)'"
           onmouseout="this.style.color='var(--text-muted)'">./home</a>
        <span style="color:var(--border);">/</span>
        <a href="{{ route('projects.index') }}"
           style="color:var(--text-muted);text-decoration:none;transition:color 0.2s;"
           onmouseover="this.style.color='var(--accent-green)'"
           onmouseout="this.style.color='var(--text-muted)'">./projects</a>
        <span style="color:var(--border);">/</span>
        <span style="color:var(--accent-green);">{{ $project->slug }}</span>
    </nav>
</section>

{{-- HERO --}}
<section class="site-container" style="padding-top:2.5rem;padding-bottom:4rem;">

    <div class="reveal" style="margin-bottom:2.5rem;">
        <span class="badge badge-purple font-mono" style="margin-bottom:1rem;display:inline-flex;">
            {{ $project->category->name }}
        </span>
        <h1 style="font-size:clamp(2rem,5vw,3.5rem);font-weight:800;letter-spacing:-0.03em;line-height:1.1;margin-bottom:1rem;">
            {{ $project->title }}
        </h1>
        <p style="color:var(--text-muted);font-size:1.1rem;max-width:42rem;line-height:1.7;">
            {{ $project->short_desc }}
        </p>
    </div>

    {{-- Action Links --}}
    <div class="reveal reveal-delay-1" style="display:flex;flex-wrap:wrap;gap:0.875rem;margin-bottom:3rem;">
        @if($project->live_url)
            <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="btn btn-primary font-mono">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
                    <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                Live Demo
            </a>
        @endif
        @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn btn-ghost font-mono">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                </svg>
                Voir sur GitHub
            </a>
        @endif
        <a href="{{ route('projects.index') }}" class="btn btn-ghost font-mono">
            ← Retour aux projets
        </a>
    </div>

    {{-- Project image --}}
    <div class="reveal reveal-delay-2" style="margin-bottom:3rem;max-width:48rem;margin-left:auto;margin-right:auto;">
        <div style="display:flex;align-items:center;justify-content:center;min-height:200px;">
            @if($project->thumbnail)
                <img src="{{ asset('storage/'.$project->thumbnail) }}"
                     alt="{{ $project->title }}"
                     style="max-width:100%;max-height:450px;object-fit:contain;border-radius:var(--radius-lg);"/>
            @else
                <div style="text-align:center;">
                    <p style="font-size:4rem;font-weight:700;color:var(--border-hover);">
                        {{ strtoupper(substr($project->title, 0, 2)) }}
                    </p>
                    <p class="font-mono text-sm" style="color:var(--text-muted);margin-top:0.5rem;">{{ $project->title }}</p>
                </div>
            @endif
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr;gap:2rem;" class="lg:grid-cols-3">

        {{-- Main content --}}
        <div style="grid-column:span 2;">

            {{-- Full description --}}
            <div class="reveal glass-card" style="padding:2rem;margin-bottom:2rem;">
                <h2 class="font-mono" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--accent-green);margin-bottom:1.25rem;">
                    // Description
                </h2>
                <div style="color:var(--text-muted);line-height:1.8;font-size:0.975rem;white-space:pre-line;">
                    {{ $project->full_desc }}
                </div>
            </div>

        </div>

        {{-- Sidebar: Tech stack --}}
        <div class="reveal reveal-delay-1">
            <div class="glass-card" style="padding:1.5rem;position:sticky;top:6rem;">
                <h3 class="font-mono" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--text-muted);margin-bottom:1rem;">
                    // Stack technique
                </h3>
                @if(!empty($project->tech_stack))
                    <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                        @foreach($project->tech_stack as $tech)
                            <span class="badge badge-purple font-mono" style="font-size:0.72rem;">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--border);">
                    <h3 class="font-mono" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--text-muted);margin-bottom:0.75rem;">
                        // Catégorie
                    </h3>
                    <span class="badge badge-green font-mono">{{ $project->category->name }}</span>
                </div>

                @if($project->github_url || $project->live_url)
                    <div style="margin-top:1.25rem;display:flex;flex-direction:column;gap:0.625rem;">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="btn btn-ghost font-mono" style="justify-content:center;font-size:0.78rem;">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                </svg>
                                GitHub
                            </a>
                        @endif
                        @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="btn btn-primary font-mono" style="justify-content:center;font-size:0.78rem;">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
                                    <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                                </svg>
                                Live Demo
                            </a>
                        @endif
                    </div>
                @endif

            </div>
        </div>

    </div>

    <style>
        @media(min-width:1024px) {
            .lg\:grid-cols-3 { grid-template-columns: 2fr 1fr !important; }
        }
    </style>

</section>

{{-- RELATED PROJECTS --}}
@if($related->isNotEmpty())
    <section class="site-container" style="padding-bottom:6rem;">
        <div class="reveal" style="margin-bottom:2.5rem;">
            <span class="section-label">à explorer aussi</span>
            <h2 style="font-weight:800;letter-spacing:-0.02em;margin-top:0.25rem;">
                Projets <span class="gradient-text">similaires</span>
            </h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.5rem;" class="reveal-stagger">
            @foreach($related as $r)
                <x-project-card :project="$r"/>
            @endforeach
        </div>
        <style>
            @media(min-width:640px)  { .reveal-stagger { grid-template-columns: repeat(2,1fr) !important; } }
            @media(min-width:1024px) { .reveal-stagger { grid-template-columns: repeat(3,1fr) !important; } }
        </style>
    </section>
@endif

</x-layout>
