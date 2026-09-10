{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-badge>                                                          │
    │  Reusable pill/badge component                                      │
    │                                                                     │
    │  Props:                                                             │
    │   $color – 'green' (default) | 'gray' | 'accent'                   │
    │   $class – extra Tailwind classes                                   │
    │   $slot  – badge label                                              │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'color' => 'green',
    'class' => '',
])

@php
    $colors = [
        'green'  => 'bg-so-accent/10 text-so-accent border border-so-accent/25',
        'gray'   => 'bg-white/5 text-so-muted border border-white/10',
        'accent' => 'bg-so-accent2/10 text-so-accent2 border border-so-accent2/25',
    ];
    $colorClasses = $colors[$color] ?? $colors['green'];
@endphp

<span {{ $attributes->class("inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider {$colorClasses} {$class}") }}>
    {{ $slot }}
</span>
