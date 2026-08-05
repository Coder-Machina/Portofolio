@props(['project'])

<article class="glass-card" style="display:flex;flex-direction:column;height:100%;">

    {{-- Thumbnail --}}
    <div class="project-card-img" style="height:200px;background:linear-gradient(135deg,var(--bg-surface),#1a1a2e);">
        @if($project->thumbnail)
            <img src="{{ asset('storage/'.$project->thumbnail) }}"
                 alt="{{ $project->title }}"
                 style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;"/>
        @else
            {{-- Placeholder stylisé --}}
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">
                <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,255,136,0.05),rgba(123,97,255,0.08));"></div>
                <div style="text-align:center;position:relative;">
                    <div style="font-size:2.5rem;font-weight:800;font-family:var(--font-mono);background:linear-gradient(135deg,var(--accent-green),var(--accent-purple));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;line-height:1;">
                        {{ strtoupper(substr($project->title, 0, 2)) }}
                    </div>
                    <p class="font-mono text-xs" style="color:var(--text-faint);margin-top:0.25rem;">{{ $project->category->name ?? 'Project' }}</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div style="padding:1.5rem;display:flex;flex-direction:column;gap:0.875rem;flex:1;">

        {{-- Category + Featured badge --}}
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <span class="badge badge-purple font-mono">
                {{ $project->category->name ?? 'General' }}
            </span>
            @if($project->is_featured ?? false)
                <span class="badge badge-green font-mono" style="font-size:0.65rem;">
                    ★ Featured
                </span>
            @endif
        </div>

        {{-- Title --}}
        <h3 style="font-size:1.1rem;font-weight:700;line-height:1.3;margin:0;">
            <a href="{{ route('projects.show', $project->slug) }}"
               style="color:var(--text-primary);text-decoration:none;transition:color 0.2s;"
               onmouseover="this.style.color='var(--accent-green)'"
               onmouseout="this.style.color='var(--text-primary)'">
                {{ $project->title }}
            </a>
        </h3>

        {{-- Description --}}
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.65;flex:1;">
            {{ Str::limit($project->short_desc, 110) }}
        </p>

        {{-- Tech stack --}}
        @if(!empty($project->tech_stack))
            <div style="display:flex;flex-wrap:wrap;gap:0.4rem;">
                @foreach(array_slice((array)$project->tech_stack, 0, 4) as $tech)
                    <span class="tech-tag">{{ $tech }}</span>
                @endforeach
                @if(count((array)$project->tech_stack) > 4)
                    <span class="tech-tag" style="color:var(--accent-green);border-color:rgba(0,255,136,0.15);">
                        +{{ count((array)$project->tech_stack) - 4 }}
                    </span>
                @endif
            </div>
        @endif

        {{-- Links --}}
        <div style="display:flex;align-items:center;gap:0.75rem;margin-top:auto;padding-top:0.5rem;border-top:1px solid var(--border);">
            <a href="{{ route('projects.show', $project->slug) }}"
               class="font-mono text-xs transition-all"
               style="color:var(--accent-green);display:flex;align-items:center;gap:0.25rem;"
               onmouseover="this.style.gap='0.5rem'" onmouseout="this.style.gap='0.25rem'">
                Voir le projet
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>

            <div style="flex:1;"></div>

            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                   class="font-mono text-xs transition-all"
                   style="color:var(--text-muted);display:flex;align-items:center;gap:0.25rem;"
                   onmouseover="this.style.color='var(--text-primary)'"
                   onmouseout="this.style.color='var(--text-muted)'"
                   title="GitHub">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                    </svg>
                </a>
            @endif

            @if($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" rel="noopener"
                   class="font-mono text-xs transition-all"
                   style="color:var(--text-muted);display:flex;align-items:center;gap:0.25rem;"
                   onmouseover="this.style.color='var(--accent-blue)'"
                   onmouseout="this.style.color='var(--text-muted)'"
                   title="Live demo">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
                        <polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                    </svg>
                </a>
            @endif
        </div>

    </div>
</article>
