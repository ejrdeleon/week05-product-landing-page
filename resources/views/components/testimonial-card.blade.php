{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-testimonial-card>                                               │
    │  Reusable testimonial card with SVG avatar + stars                  │
    │                                                                     │
    │  Props:                                                             │
    │   $name     – customer display name                                 │
    │   $position – customer role/description                             │
    │   $review   – review text                                           │
    │   $stars    – star rating 1–5 (default: 5)                          │
    │   $initials – 1–2 letter avatar initials (auto-derived if empty)    │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'name'     => 'Guest',
    'position' => 'Café Visitor',
    'review'   => '',
    'stars'    => 5,
    'initials' => '',
])

@php
    // Auto-derive initials from name if not explicitly provided
    $avatarInitials = $initials ?: implode('', array_map(
        fn ($w) => strtoupper($w[0]),
        array_filter(array_slice(explode(' ', trim($name)), 0, 2))
    ));

    // Cap stars between 1 and 5
    $starCount = max(1, min(5, (int) $stars));
@endphp

<article
    class="flex flex-col gap-5 p-6 rounded-2xl bg-so-surface border border-white/[0.06]
           hover:border-white/[0.12] hover:-translate-y-1 hover:shadow-xl hover:shadow-black/30
           transition-all duration-300"
    aria-label="Testimonial from {{ $name }}"
>
    {{-- Star rating --}}
    <div class="flex items-center gap-0.5" aria-label="{{ $starCount }} out of 5 stars" role="img">
        @for ($i = 1; $i <= 5; $i++)
            <svg
                class="w-4 h-4 {{ $i <= $starCount ? 'text-so-accent' : 'text-white/10' }}"
                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
            >
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
        @endfor
    </div>

    {{-- Review text --}}
    <blockquote class="text-so-muted text-sm leading-relaxed flex-grow">
        "{{ $review }}"
    </blockquote>

    {{-- Divider --}}
    <div class="h-px bg-white/[0.05]"></div>

    {{-- Author row --}}
    <div class="flex items-center gap-3">

        {{-- SVG initials avatar (no real photos used) --}}
        <div
            class="flex items-center justify-center w-10 h-10 rounded-full
                   bg-so-accent/10 border border-so-accent/20 flex-shrink-0"
            aria-hidden="true"
        >
            <span class="text-so-accent font-bold text-sm select-none">
                {{ $avatarInitials }}
            </span>
        </div>

        {{-- Name + role --}}
        <div>
            <p class="text-so-text font-semibold text-sm leading-snug">{{ $name }}</p>
            <p class="text-so-muted text-xs">{{ $position }}</p>
        </div>
    </div>
</article>