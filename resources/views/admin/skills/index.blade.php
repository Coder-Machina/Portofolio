<x-layout-admin>
    <x-slot:title>Skills — Admin</x-slot:title>

    <div class="site-container flex flex-col gap-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <span class="font-mono text-hk-green text-sm">// admin</span>
                <h1 class="font-mono text-3xl font-bold text-hk-text mt-2">Compétences</h1>
            </div>
            <a href="{{ route('admin.skills.create') }}" class="btn-primary font-mono text-sm">+ Nouvelle compétence</a>
        </div>

        @if(session('success'))
            <div class="bg-hk-surface border border-hk-green text-hk-green px-5 py-4 rounded font-mono text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="card overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-hk-border text-hk-muted uppercase text-xs tracking-widest">
                    <tr>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Icon</th>
                        <th class="px-4 py-3">Groupe</th>
                        <th class="px-4 py-3">Niveau</th>
                        <th class="px-4 py-3">Ordre</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr class="border-t border-hk-border hover:bg-hk-border/40">
                            <td class="px-4 py-4 font-mono text-hk-text">{{ $skill->name }}</td>
                            <td class="px-4 py-4 font-mono text-hk-text">
                                @if($skill->icon)
                                    <span class="inline-flex items-center gap-2 px-2 py-1 rounded bg-hk-border text-hk-muted text-xs">{{ $skill->icon }}</span>
                                @else
                                    <span class="font-mono text-xs text-hk-muted">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 font-mono text-hk-muted">
                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-hk-border text-hk-muted text-xs">{{ $skill->group }}</span>
                            </td>
                            <td class="px-4 py-4 font-mono text-hk-text">
                                {{ $skill->level }}/5 —
                                @php
                                    $levelLabels = [1 => 'Débutant', 2 => 'Intermédiaire', 3 => 'Compétent', 4 => 'Avancé', 5 => 'Expert'];
                                @endphp
                                <span class="font-mono text-xs text-hk-muted">{{ $levelLabels[$skill->level] ?? '' }}</span>
                            </td>
                            <td class="px-4 py-4 font-mono text-hk-text">{{ $skill->order }}</td>
                            <td class="px-4 py-4 flex flex-wrap gap-2">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="font-mono text-xs px-3 py-2 rounded border border-hk-border text-hk-text hover:border-hk-green hover:text-hk-green transition-all">Modifier</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Supprimer cette compétence ?')" class="font-mono text-xs px-3 py-2 rounded border border-red-500 text-red-400 hover:bg-red-500/10 transition-all">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-hk-muted font-mono">
                                Aucune compétence n'a encore été ajoutée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout-admin>
