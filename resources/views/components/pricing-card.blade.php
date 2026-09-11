{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-pricing-card>                                                   │
    │  Café menu / drink offering card                                    │
    │                                                                     │
    │  Props:                                                             │
    │   $plan     – drink or offering name                                │
    │   $price    – display price string (e.g., '₱149'), optional         │
    │   $popular  – boolean, highlights this as a featured pick           │
    │   $ctaLabel – CTA button label (default: 'View Menu')               │
    │   $category – small label above the name (e.g., 'Coffee')          │
    │   $slot     – list of short detail <li> items                       │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'plan'     => 'Drink',
    'price'    => null,
    'popular'  => false,
    'ctaLabel' => 'View Menu',
    'category' => null,
])

<div
    class="relative flex flex-col rounded-3xl border transition-all duration-300
           hover:-translate-y-1 hover:shadow-2xl
           {{ $popular
               ? 'bg-so-surface2 border-so-accent/40 shadow-xl shadow-so-accent/10
                  hover:border-so-accent/60 hover:shadow-so-accent/20'
               : 'bg-so-surface border-white/[0.06] hover:border-white/[0.14]
                  hover:shadow-black/30' }}"
>
    {{-- Featured badge --}}
    @if ($popular)
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-10">
            <x-badge color="green">Customer Favorite</x-badge>
        </div>
    @endif

    <div class="flex flex-col gap-5 p-7 flex-grow">

        {{-- Drink name --}}
        <div>
            @if ($category)
                <p class="text-[10px] text-so-accent/70 mt-0.5 uppercase tracking-wider font-semibold mb-1">
                    {{ $category }}
                </p>
            @endif
            <h3 class="text-so-text font-bold text-lg">{{ $plan }}</h3>
        </div>

        {{-- Price display --}}
        @if ($price)
            <div class="flex items-end gap-1.5">
                <span class="text-4xl font-bold tracking-tighter
                             {{ $popular ? 'text-so-accent' : 'text-so-text' }}">
                    {{ $price }}
                </span>
            </div>
        @endif

        {{-- Divider --}}
        <div class="h-px bg-white/[0.06]"></div>

        {{-- Details list --}}
        <ul class="flex flex-col gap-3 flex-grow text-sm text-so-muted" role="list">
            {{ $slot }}
        </ul>

    </div>

    {{-- CTA footer --}}
    <div class="px-7 pb-7">
        <x-button
            variant="{{ $popular ? 'primary' : 'secondary' }}"
            href="{{ route('menu') }}"
            class="w-full"
        >
            {{ $ctaLabel }}
        </x-button>
    </div>
</div>
