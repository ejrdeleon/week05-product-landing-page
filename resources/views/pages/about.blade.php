@extends('layouts.app')

@section('title', 'About | Sideout Cafe')

@section('content')

<x-navbar />

<section class="bg-so-bg pt-[68px]" aria-labelledby="about-page-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="flex items-center gap-3 mb-5">
            <span class="w-6 h-px bg-so-accent/50"></span>
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">About</p>
        </div>
        <h1 id="about-page-heading" class="text-4xl sm:text-5xl font-black tracking-tight text-so-text leading-tight max-w-2xl">
            Your next coffee stop in <span class="gradient-text">Lumban.</span>
        </h1>
        <p class="mt-5 text-so-muted text-base sm:text-lg leading-relaxed max-w-xl">
            Sideout Cafe started with a simple idea: build a coffee spot in Lumban, Laguna that feels like a genuine hangout, not just a counter to order from.
        </p>
        <div class="mt-6">
            <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 text-sm text-so-accent hover:text-so-accent2 transition-colors">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Visit the official Sideout Cafe website
            </a>
        </div>
    </div>
    <div class="h-px bg-gradient-to-r from-transparent via-white/[0.07] to-transparent mx-8"></div>
</section>

<section class="py-16 lg:py-24 bg-so-surface" aria-labelledby="story-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div class="flex flex-col gap-5">
                <h2 id="story-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Good drinks. Good people. Good sideout.</h2>
                <p class="text-so-muted leading-relaxed">
                    We keep the menu focused — coffee done properly, a handful of non-coffee options, and a few house favorites people keep coming back for. No overcomplicated orders, just consistent drinks made the same way every time.
                </p>
                <p class="text-so-muted leading-relaxed">
                    Sideout Cafe sits in Lumban, Laguna, and it's built around the people who show up regularly — students catching up between classes, locals starting their morning, groups meeting up on the weekend.
                </p>
            </div>
            <div class="flex flex-col gap-5">
                <h2 class="text-2xl sm:text-3xl font-bold text-so-text">A loyalty program that's actually simple</h2>
                <p class="text-so-muted leading-relaxed">
                    No app, no punch card to lose. Every personal drink you order earns one point, and those points build toward a free reward. That's the whole system.
                </p>
                <div class="p-5 rounded-2xl bg-so-surface2 border border-so-accent/[0.12]">
                    <p class="text-so-text font-semibold">1 drink = 1 point</p>
                    <p class="text-so-muted text-sm mt-1">per personal drink purchased</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-24 bg-so-bg" aria-labelledby="find-us-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-white/[0.06] bg-so-surface2 p-8 sm:p-12 lg:p-14 text-center flex flex-col items-center gap-5">
            <h2 id="find-us-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Find your favorite drink and make your next visit count.</h2>
            <p class="text-so-muted max-w-md">Lumban, Laguna, Philippines</p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('menu') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                    View Menu
                </a>
                <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-white/[0.10] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.20] transition-colors">
                    Find Us
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
