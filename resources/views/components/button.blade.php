@props([
    'variant' => 'primary',
    'href'    => null,
    'type'    => 'button',
    'class'   => '',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm
             transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2
             focus:ring-offset-so-bg cursor-pointer select-none whitespace-nowrap';

    $variants = [
        'primary'   => 'bg-so-accent text-so-bg hover:bg-so-accent2 focus:ring-so-accent',
        'secondary' => 'bg-so-surface2 text-so-text border border-white/10 hover:border-white/20 focus:ring-white/20',
        'ghost'     => 'bg-transparent text-so-muted hover:text-so-text hover:bg-white/5 focus:ring-white/20',
        'outline'   => 'bg-transparent text-so-accent border border-so-accent/40 hover:bg-so-accent hover:text-so-bg focus:ring-so-accent',
    ];

    $classes = trim($base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . $class);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
