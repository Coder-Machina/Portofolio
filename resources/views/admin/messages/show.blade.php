<x-layout-admin>
    <x-slot:title>Message — Admin</x-slot:title>

    <div class="site-container max-w-4xl flex flex-col gap-8">
        <div>
            <span class="font-mono text-hk-green text-sm">// admin</span>
            <h1 class="font-mono text-3xl font-bold text-hk-text mt-2">Détails du message</h1>
        </div>

        <div class="card p-8 space-y-6">
            @if(session('success'))
                <div class="card-header text-hk-green font-mono text-sm">{{ session('success') }}</div>
            @endif
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <p class="font-mono text-xs text-hk-muted">Nom</p>
                    <p class="font-mono text-hk-text">{{ $message->name }}</p>
                </div>
                <div>
                    <p class="font-mono text-xs text-hk-muted">Email</p>
                    <p class="font-mono text-hk-text">{{ $message->email }}</p>
                </div>
                <div>
                    <p class="font-mono text-xs text-hk-muted">Sujet</p>
                    <p class="font-mono text-hk-text">{{ $message->subject }}</p>
                </div>
                <div>
                    <p class="font-mono text-xs text-hk-muted">Reçu</p>
                    <p class="font-mono text-hk-text">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="font-mono text-xs text-hk-muted">Statut</p>
                    <p class="font-mono text-hk-text">{{ is_null($message->read_at) ? 'Non lu' : 'Lu' }}</p>
                </div>
            </div>

            <div>
                <p class="font-mono text-xs text-hk-muted">Message</p>
                <div class="mt-3 card p-6">
                    {{ $message->body }}
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.messages.index') }}" class="btn-ghost font-mono text-sm">Retour aux messages</a>

                <form action="{{ route('admin.messages.toggle-read', $message) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-ghost font-mono">Marquer {{ is_null($message->read_at) ? 'lu' : 'non lu' }}</button>
                </form>

                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Supprimer ce message ?')" class="font-mono text-sm border border-red-500 text-red-400 px-5 py-3 rounded hover:bg-red-500/10 transition-all">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
