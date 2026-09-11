@props([
    'icon'        => '',
    'title'       => '',
    'description' => '',
])

<div class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface border border-white/[0.06]
            hover:border-so-accent/30 hover:bg-so-surface2 transition-all duration-300">
    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-so-accent/10 text-so-accent flex-shrink-0"
         aria-hidden="true">
        <div class="w-5 h-5">{!! $icon !!}</div>
    </div>
    <h3 class="text-so-text font-semibold text-base leading-snug">{{ $title }}</h3>
    <p class="text-so-muted text-sm leading-relaxed flex-grow">{{ $description }}</p>
</div>
