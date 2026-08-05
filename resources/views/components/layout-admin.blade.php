<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? 'Admin — Marcel TOGBOE' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Admin-specific overrides */
        body { margin: 0; }
        .admin-wrap { display: flex; height: 100vh; overflow: hidden; }
        .admin-sidebar-fixed {
            width: 260px;
            min-width: 260px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background: rgba(8, 8, 20, 0.99);
            border-right: 1px solid rgba(255,255,255,0.08);
            flex-shrink: 0;
        }
        .admin-main {
            flex: 1;
            overflow-y: auto;
            background: var(--bg-base);
            display: flex;
            flex-direction: column;
        }
        .admin-topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(12,12,26,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            padding: 0.875rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .admin-content {
            padding: 2rem;
            flex: 1;
        }
        .sidebar-section-label {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: var(--text-faint);
            padding: 0 0.75rem;
            margin: 1rem 0 0.375rem;
        }
    </style>
</head>
<body style="background:var(--bg-base);color:var(--text-primary);font-family:var(--font-sans);">

<div class="admin-wrap">

    {{-- ══════════════════════════════════════
         SIDEBAR FIXE
    ══════════════════════════════════════ --}}
    <aside class="admin-sidebar-fixed">

        {{-- Logo --}}
        <div style="padding:1.5rem 1.25rem;border-bottom:1px solid rgba(255,255,255,0.07);">
            <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:0.75rem;text-decoration:none;">
                <div style="width:36px;height:36px;border-radius:9px;background:linear-gradient(135deg,var(--accent-green),var(--accent-purple));display:flex;align-items:center;justify-content:center;font-family:var(--font-mono);font-weight:800;font-size:0.9rem;color:#050A14;flex-shrink:0;">M</div>
                <div>
                    <p style="font-weight:700;font-size:0.92rem;color:var(--text-primary);line-height:1.2;margin:0;">Marcel TOGBOE</p>
                    <p style="font-family:var(--font-mono);font-size:0.65rem;color:var(--accent-green);margin:0;">Admin Panel</p>
                </div>
            </a>
        </div>

        {{-- Navigation --}}
        <nav style="flex:1;padding:0.75rem;overflow-y:auto;">

            <p class="sidebar-section-label">Principal</p>

            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>
                </svg>
                Dashboard
            </a>

            <p class="sidebar-section-label" style="margin-top:1.25rem;">Contenu</p>

            <a href="{{ route('admin.projects.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/>
                </svg>
                Projets
            </a>

            <a href="{{ route('admin.skills.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                Compétences
            </a>

            <a href="{{ route('admin.messages.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                Messages
            </a>

        </nav>

        {{-- Footer sidebar --}}
        <div style="padding:0.875rem;border-top:1px solid rgba(255,255,255,0.07);display:flex;flex-direction:column;gap:0.375rem;">
            <a href="{{ route('home') }}" class="admin-nav-link" style="font-size:0.78rem;">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Voir le portfolio
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="admin-nav-link"
                        style="width:100%;background:transparent;border:1px solid transparent;cursor:pointer;text-align:left;"
                        onmouseover="this.style.color='#f87171';this.style.borderColor='rgba(248,113,113,0.15)';this.style.background='rgba(248,113,113,0.06)'"
                        onmouseout="this.style.color='var(--text-muted)';this.style.borderColor='transparent';this.style.background='transparent'">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>

    </aside>

    {{-- ══════════════════════════════════════
         CONTENU PRINCIPAL
    ══════════════════════════════════════ --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <div class="admin-topbar">
            <div style="display:flex;align-items:center;gap:0.5rem;">
                <div class="top-accent" style="height:2px;width:3rem;border-radius:99px;display:inline-block;margin:0;"></div>
                <span style="font-family:var(--font-mono);font-size:0.75rem;color:var(--text-muted);">
                    {{ $title ?? 'Admin' }}
                </span>
            </div>
            <div style="display:flex;align-items:center;gap:0.5rem;">
                <span class="available-dot"></span>
                <span style="font-family:var(--font-mono);font-size:0.72rem;color:var(--text-muted);">Connecté en tant qu'admin</span>
            </div>
        </div>

        {{-- Flash + Content --}}
        <div class="admin-content">
            <x-flash/>
            {{ $slot }}
        </div>

    </div>

</div>

</body>
</html>
