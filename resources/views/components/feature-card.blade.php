{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-feature-card>                                                   │
    │  Reusable feature card with SVG icon, title, and description        │
    │                                                                     │
    │  Props:                                                             │
    │   $icon        – SVG markup string (rendered raw)                   │
    │   $title       – card heading                                       │
    │   $description – supporting paragraph                               │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'icon'        => '',
    'title'       => '',
    'description' => '',
])

<div
    class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface border border-white/[0.06]
           hover:border-so-accent/30 hover:bg-so-surface2
           transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-black/30"
>
    {{-- Icon container --}}
    <div
        class="flex items-center justify-center w-11 h-11 rounded-xl
               bg-so-accent/10 border border-so-accent/20 text-so-accent
               group-hover:bg-so-accent/15 group-hover:border-so-accent/35
               transition-colors duration-300 flex-shrink-0"
        aria-hidden="true"
    >
        <div class="w-5 h-5">
            {!! $icon !!}
        </div>
    </div>

    {{-- Title --}}
    <h3 class="text-so-text font-semibold text-base leading-snug group-hover:text-so-accent2
               transition-colors duration-300">
        {{ $title }}
    </h3>

    {{-- Description --}}
    <p class="text-so-muted text-sm leading-relaxed flex-grow">
        {{ $description }}
    </p>
</div>