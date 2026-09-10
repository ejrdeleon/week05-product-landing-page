{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-button>                                                         │
    │  Reusable button component – supports multiple variants             │
    │                                                                     │
    │  Props:                                                             │
    │   $variant  – 'primary' | 'secondary' | 'ghost' | 'outline'        │
    │   $href     – URL (renders <a> if set, <button> otherwise)          │
    │   $type     – button type attribute (default: 'button')             │
    │   $class    – extra Tailwind classes                                │
    │   $slot     – button label content                                  │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'variant' => 'primary',
    'href'    => null,
    'type'    => 'button',
    'class'   => '',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm
             transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2
             focus:ring-offset-so-bg cursor-pointer select-none whitespace-nowrap';

    $variants = [
        'primary'   => 'bg-so-accent text-so-bg hover:bg-so-accent2 focus:ring-so-accent
                        shadow-lg shadow-so-accent/20 hover:shadow-so-accent/40 hover:-translate-y-0.5',

        'secondary' => 'bg-so-surface2 text-so-text border border-white/10
                        hover:bg-so-surface hover:border-white/20 hover:-translate-y-0.5',

        'ghost'     => 'bg-transparent text-so-muted hover:text-so-text hover:bg-white/5',

        'outline'   => 'bg-transparent text-so-accent border border-so-accent/50
                        hover:bg-so-accent hover:text-so-bg hover:border-so-accent
                        focus:ring-so-accent hover:-translate-y-0.5',
    ];

    $classes = trim($base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . $class);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>
        {{ $slot }}
    </button>
@endif