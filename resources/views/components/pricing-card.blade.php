{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-pricing-card>                                                   │
    │  Reusable pricing card with academic disclaimer                     │
    │                                                                     │
    │  Props:                                                             │
    │   $plan     – plan name                                             │
    │   $price    – formatted price string (e.g., '₱149')                │
    │   $popular  – boolean, highlights this as the most popular plan     │
    │   $ctaLabel – CTA button label (default: 'Get Started')             │
    │   $slot     – list of feature <li> items                            │
    │                                                                     │
    │  ⚠ All prices and features are sample academic content.             │
    │    They are NOT official Sideout Café pricing.                      │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'plan'     => 'Plan',
    'price'    => '₱0',
    'popular'  => false,
    'ctaLabel' => 'Get Started',
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
    {{-- Popular badge --}}
    @if ($popular)
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-10">
            <x-badge color="green">Most Popular</x-badge>
        </div>
    @endif

    <div class="flex flex-col gap-5 p-7 flex-grow">

        {{-- Plan name --}}
        <div>
            <h3 class="text-so-text font-bold text-lg">{{ $plan }}</h3>
            <p class="text-[10px] text-so-muted/50 mt-0.5 uppercase tracking-wider font-medium">
                Sample academic pricing · Not official
            </p>
        </div>

        {{-- Price display --}}
        <div class="flex items-end gap-1.5">
            <span class="text-5xl font-bold tracking-tighter
                         {{ $popular ? 'text-so-accent' : 'text-so-text' }}">
                {{ $price }}
            </span>
            <span class="text-so-muted text-sm mb-1.5 leading-none">/ visit</span>
        </div>

        {{-- Divider --}}
        <div class="h-px bg-white/[0.06]"></div>

        {{-- Features list --}}
        <ul class="flex flex-col gap-3 flex-grow text-sm text-so-muted" role="list">
            {{ $slot }}
        </ul>

    </div>

    {{-- CTA footer --}}
    <div class="px-7 pb-7">
        <x-button
            variant="{{ $popular ? 'primary' : 'secondary' }}"
            href="https://www.sideout-cafe.com/"
            target="_blank"
            rel="noopener noreferrer"
            class="w-full"
        >
            {{ $ctaLabel }}
        </x-button>

        {{-- Academic disclaimer --}}
        <p class="text-[10px] text-so-muted/40 text-center mt-3 leading-relaxed">
            ⚠ Sample content for academic prototype — not official Sideout Café pricing.
        </p>
    </div>
</div>