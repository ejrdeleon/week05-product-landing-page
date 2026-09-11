@extends('layouts.app')

@section('title', 'Loyalty | Sideout Cafe')

@section('content')

<x-navbar />

<section class="bg-so-bg pt-[68px]" aria-labelledby="loyalty-page-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="flex flex-col gap-5">
                <div class="flex items-center gap-3">
                    <span class="w-6 h-px bg-so-accent/50"></span>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Loyalty Program</p>
                </div>
                <h1 id="loyalty-page-heading" class="text-4xl sm:text-5xl font-black tracking-tight text-so-text leading-tight">
                    Every cup brings you <span class="gradient-text">closer.</span>
                </h1>
                <p class="text-so-muted text-base sm:text-lg leading-relaxed max-w-lg">
                    No app to download, no card to lose. Order your drink, and it counts — that's the entire loyalty program at Sideout Cafe.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('menu') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                        View Menu
                    </a>
                    <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/[0.10] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.20] transition-colors">
                        Official Website
                    </a>
                </div>
            </div>

            <div class="rounded-2xl bg-so-surface2 border border-so-accent/[0.20] p-7">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-[10px] uppercase tracking-[0.22em] text-so-muted font-medium">Example progress</p>
                        <p class="text-lg font-bold text-so-text mt-1">Loyalty Card</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-so-accent/10 flex items-center justify-center text-so-accent" aria-hidden="true">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                    </div>
                </div>
                <div class="grid grid-cols-5 gap-2 mb-5" role="img" aria-label="7 of 10 points earned">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="h-8 rounded-lg flex items-center justify-center text-xs font-bold
                                    {{ $i <= 7 ? 'bg-so-accent text-so-bg' : 'bg-so-bg border border-white/10 text-so-muted/40' }}">
                            {{ $i <= 7 ? '✓' : $i }}
                        </div>
                    @endfor
                </div>
                <div class="flex items-center justify-between text-sm mb-4">
                    <span class="text-so-muted">7 of 10 points</span>
                    <span class="text-so-accent font-semibold">3 more for a free drink</span>
                </div>
                <p class="text-xs text-so-muted/60 leading-5">This is an example of how progress looks — an illustration of how the loyalty program works.</p>
            </div>
        </div>
    </div>
    <div class="h-px bg-gradient-to-r from-transparent via-white/[0.07] to-transparent mx-8"></div>
</section>

<section class="py-16 lg:py-24 bg-so-surface" aria-labelledby="how-it-works-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 id="how-it-works-heading" class="text-2xl sm:text-3xl font-bold text-so-text mb-10 text-center">How it works</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-3xl mx-auto">
            <div class="flex flex-col gap-3">
                <span class="text-so-accent text-sm font-bold">01</span>
                <h3 class="text-so-text font-semibold">Order a drink</h3>
                <p class="text-so-muted text-sm leading-relaxed">Any personal drink on the menu qualifies.</p>
            </div>
            <div class="flex flex-col gap-3">
                <span class="text-so-accent text-sm font-bold">02</span>
                <h3 class="text-so-text font-semibold">Earn a point</h3>
                <p class="text-so-muted text-sm leading-relaxed">One point per personal drink, every visit.</p>
            </div>
            <div class="flex flex-col gap-3">
                <span class="text-so-accent text-sm font-bold">03</span>
                <h3 class="text-so-text font-semibold">Redeem your reward</h3>
                <p class="text-so-muted text-sm leading-relaxed">Points build toward a free drink over time.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-24 bg-so-bg" aria-labelledby="loyalty-cta-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-white/[0.06] bg-so-surface2 p-8 sm:p-12 lg:p-14 text-center flex flex-col items-center gap-5">
            <h2 id="loyalty-cta-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Start earning on your next visit.</h2>
            <p class="text-so-muted max-w-md">Lumban, Laguna, Philippines</p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                    Get Directions
                </a>
                <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/[0.10] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.20] transition-colors">
                    Official Website
                </a>
            </div>
        </div>
    </div>
</section>

<x-footer />

@endsection
