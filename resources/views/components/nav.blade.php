<nav class="nav-glass sticky top-3 z-50 mx-4 md:mx-6 rounded-2xl mt-4" style="transition:all 0.3s ease;">
    <div class="site-container flex items-center justify-between py-3.5">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 group" style="text-decoration:none;">
            <div style="width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,var(--accent-green),var(--accent-purple));display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-weight:800;font-size:0.9rem;color:#050A14;flex-shrink:0;">M</div>
            <div>
                <span style="font-weight:700;font-size:0.95rem;color:var(--text-primary);letter-spacing:-0.02em;">Marcel</span>
                <span style="font-weight:700;font-size:0.95rem;color:var(--accent-green);letter-spacing:-0.02em;">TOGBOE</span>
            </div>
        </a>

        {{-- Desktop links --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Accueil
            </a>
            <a href="{{ route('projects.index') }}"
               class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                Projets
            </a>
            <a href="{{ route('contact') }}"
               class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                Contact
            </a>
        </div>

        {{-- CTA --}}
        <div class="hidden md:flex items-center gap-4">
            <span class="flex items-center gap-1.5 font-mono text-xs" style="color:var(--text-muted);">
                <span class="available-dot"></span>
                Disponible
            </span>
            <a href="{{ route('contact') }}" class="btn btn-primary font-mono text-xs" style="padding:0.5rem 1.1rem;">
                Me contacter →
            </a>
        </div>

        {{-- Burger mobile --}}
        <button x-data @click="$dispatch('toggle-menu')"
                class="md:hidden p-2 rounded-lg"
                style="color:var(--text-muted);background:rgba(255,255,255,0.05);border:1px solid var(--border);"
                aria-label="Ouvrir le menu">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </div>

    {{-- Menu mobile --}}
    <div x-data="{ open: false }"
         @toggle-menu.window="open = !open"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden px-6 pb-5 pt-3 flex flex-col gap-3"
         style="border-top:1px solid var(--border);">
        <a href="{{ route('home') }}" class="font-mono text-sm py-1 transition-colors"
           style="color:var(--text-muted);"
           onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-muted)'">
            Accueil
        </a>
        <a href="{{ route('projects.index') }}" class="font-mono text-sm py-1 transition-colors"
           style="color:var(--text-muted);"
           onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-muted)'">
            Projets
        </a>
        <a href="{{ route('contact') }}" class="font-mono text-sm py-1 transition-colors"
           style="color:var(--text-muted);"
           onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-muted)'">
            Contact
        </a>
        <a href="{{ route('contact') }}" class="btn btn-primary font-mono text-xs self-start mt-2">
            Me contacter →
        </a>
    </div>
</nav>
