@extends('layouts.app')

@section('title', 'Loyalty | Sideout Café')

@section('content')

<x-navbar />

<section class="pt-32 pb-16 lg:pt-40 lg:pb-24 bg-so-bg" aria-labelledby="loyalty-page-heading">
    <x-container>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="flex flex-col gap-5">
                <h1 id="loyalty-page-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-so-text leading-tight">
                    Every cup brings you <span class="gradient-text">closer.</span>
                </h1>
                <p class="text-so-muted text-lg leading-relaxed max-w-lg">
                    No app to download, no card to lose. Order your drink, and it counts —
                    that's the entire loyalty program at Sideout Café.
                </p>
                <div class="flex flex-wrap gap-3">
                    <x-button variant="primary" href="{{ route('menu') }}">View Menu</x-button>
                    <x-button variant="outline" href="{{ route('contact') }}">Ask a Question</x-button>
                </div>
            </div>

            <div class="p-8 rounded-2xl bg-so-surface2 border border-white/[0.06]">
                <div class="flex items-end gap-2 mb-4">
                    <span class="text-5xl font-bold text-so-accent">1 drink</span>
                    <span class="text-so-muted text-xl mb-1">=</span>
                    <span class="text-5xl font-bold text-so-text">1 point</span>
                </div>
                <p class="text-so-muted text-sm mb-6">per personal drink purchased</p>
                <div class="h-2 bg-so-bg rounded-full overflow-hidden mb-2">
                    <div class="h-full w-[70%] rounded-full bg-gradient-to-r from-so-accent to-so-accent2"></div>
                </div>
                <p class="text-xs text-so-muted">7 of 10 points toward a free drink — an example of how progress looks</p>
            </div>
        </div>
    </x-container>
</section>

<section class="py-16 lg:py-24 bg-so-surface" aria-labelledby="how-it-works-heading">
    <x-container>
        <h2 id="how-it-works-heading" class="text-2xl sm:text-3xl font-bold text-so-text mb-10 text-center">How it works</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-3xl mx-auto">
            <div class="flex flex-col gap-2">
                <span class="text-so-accent text-sm font-semibold">01</span>
                <h3 class="text-so-text font-semibold">Order a drink</h3>
                <p class="text-so-muted text-sm leading-relaxed">Any personal drink on the menu qualifies.</p>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-so-accent text-sm font-semibold">02</span>
                <h3 class="text-so-text font-semibold">Earn a point</h3>
                <p class="text-so-muted text-sm leading-relaxed">One point per personal drink, every visit.</p>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-so-accent text-sm font-semibold">03</span>
                <h3 class="text-so-text font-semibold">Redeem your reward</h3>
                <p class="text-so-muted text-sm leading-relaxed">Points build toward a free drink over time.</p>
            </div>
        </div>
    </x-container>
</section>

<section class="py-16 lg:py-24 bg-so-bg" aria-labelledby="loyalty-cta-heading">
    <x-container>
        <div class="rounded-3xl border border-white/[0.06] bg-so-surface2 p-10 lg:p-14 text-center flex flex-col items-center gap-5">
            <h2 id="loyalty-cta-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Start earning on your next visit.</h2>
            <p class="text-so-muted max-w-md">Lumban, Laguna, Philippines</p>
            <x-button variant="primary" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer">
                Get Directions
            </x-button>
        </div>
    </x-container>
</section>

<x-footer />

@endsection
