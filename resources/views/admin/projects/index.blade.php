<x-layout-admin>
    <x-slot:title>Projets — Admin</x-slot:title>

    <div style="display:flex;flex-direction:column;gap:1.5rem;max-width:72rem;margin:0 auto;">
        
        {{-- Header --}}
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
            <div>
                <h1 style="font-size:1.75rem;font-weight:700;color:var(--text-primary);letter-spacing:-0.02em;">Projets</h1>
                <p style="color:var(--text-muted);font-size:0.875rem;margin-top:0.25rem;">Gérez les projets affichés sur votre portfolio.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary" style="padding:0.6rem 1.25rem;font-size:0.875rem;">
                + Nouveau projet
            </a>
        </div>

        @if(session('success'))
            <div style="background:rgba(16, 185, 129, 0.1);border:1px solid rgba(16, 185, 129, 0.2);color:#10B981;padding:1rem 1.25rem;border-radius:var(--radius-sm);font-size:0.875rem;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Card --}}
        <div class="card">
            <div style="overflow-x:auto;">
                <table style="width:100%;text-align:left;border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:1px solid var(--border);background:rgba(255,255,255,0.02);">
                            <th style="padding:1rem 1.5rem;font-size:0.75rem;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.05em;">Projet</th>
                            <th style="padding:1rem 1.5rem;font-size:0.75rem;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.05em;">Catégorie</th>
                            <th style="padding:1rem 1.5rem;font-size:0.75rem;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.05em;">Statut</th>
                            <th style="padding:1rem 1.5rem;font-size:0.75rem;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.05em;">Ordre</th>
                            <th style="padding:1rem 1.5rem;text-align:right;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr style="border-bottom:1px solid var(--border);transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.02)'" onmouseout="this.style.background='transparent'">
                                <td style="padding:1rem 1.5rem;">
                                    <div style="display:flex;align-items:center;gap:1rem;">
                                        @if($project->thumbnail)
                                            <div style="width:48px;height:48px;border-radius:var(--radius-sm);overflow:hidden;border:1px solid var(--border);flex-shrink:0;">
                                                <img src="{{ asset('storage/'.$project->thumbnail) }}" alt="" style="width:100%;height:100%;object-fit:cover;" />
                                            </div>
                                        @else
                                            <div style="width:48px;height:48px;border-radius:var(--radius-sm);background:var(--bg-surface);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                                <span style="font-size:0.6rem;color:var(--text-muted);">Vide</span>
                                            </div>
                                        @endif
                                        <span style="font-weight:500;color:var(--text-primary);">{{ $project->title }}</span>
                                    </div>
                                </td>
                                <td style="padding:1rem 1.5rem;color:var(--text-secondary);font-size:0.9rem;">
                                    {{ $project->category->name ?? '—' }}
                                </td>
                                <td style="padding:1rem 1.5rem;">
                                    @if($project->featured)
                                        <span style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.25rem 0.625rem;border-radius:99px;background:rgba(16, 185, 129, 0.1);border:1px solid rgba(16, 185, 129, 0.2);color:#10B981;font-size:0.75rem;font-weight:500;">
                                            <span style="width:4px;height:4px;border-radius:50%;background:#10B981;"></span> Mis en avant
                                        </span>
                                    @else
                                        <span style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.25rem 0.625rem;border-radius:99px;background:var(--bg-surface);border:1px solid var(--border);color:var(--text-muted);font-size:0.75rem;font-weight:500;">
                                            Standard
                                        </span>
                                    @endif
                                </td>
                                <td style="padding:1rem 1.5rem;color:var(--text-muted);font-size:0.9rem;">
                                    {{ $project->order }}
                                </td>
                                <td style="padding:1rem 1.5rem;text-align:right;">
                                    <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.5rem;">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-ghost" style="padding:0.4rem 0.75rem;font-size:0.75rem;">
                                            Modifier
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="margin:0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Supprimer ce projet ?')" class="btn" style="padding:0.4rem 0.75rem;font-size:0.75rem;background:transparent;border:1px solid rgba(239, 68, 68, 0.3);color:#ef4444;" onmouseover="this.style.background='rgba(239, 68, 68, 0.1)';this.style.borderColor='#ef4444'" onmouseout="this.style.background='transparent';this.style.borderColor='rgba(239, 68, 68, 0.3)'">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding:3rem 1.5rem;text-align:center;color:var(--text-muted);">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin:0 auto 1rem;opacity:0.5;">
                                        <path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/>
                                    </svg>
                                    Aucun projet n'a été trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layout-admin>
