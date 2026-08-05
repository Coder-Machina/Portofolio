@props(['skill'])

@php
    $levelLabels = [1 => 'Débutant', 2 => 'Intermédiaire', 3 => 'Compétent', 4 => 'Avancé', 5 => 'Expert'];
    $levelColors = [
        1 => 'var(--text-muted)',
        2 => 'var(--accent-blue)',
        3 => 'var(--accent-blue)',
        4 => 'var(--accent-purple)',
        5 => 'var(--accent-green)',
    ];
    $level = $skill->level ?? 1;
    $label = $levelLabels[$level] ?? 'N/A';
    $color = $levelColors[$level] ?? 'var(--text-muted)';
@endphp

<div style="
    display:inline-flex;
    align-items:center;
    gap:0.75rem;
    padding:0.4rem 0.875rem;
    border-radius:9999px;
    background:var(--bg-surface);
    border:1px solid var(--border);
    transition:var(--transition);
    cursor:default;
"
onmouseover="this.style.borderColor='var(--border-hover)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)';"
onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none';">

    <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:{{ $color }};"></span>
    <span style="font-size:0.8rem;font-weight:500;color:var(--text-primary);">{{ $skill->name }}</span>
    <span style="font-size:0.7rem;color:var(--text-muted);margin-left:0.25rem;">{{ $label }}</span>

</div>
