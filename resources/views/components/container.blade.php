{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-container>                                                      │
    │  Reusable max-width container with responsive padding               │
    │                                                                     │
    │  Props:                                                             │
    │   $class – extra Tailwind classes                                   │
    │   $slot  – inner content                                            │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props(['class' => ''])

<div {{ $attributes->class("max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {$class}") }}>
    {{ $slot }}
</div>
