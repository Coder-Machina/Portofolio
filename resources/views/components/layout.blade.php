<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="{{ $description ?? 'Portfolio de Marcel TOGBOE — Software Engineer spécialisé en AI/MLOps & Laravel. Basé à Cotonou, Bénin.' }}"/>
    <meta name="theme-color" content="#050508"/>
    <title>{{ $title ?? 'Marcel TOGBOE — Software Engineer' }}</title>

    <!-- Fonts: Space Grotesk + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">

    <!-- Particles canvas -->
    <canvas id="particles-canvas" style="position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:1;opacity:0.4;"></canvas>

    <!-- Top accent line -->
    <div class="top-accent fixed top-0 left-0 right-0 z-[100]"></div>

    <!-- Navigation -->
    <x-nav/>

    <!-- Flash messages -->
    <x-flash/>

    <!-- Main content -->
    <main style="position:relative;z-index:2;">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer/>

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Particles script -->
    <script>
    (function() {
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        let W = canvas.width = window.innerWidth;
        let H = canvas.height = window.innerHeight;
        const COLORS = ['#00FF88', '#7B61FF', '#38BDF8', '#F472B6'];
        const particles = Array.from({ length: 55 }, () => ({
            x: Math.random() * W,
            y: Math.random() * H,
            r: Math.random() * 1.4 + 0.3,
            vx: (Math.random() - 0.5) * 0.25,
            vy: (Math.random() - 0.5) * 0.25,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            alpha: Math.random() * 0.5 + 0.1,
        }));

        function draw() {
            ctx.clearRect(0, 0, W, H);
            particles.forEach(p => {
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
                if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
                ctx.save();
                ctx.globalAlpha = p.alpha;
                ctx.fillStyle = p.color;
                ctx.shadowBlur = 8;
                ctx.shadowColor = p.color;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fill();
                ctx.restore();
            });
            // Draw subtle connecting lines
            particles.forEach((p, i) => {
                for (let j = i + 1; j < particles.length; j++) {
                    const q = particles[j];
                    const dist = Math.hypot(p.x - q.x, p.y - q.y);
                    if (dist < 120) {
                        ctx.save();
                        ctx.globalAlpha = (1 - dist / 120) * 0.05;
                        ctx.strokeStyle = p.color;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(q.x, q.y);
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            });
            requestAnimationFrame(draw);
        }
        draw();
        window.addEventListener('resize', () => {
            W = canvas.width = window.innerWidth;
            H = canvas.height = window.innerHeight;
        });
    })();
    </script>

</body>
</html>
