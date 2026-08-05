<x-layout>
<x-slot:title>Contact — Marcel TOGBOE</x-slot:title>
<x-slot:description>Contactez Marcel TOGBOE pour vos projets freelance, collaborations ou opportunités professionnelles.</x-slot:description>

<section class="site-container" style="padding-top:5rem;padding-bottom:7rem;">

    {{-- Header --}}
    <div class="reveal" style="margin-bottom:4rem;">
        <span class="section-label">contact</span>
        <h1 style="font-size:clamp(2.2rem,5vw,3.8rem);font-weight:800;letter-spacing:-0.03em;margin-top:0.5rem;">
            Travaillons <span class="gradient-text">ensemble</span>
        </h1>
        <p style="color:var(--text-muted);font-size:1.05rem;max-width:36rem;margin-top:0.875rem;line-height:1.7;">
            Une idée de projet ? Une collaboration ? Envoie-moi un message et je te répondrai rapidement.
        </p>
    </div>

    <div style="display:grid;grid-template-columns:1fr;gap:3rem;">

        {{-- Contact Info (Left) --}}
        <div class="reveal" style="display:flex;flex-direction:column;gap:1.5rem;">

            <div class="glass-card" style="padding:1.75rem;">
                <h3 class="font-mono" style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--accent-green);margin-bottom:1.25rem;">
                    // Informations
                </h3>

                <div style="display:flex;flex-direction:column;gap:1.25rem;">

                    <div style="display:flex;align-items:flex-start;gap:0.875rem;">
                        <div style="width:38px;height:38px;border-radius:var(--radius-sm);background:rgba(0,255,136,0.08);border:1px solid rgba(0,255,136,0.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="var(--accent-green)" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-mono" style="font-size:0.75rem;color:var(--text-muted);">Localisation</p>
                            <p style="color:var(--text-primary);font-size:0.9rem;margin-top:0.2rem;">Cotonou, Bénin 🇧🇯</p>
                        </div>
                    </div>

                    <div style="display:flex;align-items:flex-start;gap:0.875rem;">
                        <div style="width:38px;height:38px;border-radius:var(--radius-sm);background:rgba(56,189,248,0.08);border:1px solid rgba(56,189,248,0.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="var(--accent-blue)" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-mono" style="font-size:0.75rem;color:var(--text-muted);">Email</p>
                            <a href="mailto:marcel.a.togboe@gmail.com"
                               style="color:var(--accent-blue);font-size:0.9rem;margin-top:0.2rem;text-decoration:none;transition:opacity 0.2s;display:block;"
                               onmouseover="this.style.opacity='0.75'"
                               onmouseout="this.style.opacity='1'">
                                marcel.a.togboe@gmail.com
                            </a>
                        </div>
                    </div>

                    <div style="display:flex;align-items:flex-start;gap:0.875rem;">
                        <div style="width:38px;height:38px;border-radius:var(--radius-sm);background:rgba(123,97,255,0.08);border:1px solid rgba(123,97,255,0.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span style="font-size:0.875rem;">⚡</span>
                        </div>
                        <div>
                            <p class="font-mono" style="font-size:0.75rem;color:var(--text-muted);">Disponibilité</p>
                            <div style="display:flex;align-items:center;gap:0.5rem;margin-top:0.2rem;">
                                <span class="available-dot"></span>
                                <span style="color:var(--accent-green);font-size:0.9rem;">Disponible maintenant</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Social links --}}
                <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--border);display:flex;gap:0.75rem;">
                    <a href="https://github.com/Marcel-maker-max" target="_blank" class="btn btn-ghost" style="flex:1;justify-content:center;font-size:0.75rem;font-family:var(--font-mono);padding:0.5rem;">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                        </svg>
                        GitHub
                    </a>
                </div>

            </div>

        </div>

        {{-- Form (Right) --}}
        <div class="reveal reveal-delay-2">

            {{-- Success --}}
            @if(session('success'))
                <div class="glass-card" style="padding:1.25rem 1.5rem;margin-bottom:1.5rem;border-color:rgba(0,255,136,0.3);background:rgba(0,255,136,0.05);">
                    <p class="font-mono text-sm" style="color:var(--accent-green);display:flex;align-items:center;gap:0.5rem;">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="glass-card" style="padding:2rem;display:flex;flex-direction:column;gap:1.25rem;">
                @csrf

                <div style="display:grid;grid-template-columns:1fr;gap:1.25rem;">

                    {{-- Nom --}}
                    <div>
                        <label class="form-label">// nom</label>
                        <input type="text" name="name" id="contact-name"
                               value="{{ old('name') }}"
                               placeholder="Votre nom complet"
                               class="form-input {{ $errors->has('name') ? 'border-red-500' : '' }}"/>
                        @error('name')
                            <span class="font-mono text-xs" style="color:#f87171;margin-top:0.25rem;display:block;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="form-label">// email</label>
                        <input type="email" name="email" id="contact-email"
                               value="{{ old('email') }}"
                               placeholder="votre@email.com"
                               class="form-input {{ $errors->has('email') ? 'border-red-500' : '' }}"/>
                        @error('email')
                            <span class="font-mono text-xs" style="color:#f87171;margin-top:0.25rem;display:block;">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Sujet --}}
                <div>
                    <label class="form-label">// sujet</label>
                    <input type="text" name="subject" id="contact-subject"
                           value="{{ old('subject') }}"
                           placeholder="Ex: Collaboration sur un projet AI"
                           class="form-input {{ $errors->has('subject') ? 'border-red-500' : '' }}"/>
                    @error('subject')
                        <span class="font-mono text-xs" style="color:#f87171;margin-top:0.25rem;display:block;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Message --}}
                <div>
                    <label class="form-label">// message</label>
                    <textarea name="body" id="contact-body"
                              rows="6"
                              placeholder="Décris ton projet ou ta demande..."
                              class="form-input {{ $errors->has('body') ? 'border-red-500' : '' }}"
                              style="resize:none;">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="font-mono text-xs" style="color:#f87171;margin-top:0.25rem;display:block;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" id="contact-submit" class="btn btn-primary font-mono" style="align-self:flex-start;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                    Envoyer le message
                </button>

            </form>

        </div>

    </div>

    <style>
        @media(min-width:768px) {
            section > div:last-of-type {
                grid-template-columns: 1fr 2fr !important;
            }
        }
    </style>

</section>

</x-layout>
