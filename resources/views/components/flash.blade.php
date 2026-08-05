@props(['type' => 'success'])

@if(session('success') || session('error'))
    @php
        $msg = session('success') ?? session('error');
        $cls = session('success') ? 'bg-hk-green/10 border-hk-green text-hk-green' : 'bg-red-500/10 border-red-500 text-red-400';
    @endphp
    <div id="flash-message" class="fixed top-6 right-6 z-50 px-4 py-3 border rounded font-mono text-sm {{ $cls }}">
        {{ $msg }}
    </div>

    <script>
        (function(){
            const el = document.getElementById('flash-message');
            if(!el) return;
            setTimeout(()=>{
                el.style.transition = 'opacity 400ms ease, transform 400ms ease';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-8px)';
                setTimeout(()=> el.remove(), 450);
            }, 3500);
        })();
    </script>
@endif
