@extends('layouts.app')

@section('title', 'About | Sideout Café')

@section('content')

<x-navbar />

<section class="pt-32 pb-16 lg:pt-40 lg:pb-20 bg-so-bg" aria-labelledby="about-page-heading">
    <x-container>
        <div class="max-w-3xl mx-auto text-center flex flex-col items-center gap-5">
            <h1 id="about-page-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-so-text leading-tight">
                Your next coffee stop in <span class="gradient-text">Lumban.</span>
            </h1>
            <p class="text-so-muted text-lg leading-relaxed">
                Sideout Café started with a simple idea: build a coffee spot in Lumban, Laguna
                that feels like a genuine hangout, not just a counter to order from.
            </p>
        </div>
    </x-container>
</section>

<section class="py-16 lg:py-24 bg-so-surface" aria-labelledby="story-heading">
    <x-container>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div class="flex flex-col gap-5">
                <h2 id="story-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Good drinks. Good people. Good sideout.</h2>
                <p class="text-so-muted leading-relaxed">
                    We keep the menu focused — coffee done properly, a handful of non-coffee
                    options, and a few house favorites people keep coming back for. No overcomplicated
                    orders, just consistent drinks made the same way every time.
                </p>
                <p class="text-so-muted leading-relaxed">
                    Sideout Café sits in Lumban, Laguna, and it's built around the people who
                    show up regularly — students catching up between classes, locals starting
                    their morning, groups meeting up on the weekend.
                </p>
            </div>
            <div class="flex flex-col gap-5">
                <h2 class="text-2xl sm:text-3xl font-bold text-so-text">A loyalty program that's actually simple</h2>
                <p class="text-so-muted leading-relaxed">
                    No app, no punch card to lose. Every personal drink you order earns one
                    point, and those points build toward a free reward. That's the whole system.
                </p>
                <div class="p-5 rounded-2xl bg-so-surface2 border border-so-accent/10">
                    <p class="text-so-text font-semibold">1 drink = 1 point</p>
                    <p class="text-so-muted text-sm mt-1">per personal drink purchased</p>
                </div>
            </div>
        </div>
    </x-container>
</section>

<section class="py-16 lg:py-24 bg-so-bg" aria-labelledby="find-us-heading">
    <x-container>
        <div class="rounded-3xl border border-white/[0.06] bg-so-surface2 p-10 lg:p-14 text-center flex flex-col items-center gap-5">
            <h2 id="find-us-heading" class="text-2xl sm:text-3xl font-bold text-so-text">Find your favorite drink and make your next visit count.</h2>
            <p class="text-so-muted max-w-md">Lumban, Laguna, Philippines</p>
            <div class="flex flex-wrap justify-center gap-3">
                <x-button variant="primary" href="{{ route('menu') }}">View Menu</x-button>
                <x-button variant="outline" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer">Find Us</x-button>
            </div>
        </div>
    </x-container>
</section>

<x-footer />

@endsection
