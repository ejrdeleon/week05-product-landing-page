@props([
    'name'     => 'Guest',
    'position' => 'Café Visitor',
    'review'   => '',
    'stars'    => 5,
    'initials' => '',
])

@php
    $avatarInitials = $initials ?: implode('', array_map(
        fn ($w) => strtoupper($w[0]),
        array_filter(array_slice(explode(' ', trim($name)), 0, 2))
    ));
    $starCount = max(1, min(5, (int) $stars));
@endphp

<article
    class="flex flex-col gap-5 p-6 rounded-2xl bg-so-surface border border-white/[0.06]"
    aria-label="Testimonial from {{ $name }}"
>
    <div class="flex items-center gap-0.5" aria-label="{{ $starCount }} out of 5 stars" role="img">
        @for ($i = 1; $i <= 5; $i++)
            <svg class="w-3.5 h-3.5 {{ $i <= $starCount ? 'text-so-accent' : 'text-white/10' }}"
                 viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
        @endfor
    </div>

    <blockquote class="text-so-muted text-sm leading-relaxed flex-grow italic">
        "{{ $review }}"
    </blockquote>

    <div class="flex items-center gap-3 pt-1 border-t border-white/[0.06]">
        <div class="flex items-center justify-center w-9 h-9 rounded-full bg-so-accent/10 border border-so-accent/20 flex-shrink-0" aria-hidden="true">
            <span class="text-so-accent font-bold text-xs select-none">{{ $avatarInitials }}</span>
        </div>
        <div>
            <p class="text-so-text font-semibold text-sm">{{ $name }}</p>
            <p class="text-so-muted text-xs">{{ $position }}</p>
        </div>
    </div>
</article>
