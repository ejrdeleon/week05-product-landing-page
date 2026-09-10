{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-stat-card>                                                      │
    │  Reusable stat display: number + label                              │
    │                                                                     │
    │  Props:                                                             │
    │   $number – the big number/value to display                         │
    │   $label  – descriptor beneath the number                           │
    │   $class  – extra Tailwind classes                                  │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'number' => '—',
    'label'  => '',
    'class'  => '',
])

<div {{ $attributes->class("flex flex-col items-center text-center p-5 rounded-2xl bg-so-surface2 border border-white/5 hover:border-so-accent/30 transition-colors duration-300 {$class}") }}>
    <span class="text-3xl sm:text-4xl font-bold text-so-accent leading-none">
        {{ $number }}
    </span>
    <span class="mt-1.5 text-xs sm:text-sm text-so-muted font-medium uppercase tracking-wide">
        {{ $label }}
    </span>
</div>
