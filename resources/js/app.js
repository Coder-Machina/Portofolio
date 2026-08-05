/* Alpine.js is loaded via CDN in the layout */

/* ============================================================
   APP JS — Marcel TOGBOE Portfolio
   Scroll Reveal · Typing Effect · Stats Counter
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

    /* ---------- Scroll Reveal (IntersectionObserver) ---------- */
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-left').forEach(el => {
        revealObserver.observe(el);
    });

    /* ---------- Staggered children reveal ---------- */
    document.querySelectorAll('.reveal-stagger').forEach(parent => {
        const children = parent.children;
        Array.from(children).forEach((child, i) => {
            child.style.transitionDelay = `${i * 80}ms`;
            child.classList.add('reveal');
            revealObserver.observe(child);
        });
    });

    /* ---------- Typing Animation ---------- */
    const typingEl = document.getElementById('typing-text');
    if (typingEl) {
        const lines = JSON.parse(typingEl.dataset.lines || '[]');
        let lineIdx = 0, charIdx = 0, deleting = false;
        const TYPE_SPEED = 70, DELETE_SPEED = 35, PAUSE = 2200;

        function type() {
            const current = lines[lineIdx];
            if (!deleting) {
                typingEl.textContent = current.slice(0, ++charIdx);
                if (charIdx === current.length) {
                    deleting = true;
                    setTimeout(type, PAUSE);
                    return;
                }
            } else {
                typingEl.textContent = current.slice(0, --charIdx);
                if (charIdx === 0) {
                    deleting = false;
                    lineIdx = (lineIdx + 1) % lines.length;
                }
            }
            setTimeout(type, deleting ? DELETE_SPEED : TYPE_SPEED);
        }
        if (lines.length) setTimeout(type, 600);
    }

    /* ---------- Stats Counter Animation ---------- */
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseInt(el.dataset.target || '0');
            const duration = parseInt(el.dataset.duration || '1500');
            const suffix = el.dataset.suffix || '';
            let start = 0;
            const startTime = performance.now();

            function update(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease-out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                start = Math.floor(eased * target);
                el.textContent = start + suffix;
                if (progress < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
            counterObserver.unobserve(el);
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-counter]').forEach(el => {
        counterObserver.observe(el);
    });

    /* ---------- Skill bars animation ---------- */
    const barObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const fill = entry.target.querySelector('.skill-bar-fill');
            if (fill) {
                const w = fill.dataset.width || '0%';
                fill.style.width = w;
            }
            barObserver.unobserve(entry.target);
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.skill-bar-wrap').forEach(el => {
        const fill = el.querySelector('.skill-bar-fill');
        if (fill) { fill.style.width = '0%'; }
        barObserver.observe(el);
    });

    /* ---------- Nav: scroll-aware opacity ---------- */
    const nav = document.querySelector('nav');
    if (nav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('nav-scrolled');
            } else {
                nav.classList.remove('nav-scrolled');
            }
        }, { passive: true });
    }

    /* ---------- Smooth hover on project cards ---------- */
    document.querySelectorAll('.glass-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const rotX = (-y / rect.height) * 6;
            const rotY = (x / rect.width) * 6;
            card.style.transform = `perspective(800px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-4px)`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    /* ---------- Flash auto-hide ---------- */
    const flash = document.getElementById('flash-message');
    if (flash) {
        setTimeout(() => {
            flash.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            flash.style.opacity = '0';
            flash.style.transform = 'translateY(-10px)';
            setTimeout(() => flash.remove(), 450);
        }, 3500);
    }

});
