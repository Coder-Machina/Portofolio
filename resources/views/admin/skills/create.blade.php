<x-layout-admin>
    <x-slot:title>Créer une compétence — Admin</x-slot:title>

    <div class="site-container max-w-4xl flex flex-col gap-8">
        <div>
            <span class="font-mono text-hk-green text-sm">// admin</span>
            <h1 class="font-mono text-3xl font-bold text-hk-text mt-2">Créer une compétence</h1>
        </div>

        <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6">
                <div>
                          <label class="form-label">Nom</label>
                          <input type="text" name="name" value="{{ old('name') }}" class="form-input" />
                    @error('name')<p class="text-red-400 text-xs mt-2 font-mono">{{ $message }}</p>@enderror
                </div>

                <div>
                          <label class="form-label">Groupe</label>
                          <input type="text" name="group" value="{{ old('group') }}" list="skill-groups" placeholder="Backend, Frontend, AI/MLOps, DevOps" class="form-input" />
                    <datalist id="skill-groups">
                        @foreach($groups as $group)
                            <option value="{{ $group }}"></option>
                        @endforeach
                    </datalist>
                    @error('group')<p class="text-red-400 text-xs mt-2 font-mono">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Niveau</label>
                    <select name="level" class="form-input">
                        @php
                            $levels = [1 => '1 - Débutant', 2 => '2 - Intermédiaire', 3 => '3 - Compétent', 4 => '4 - Avancé', 5 => '5 - Expert'];
                        @endphp
                        @foreach($levels as $val => $label)
                            <option value="{{ $val }}" {{ old('level') == $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('level')<p class="text-red-400 text-xs mt-2 font-mono">{{ $message }}</p>@enderror
                </div>

                <div>
                          <label class="form-label">Ordre</label>
                          <input type="number" name="order" value="{{ old('order', 0) }}" class="form-input" />
                    @error('order')<p class="text-red-400 text-xs mt-2 font-mono">{{ $message }}</p>@enderror
                </div>

                <div>
                          <label class="form-label">Icone (optionnel)</label>
                          <input type="text" name="icon" value="{{ old('icon') }}" class="form-input" />
                    @error('icon')<p class="text-red-400 text-xs mt-2 font-mono">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.skills.index') }}" class="btn-ghost font-mono text-sm">Annuler</a>
                <button type="submit" class="btn-primary font-mono">Créer la compétence</button>
            </div>
        </form>
    </div>
</x-layout-admin>
