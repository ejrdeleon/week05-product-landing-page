@props([
    'plan'     => 'Drink',
    'price'    => null,
    'popular'  => false,
    'ctaLabel' => 'Order Now',
    'category' => null,
])

<div class="relative flex flex-col rounded-2xl border transition-all duration-300
            {{ $popular
                ? 'bg-so-surface2 border-so-accent/35 shadow-lg shadow-so-accent/8'
                : 'bg-so-surface border-white/[0.06] hover:border-white/[0.14]' }}">

    @if ($popular)
        <div class="absolute -top-3 left-6 z-10">
            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-so-accent text-so-bg">
                ★ House Favorite
            </span>
        </div>
    @endif

    <div class="flex flex-col gap-4 p-6 flex-grow">
        @if ($category)
            <p class="text-[10px] font-semibold uppercase tracking-[0.22em] text-so-accent/70">{{ $category }}</p>
        @endif

        <div class="flex items-start justify-between gap-3">
            <h3 class="text-so-text font-bold text-lg leading-snug">{{ $plan }}</h3>
            @if ($price)
                <span class="text-2xl font-bold {{ $popular ? 'text-so-accent' : 'text-so-text' }} flex-shrink-0">{{ $price }}</span>
            @endif
        </div>

        <div class="h-px bg-white/[0.06]"></div>

        <ul class="flex flex-col gap-2.5 flex-grow text-sm text-so-muted" role="list">
            {{ $slot }}
        </ul>
    </div>

    <div class="px-6 pb-6">
        <a href="{{ route('menu') }}"
           class="flex items-center justify-center w-full px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors duration-200
                  {{ $popular
                      ? 'bg-so-accent text-so-bg hover:bg-so-accent2'
                      : 'bg-so-surface2 text-so-text border border-white/10 hover:border-white/20' }}">
            {{ $ctaLabel }}
        </a>
    </div>
</div>
