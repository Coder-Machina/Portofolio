<footer style="position:relative;z-index:2;margin-top:5rem;">

    {{-- Top gradient bar --}}
    <div class="top-accent"></div>

    <div style="background:rgba(12,12,26,0.97);border-top:1px solid rgba(255,255,255,0.08);">

        {{-- Main footer content --}}
        <div class="site-container" style="padding-top:3.5rem;padding-bottom:2rem;">
            <div style="display:grid;grid-template-columns:1fr;gap:3rem;">

                {{-- Col 1: Brand --}}
                <div>
                    <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:0.75rem;text-decoration:none;margin-bottom:1rem;">
                        <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--accent-green),var(--accent-purple));display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-weight:800;font-size:1rem;color:#050A14;">M</div>
                        <div>
                            <span style="font-weight:700;font-size:1.05rem;color:var(--text-primary);">Marcel</span>
                            <span style="font-weight:700;font-size:1.05rem;color:var(--accent-green);"> TOGBOE</span>
                        </div>
                    </a>
                    <p style="color:var(--text-secondary);font-size:0.9rem;line-height:1.7;max-width:22rem;">
                        Software Engineer spécialisé en <strong style="color:var(--accent-blue);">AI / MLOps</strong> et <strong style="color:var(--accent-green);">Laravel</strong>. Disponible pour des projets freelance.
                    </p>
                    <div style="display:flex;align-items:center;gap:0.5rem;margin-top:1rem;">
                        <span class="available-dot"></span>
                        <span style="font-family:var(--font-mono);font-size:0.78rem;color:var(--accent-green);">Disponible pour un projet</span>
                    </div>
                </div>

                {{-- Col 2: Navigation --}}
                <div>
                    <h4 style="font-family:var(--font-mono);font-size:0.7rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--text-muted);margin-bottom:1rem;">Navigation</h4>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.625rem;">
                        <li>
                            <a href="{{ route('home') }}" style="color:var(--text-secondary);font-size:0.9rem;text-decoration:none;transition:color 0.2s;"
                               onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-secondary)'">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects.index') }}" style="color:var(--text-secondary);font-size:0.9rem;text-decoration:none;transition:color 0.2s;"
                               onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-secondary)'">
                                Projets
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" style="color:var(--text-secondary);font-size:0.9rem;text-decoration:none;transition:color 0.2s;"
                               onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-secondary)'">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Col 3: Social --}}
                <div>
                    <h4 style="font-family:var(--font-mono);font-size:0.7rem;text-transform:uppercase;letter-spacing:0.15em;color:var(--text-muted);margin-bottom:1rem;">Retrouvez-moi</h4>
                    <div style="display:flex;flex-direction:column;gap:0.75rem;">

                        <a href="https://github.com/Coder-machina" target="_blank" rel="noopener"
                           style="display:inline-flex;align-items:center;gap:0.75rem;color:var(--text-secondary);text-decoration:none;font-size:0.9rem;transition:color 0.2s;"
                           onmouseover="this.style.color='var(--accent-green)'" onmouseout="this.style.color='var(--text-secondary)'">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                            GitHub
                        </a>

                        <a href="mailto:marcel.a.togboe@gmail.com"
                           style="display:inline-flex;align-items:center;gap:0.75rem;color:var(--text-secondary);text-decoration:none;font-size:0.9rem;transition:color 0.2s;"
                           onmouseover="this.style.color='var(--accent-purple)'" onmouseout="this.style.color='var(--text-secondary)'">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            marcel.a.togboe@gmail.com
                        </a>

                    </div>
                </div>

            </div>
        </div>

        {{-- Bottom bar --}}
        <div style="border-top:1px solid rgba(255,255,255,0.07);">
            <div class="site-container" style="padding-top:1.25rem;padding-bottom:1.25rem;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:1rem;">
                <p style="font-family:var(--font-mono);font-size:0.78rem;color:var(--text-muted);">
                    © {{ date('Y') }} Marcel TOGBOE — Cotonou, Bénin 🇧🇯
                </p>
                <p style="font-family:var(--font-mono);font-size:0.78rem;color:var(--text-muted);">
                    Laravel · Tailwind · Alpine.js
                </p>
            </div>
        </div>

    </div>

    <style>
        @media (min-width: 768px) {
            footer .site-container > div { grid-template-columns: 2fr 1fr 1fr !important; }
        }
    </style>
</footer>
