<x-layout-admin>
    <x-slot:title>Dashboard — Admin</x-slot:title>

    {{-- Header --}}
    <div class="mb-10">
        <span class="font-mono text-hk-green text-sm">// admin</span>
        <h1 class="font-mono text-3xl font-bold text-hk-text mt-1">Dashboard</h1>
    </div>

    {{-- Stats --}}
    <div class="site-container grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="card p-6">
            <p class="font-mono text-xs text-hk-muted mb-2">// projets total</p>
            <p class="font-mono text-4xl font-bold text-hk-green">{{ $stats['projects'] }}</p>
        </div>
        <div class="card p-6">
            <p class="font-mono text-xs text-hk-muted mb-2">// featured</p>
            <p class="font-mono text-4xl font-bold text-hk-purple">{{ $stats['featured'] }}</p>
        </div>
        <div class="card p-6">
            <p class="font-mono text-xs text-hk-muted mb-2">// messages total</p>
            <p class="font-mono text-4xl font-bold text-hk-text">{{ $stats['messages'] }}</p>
        </div>
        <div class="card p-6">
            <p class="font-mono text-xs text-hk-muted mb-2">// non lus</p>
            <p class="font-mono text-4xl font-bold text-red-400">{{ $stats['unread'] }}</p>
        </div>
    </div>

    {{-- Derniers messages --}}
    <div class="bg-hk-surface border border-hk-border rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-hk-border">
            <span class="font-mono text-sm text-hk-text font-bold">// derniers messages</span>
        </div>
        @forelse($latestMessages as $message)
            <div class="px-6 py-4 border-b border-hk-border flex items-center justify-between
                {{ is_null($message->read_at) ? 'bg-hk-border/20' : '' }}">
                <div>
                    <p class="font-mono text-sm text-hk-text {{ is_null($message->read_at) ? 'font-bold' : '' }}">
                        {{ $message->name }}
                        @if(is_null($message->read_at))
                            <span class="text-hk-green text-xs ml-2">● non lu</span>
                        @endif
                    </p>
                    <p class="font-mono text-xs text-hk-muted mt-1">{{ $message->subject }}</p>
                </div>
                <span class="font-mono text-xs text-hk-muted">
                    {{ $message->created_at->diffForHumans() }}
                </span>
            </div>
        @empty
            <div class="px-6 py-10 text-center">
                <p class="font-mono text-xs text-hk-muted">// aucun message</p>
            </div>
        @endforelse
    </div>

</x-layout-admin>
