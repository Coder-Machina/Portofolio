<x-layout>
<x-slot:title>Marcel TOGBOE — Software Engineer · AI/MLOps · Laravel</x-slot:title>
<x-slot:description>Portfolio de Marcel TOGBOE, Software Engineer spécialisé en AI/MLOps et Laravel. Étudiant à ESGIS Bénin, basé à Cotonou.</x-slot:description>

{{-- ═══════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════ --}}
<section class="site-container" style="padding-top:6rem;padding-bottom:5rem;position:relative;">

    <div class="flex flex-col lg:flex-row items-center justify-between gap-16">

        {{-- Left: Text Content --}}
        <div class="flex-1 max-w-2xl">

            {{-- Available badge --}}
            <div class="reveal" style="margin-bottom:1.75rem;">
                <span style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.35rem 0.875rem;border-radius:99px;background:rgba(0,255,136,0.07);border:1px solid rgba(0,255,136,0.2);font-family:var(--font-mono);font-size:0.72rem;color:var(--accent-green);">
                    <span class="available-dot"></span>
                    Disponible pour des projets
                </span>
            </div>

            {{-- Main heading --}}
            <div class="reveal reveal-delay-1">
                <p class="font-mono text-sm" style="color:var(--accent-green);margin-bottom:0.5rem;letter-spacing:0.05em;">
                    Bonjour, je suis
                </p>
                <h1 style="font-size:clamp(2.8rem,6vw,5rem);font-weight:800;line-height:1.05;letter-spacing:-0.03em;margin-bottom:0.5rem;">
                    Marcel
                    <span class="gradient-text">TOGBOE</span>
                </h1>
            </div>

            {{-- Typing subtitle --}}
            <div class="reveal reveal-delay-2" style="margin-bottom:1.5rem;min-height:2.5rem;">
                <p class="font-mono" style="font-size:clamp(1rem,2.5vw,1.4rem);color:var(--accent-purple);font-weight:600;">
                    <span id="typing-text" class="typing-cursor"
                          data-lines='["Software Engineer", "AI / MLOps Engineer", "Laravel Developer", "Full-Stack Builder"]'></span>
                </p>
            </div>

            {{-- Description --}}
            <div class="reveal reveal-delay-3" style="margin-bottom:2rem;">
                <p style="font-size:1.05rem;color:var(--text-muted);line-height:1.75;max-width:32rem;">
                    Étudiant en Architecture de Logiciel à
                    <span style="color:var(--text-primary);font-weight:600;">ESGIS Bénin</span>,
                    je construis des produits orientés
                    <span style="color:var(--accent-blue);font-weight:500;">IA</span> et web
                    <span style="color:var(--accent-green);font-weight:500;">full-stack</span>.
                    Mon objectif : devenir ingénieur en MLOps &amp; IA.
                </p>
            </div>

            {{-- CTAs --}}
            <div class="reveal reveal-delay-4" style="display:flex;flex-wrap:wrap;gap:0.875rem;">
                <a href="{{ route('projects.index') }}" class="btn btn-primary font-mono">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                    Voir mes projets
                </a>
                <a href="{{ route('contact') }}" class="btn btn-ghost font-mono">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    Me contacter
                </a>
            </div>

            {{-- Quick links (social) --}}
            <div class="reveal reveal-delay-5" style="margin-top:2.5rem;display:flex;align-items:center;gap:1.5rem;">
                <span class="font-mono text-xs" style="color:var(--text-faint);">// find me</span>
                <a href="https://github.com/Coder-machina" target="_blank"
                   class="font-mono text-xs transition-all"
                   style="color:var(--text-muted);"
                   onmouseover="this.style.color='var(--accent-green)'"
                   onmouseout="this.style.color='var(--text-muted)'">GitHub ↗</a>
            </div>

        </div>

        {{-- Right: Decorative orb --}}
        <div class="reveal reveal-delay-2 flex-shrink-0 hidden lg:flex flex-col items-center gap-6">

            {{-- Floating tech bubbles --}}
            <div style="display:flex;gap:0.75rem;flex-wrap:wrap;justify-content:center;max-width:250px;">
                @foreach(['Laravel', 'Python', 'AI/ML', 'Vue.js', 'Docker'] as $tech)
                    <span style="
                        display:inline-flex;align-items:center;padding:0.3rem 0.75rem;
                        border-radius:99px;background:rgba(255,255,255,0.04);
                        border:1px solid var(--border);font-family:var(--font-mono);
                        font-size:0.7rem;color:var(--text-muted);
                        animation:float {{ $loop->index % 2 === 0 ? '4s' : '5s' }} ease-in-out {{ $loop->index * 0.3 }}s infinite;
                    ">{{ $tech }}</span>
                @endforeach
            </div>

        </div>

    </div>

    {{-- Decorative glow blobs --}}
    <div style="position:absolute;top:-80px;right:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(0,255,136,0.06),transparent 70%);border-radius:50%;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-80px;left:-80px;width:300px;height:300px;background:radial-gradient(circle,rgba(123,97,255,0.06),transparent 70%);border-radius:50%;pointer-events:none;"></div>

</section>

{{-- ═══════════════════════════════════════════════════════════
     STATS ROW
═══════════════════════════════════════════════════════════ --}}
<section class="site-container" style="padding-bottom:5rem;">
    <div class="reveal" style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;max-width:600px;">

        <div class="stat-card">
            <p class="stat-number gradient-text-green"
               data-counter data-target="{{ $projects->count() ?? 12 }}" data-suffix="+">0+</p>
            <p class="font-mono text-xs" style="color:var(--text-muted);margin-top:0.4rem;">Projets réalisés</p>
        </div>

        <div class="stat-card">
            <p class="stat-number gradient-text-purple"
               data-counter data-target="3" data-suffix="">0</p>
            <p class="font-mono text-xs" style="color:var(--text-muted);margin-top:0.4rem;">Ans d'expérience</p>
        </div>

        <div class="stat-card">
            <p class="stat-number" style="font-size:2.5rem;font-weight:800;color:var(--accent-blue);"
               data-counter data-target="{{ $skills->flatten()->count() ?? 20 }}" data-suffix="">0</p>
            <p class="font-mono text-xs" style="color:var(--text-muted);margin-top:0.4rem;">Technologies</p>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     FEATURED PROJECTS
═══════════════════════════════════════════════════════════ --}}
<section class="site-container" style="padding-bottom:6rem;">

    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:3rem;">
        <div class="reveal">
            <span class="section-label">projets sélectionnés</span>
            <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;letter-spacing:-0.02em;margin-top:0.25rem;">
                Ce que j'ai <span class="gradient-text">construit</span>
            </h2>
        </div>
        <a href="{{ route('projects.index') }}"
           class="reveal font-mono text-sm transition-all hidden md:flex items-center gap-1"
           style="color:var(--text-muted);"
           onmouseover="this.style.color='var(--accent-green)'"
           onmouseout="this.style.color='var(--text-muted)'">
            Voir tout
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </a>
    </div>

    <div class="reveal-stagger" style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.5rem;">
        @foreach($projects as $project)
            <x-project-card :project="$project"/>
        @endforeach
    </div>

    @if($projects->isEmpty())
        <div style="text-align:center;padding:5rem 0;">
            <p class="font-mono text-sm" style="color:var(--text-muted);">// Aucun projet featured pour le moment</p>
        </div>
    @endif

    <style>
        @media(min-width:640px){
            .reveal-stagger { grid-template-columns: repeat(2, 1fr) !important; }
        }
        @media(min-width:1024px){
            .reveal-stagger { grid-template-columns: repeat(3, 1fr) !important; }
        }
    </style>

</section>

{{-- ═══════════════════════════════════════════════════════════
     SKILLS / STACK TECHNIQUE
═══════════════════════════════════════════════════════════ --}}
<section class="site-container" style="padding-bottom:6rem;">

    <div class="reveal" style="margin-bottom:3rem;">
        <span class="section-label">stack technique</span>
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;letter-spacing:-0.02em;margin-top:0.25rem;">
            Mes <span class="gradient-text-purple">compétences</span>
        </h2>
    </div>

    <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.25rem;">
        @foreach($skills as $group => $items)
            <div class="skill-group-card reveal" style="transition-delay:{{ $loop->index * 80 }}ms;">
                <h3 class="font-mono" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--text-muted);margin-bottom:1rem;display:flex;align-items:center;gap:0.5rem;">
                    {{ $group }}
                </h3>
                <div style="display:flex;flex-wrap:wrap;gap:0.625rem;">
                    @foreach($items as $skill)
                        <x-skill-badge :skill="$skill"/>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <style>
        @media(min-width:640px){ section .skill-group-card ~ * { grid-template-columns: repeat(2,1fr) !important; } }
    </style>

</section>

{{-- ═══════════════════════════════════════════════════════════
     CTA CONTACT
═══════════════════════════════════════════════════════════ --}}
<section class="site-container" style="padding-bottom:5rem;">

    <div class="reveal glass-card" style="padding:4rem 3rem;background:linear-gradient(135deg,rgba(0,255,136,0.04),rgba(123,97,255,0.04));border:1px solid rgba(0,255,136,0.1);overflow:hidden;position:relative;">

        {{-- Background glow --}}
        <div style="position:absolute;top:-80px;right:-80px;width:350px;height:350px;background:radial-gradient(circle,rgba(0,255,136,0.08),transparent 70%);border-radius:50%;pointer-events:none;"></div>
        <div style="position:absolute;bottom:-60px;left:-60px;width:250px;height:250px;background:radial-gradient(circle,rgba(123,97,255,0.08),transparent 70%);border-radius:50%;pointer-events:none;"></div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-8" style="position:relative;">

            <div>
                <span class="section-label">collaboration</span>
                <h2 style="font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:800;margin-top:0.25rem;letter-spacing:-0.02em;">
                    Travaillons <span class="gradient-text">ensemble</span>
                </h2>
                <p style="color:var(--text-muted);font-size:0.95rem;max-width:30rem;margin-top:0.75rem;line-height:1.7;">
                    Disponible pour des projets freelance, collaborations ou opportunités à Cotonou et en remote.
                </p>
            </div>

            <div style="display:flex;flex-direction:column;gap:0.875rem;flex-shrink:0;align-items:flex-start;">
                <a href="{{ route('contact') }}" class="btn btn-primary font-mono">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 11.5a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8.91A16 16 0 0015.91 18.7l1.17-1.17a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 19v3z"/>
                    </svg>
                    Démarrer un projet
                </a>
                <a href="mailto:marcel.a.togboe@gmail.com"
                   class="font-mono text-xs transition-all"
                   style="color:var(--text-muted);"
                   onmouseover="this.style.color='var(--accent-green)'"
                   onmouseout="this.style.color='var(--text-muted)'">
                    ou écrire directement ↗
                </a>
            </div>

        </div>
    </div>

</section>

</x-layout>
