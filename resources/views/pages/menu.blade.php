@extends('layouts.app')

@section('title', 'Menu | Sideout Cafe')

@section('content')

<x-navbar />

{{-- Hero --}}
<section class="bg-so-bg pt-[68px]" aria-labelledby="menu-page-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="flex items-center gap-3 mb-5">
            <span class="w-6 h-px bg-so-accent/50"></span>
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Sideout Cafe</p>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
            <h1 id="menu-page-heading" class="text-4xl sm:text-5xl font-black tracking-tight text-so-text leading-tight">
                Our Menu
            </h1>
            <a href="https://www.sideout-cafe.com/"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 text-sm text-so-muted hover:text-so-accent transition-colors flex-shrink-0">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Official site
            </a>
        </div>
        <p class="mt-4 text-so-muted text-base max-w-xl leading-7">
            Drinks made the Sideout way — every personal drink earns one loyalty point.
        </p>
    </div>
    <div class="h-px bg-gradient-to-r from-transparent via-white/[0.07] to-transparent mx-8"></div>
</section>

{{-- Menu grid --}}
<section class="bg-so-bg py-12 lg:py-16" aria-label="Full menu">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Coffee --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-white/[0.06]">
                    <div class="flex items-center gap-2.5 mb-1">
                        <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>
                        </div>
                        <h2 class="text-so-text font-bold text-base">Coffee</h2>
                    </div>
                </div>
                <ul class="px-6 py-4 space-y-3" role="list">
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Classic Americano</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱100</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">House Latte</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱120</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Spanish Latte</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱130</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">White Velvet Latte</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱135</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Macadamia</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱135</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Caramel Espresso</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱140</span>
                    </li>
                </ul>
            </div>

            {{-- Non Coffee --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-white/[0.06]">
                    <div class="flex items-center gap-2.5 mb-1">
                        <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>
                        </div>
                        <h2 class="text-so-text font-bold text-base">Non Coffee</h2>
                    </div>
                </div>
                <ul class="px-6 py-4 space-y-3" role="list">
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Coco Latte</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱135</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Matcha Latte</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱135</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Milky Strawberry</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱125</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Lychee Yogurt</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱125</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Pink Drink</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱146</span>
                    </li>
                </ul>
            </div>

            {{-- Tea --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-white/[0.06]">
                    <div class="flex items-center gap-2.5 mb-1">
                        <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/></svg>
                        </div>
                        <h2 class="text-so-text font-bold text-base">Tea</h2>
                    </div>
                </div>
                <ul class="px-6 py-4 space-y-3" role="list">
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">English Breakfast</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱70</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Green Tea</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱70</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Earl Grey</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱70</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm border-t border-white/[0.06] pt-3 mt-1">
                        <span class="text-so-muted/70 italic">Add-on: Darbo Honey</span>
                        <span class="font-semibold text-so-muted flex-shrink-0">+₱30</span>
                    </li>
                </ul>
            </div>

            {{-- Special Coffee --}}
            <div class="rounded-2xl bg-so-surface2 border border-so-accent/[0.20] overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-so-accent/[0.12]">
                    <div class="flex items-center gap-2.5 mb-1">
                        <div class="w-7 h-7 rounded-lg bg-so-accent/15 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <h2 class="text-so-text font-bold text-base">Special Coffee</h2>
                        <span class="ml-auto text-[10px] font-bold uppercase tracking-wider bg-so-accent text-so-bg px-2 py-0.5 rounded-full">Featured</span>
                    </div>
                </div>
                <ul class="px-6 py-4 space-y-3" role="list">
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Sideout Signature</span>
                        <span class="font-bold text-so-accent flex-shrink-0">₱160</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Brown Coconut</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱150</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Cacao Espresso</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱170</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Cacao Berry</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱165</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 text-sm">
                        <span class="text-so-muted">Cacao Matcha</span>
                        <span class="font-semibold text-so-text flex-shrink-0">₱180</span>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Loyalty reminder --}}
        <div class="mt-10 rounded-2xl bg-so-surface border border-so-accent/[0.15] px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                </div>
                <div>
                    <p class="text-so-text font-semibold text-sm">Loyalty Program</p>
                    <p class="text-so-muted text-xs mt-0.5">Every personal drink earns 1 point toward a free reward.</p>
                </div>
            </div>
            <a href="{{ route('loyalty') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors flex-shrink-0">
                Learn More
            </a>
        </div>

        {{-- Official site note --}}
        <p class="mt-6 text-center text-xs text-so-muted/50">
            Menu data sourced from
            <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer" class="text-so-accent/70 hover:text-so-accent transition-colors underline underline-offset-2">sideout-cafe.com</a>.
            Prices may vary — visit the official site for the latest.
        </p>
    </div>
</section>

{{-- CTA --}}
<section class="bg-so-surface py-16 lg:py-20" aria-label="Visit us">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <div>
                <h2 class="text-2xl font-bold text-so-text">Ready to visit?</h2>
                <p class="text-so-muted text-sm mt-1">Sideout Cafe · Lumban, Laguna, Philippines</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    Get Directions
                </a>
                <a href="https://www.sideout-cafe.com/"
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/[0.10] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.20] transition-colors">
                    Official Website
                </a>
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/[0.10] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.20] transition-colors">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</section>

<x-footer />

@endsection
