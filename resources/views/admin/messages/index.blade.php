<x-layout-admin>
    <x-slot:title>Messages — Admin</x-slot:title>

    <div class="site-container flex flex-col gap-6">
        <div>
            <span class="font-mono text-hk-green text-sm">// admin</span>
            <h1 class="font-mono text-3xl font-bold text-hk-text mt-2">Messages</h1>
        </div>

        @if(session('success'))
            <div class="card-header text-hk-green font-mono text-sm">{{ session('success') }}</div>
        @endif

        @if($messages->isEmpty())
            <div class="card p-6 text-center">
                <p class="font-mono text-sm text-hk-muted">Aucun message reçu pour le moment.</p>
            </div>
        @else
            <div class="admin-message-list mt-4">
                @foreach($messages as $message)
                    <article class="admin-message-card">
                        <div class="admin-message-header">
                            <div>
                                <p class="font-mono text-xs text-hk-muted uppercase tracking-[0.2em] mb-2">{{ $message->email }}</p>
                                <h2 class="admin-message-title">{{ $message->subject }}</h2>
                                <p class="font-mono text-sm text-hk-text mt-2">Par {{ $message->name }}</p>
                            </div>
                            <div class="admin-message-meta">
                                <span>
                                    {{ $message->created_at->diffForHumans() }}
                                </span>
                                @if(is_null($message->read_at))
                                    <span class="badge badge-red">Non lu</span>
                                @else
                                    <span class="badge badge-green">Lu</span>
                                @endif
                            </div>
                        </div>

                        <p class="admin-message-preview">{{ \Illuminate\Support\Str::limit($message->body, 120) }}</p>

                        <div class="admin-message-actions">
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-primary font-mono">Voir</a>

                            <form action="{{ route('admin.messages.toggle-read', $message) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-ghost font-mono">
                                    Marquer {{ is_null($message->read_at) ? 'lu' : 'non lu' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Supprimer ce message ?')"
                                        class="font-mono text-sm border border-red-500 text-red-400 px-4 py-2 rounded hover:bg-red-500/10 transition-all">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-layout-admin>
