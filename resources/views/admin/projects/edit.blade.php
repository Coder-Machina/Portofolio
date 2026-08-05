<x-layout-admin>
    <x-slot:title>Modifier un projet — Admin</x-slot:title>

    <div style="display:flex;flex-direction:column;gap:1.5rem;max-width:48rem;margin:0 auto;">
        
        {{-- Header --}}
        <div>
            <a href="{{ route('admin.projects.index') }}" style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.875rem;color:var(--text-muted);text-decoration:none;margin-bottom:1rem;transition:color 0.2s;" onmouseover="this.style.color='var(--text-primary)'" onmouseout="this.style.color='var(--text-muted)'">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg> Retour aux projets
            </a>
            <h1 style="font-size:1.75rem;font-weight:700;color:var(--text-primary);letter-spacing:-0.02em;">Modifier : {{ $project->title }}</h1>
        </div>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:1.5rem;">
            @csrf
            @method('PUT')

            {{-- PANEL: Informations Principales --}}
            <div class="card" style="padding:2rem;">
                <h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem;color:var(--text-primary);display:flex;align-items:center;gap:0.5rem;">
                    <svg width="18" height="18" fill="none" stroke="var(--text-muted)" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
                    Informations principales
                </h2>

                <div style="display:flex;flex-direction:column;gap:1.25rem;">
                    <div>
                        <label class="form-label">Titre du projet</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-input" />
                        @error('title')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Résumé court</label>
                        <input type="text" name="short_desc" value="{{ old('short_desc', $project->short_desc) }}" class="form-input" />
                        @error('short_desc')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Description complète</label>
                        <textarea name="full_desc" rows="6" class="form-input" style="resize:vertical;">{{ old('full_desc', $project->full_desc) }}</textarea>
                        @error('full_desc')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- PANEL: Organisation & Stack --}}
            <div class="card" style="padding:2rem;">
                <h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem;color:var(--text-primary);display:flex;align-items:center;gap:0.5rem;">
                    <svg width="18" height="18" fill="none" stroke="var(--text-muted)" stroke-width="2" viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                    Organisation & Stack technique
                </h2>

                <div style="display:flex;flex-direction:column;gap:1.25rem;">
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;">
                        <div>
                            <label class="form-label">Catégorie</label>
                            <select name="category_id" class="form-input">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="order" value="{{ old('order', $project->order) }}" class="form-input" />
                            @error('order')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Technologies (séparées par des virgules)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', implode(', ', $project->tech_stack ?? [])) }}" class="form-input" />
                        @error('tech_stack')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- PANEL: Médias & Liens --}}
            <div class="card" style="padding:2rem;">
                <h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem;color:var(--text-primary);display:flex;align-items:center;gap:0.5rem;">
                    <svg width="18" height="18" fill="none" stroke="var(--text-muted)" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Médias & Liens
                </h2>

                <div style="display:flex;flex-direction:column;gap:1.25rem;">
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;">
                        <div>
                            <label class="form-label">Lien GitHub</label>
                            <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="form-input" />
                            @error('github_url')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Lien direct (Live Demo)</label>
                            <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" class="form-input" />
                            @error('live_url')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Image miniature (Thumbnail)</label>
                        
                        @if($project->thumbnail)
                            <div style="margin-bottom:1rem;display:flex;gap:1rem;align-items:center;padding:1rem;background:var(--bg-base);border:1px solid var(--border);border-radius:var(--radius-sm);">
                                <div style="width:80px;height:50px;border-radius:4px;overflow:hidden;flex-shrink:0;">
                                    <img src="{{ asset('storage/'.$project->thumbnail) }}" style="width:100%;height:100%;object-fit:cover;" />
                                </div>
                                <span style="font-size:0.8rem;color:var(--text-muted);">Image actuelle. Uploadez une nouvelle pour remplacer.</span>
                            </div>
                        @endif

                        <div style="padding:2rem;border:2px dashed var(--border);border-radius:var(--radius-md);text-align:center;background:rgba(255,255,255,0.01);">
                            <input type="file" name="thumbnail" class="form-input" style="background:transparent;border:none;box-shadow:none;" />
                        </div>
                        @error('thumbnail')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.375rem;">{{ $message }}</p>@enderror
                    </div>

                    <div style="margin-top:1rem;">
                        <label style="display:inline-flex;align-items:center;gap:0.75rem;cursor:pointer;">
                            <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }} style="width:1.25rem;height:1.25rem;border-radius:0.25rem;background:var(--bg-surface);border:1px solid var(--border);" />
                            <span style="font-weight:500;color:var(--text-primary);">Mettre en avant sur la page d'accueil</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display:flex;align-items:center;justify-content:flex-end;gap:1rem;margin-top:1rem;">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-ghost" style="padding:0.75rem 1.5rem;">Annuler</a>
                <button type="submit" class="btn btn-primary" style="padding:0.75rem 2rem;">Mettre à jour le projet</button>
            </div>

        </form>
    </div>
</x-layout-admin>
