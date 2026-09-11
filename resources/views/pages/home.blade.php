@extends('layouts.app')

@section('title', 'Sideout Cafe | Coffee & Community in Lumban, Laguna')

@section('content')

<x-navbar />
<x-hero />

{{-- FEATURES --}}
<section class="bg-so-bg py-20 lg:py-28" id="features" aria-labelledby="features-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center gap-3 mb-12">
            <span class="w-6 h-px bg-so-accent/50"></span>
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Why people stop by</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 lg:gap-8">

            {{-- Large featured block --}}
            <div class="flex flex-col justify-between rounded-2xl bg-so-surface border border-white/[0.06] p-8 lg:p-10 min-h-[300px]">
                <div>
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-so-accent/10 text-so-accent mb-6" aria-hidden="true">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                            <line x1="6" y1="2" x2="6" y2="4"/>
                            <line x1="10" y1="2" x2="10" y2="4"/>
                            <line x1="14" y1="2" x2="14" y2="4"/>
                        </svg>
                    </div>
                    <h2 id="features-heading" class="text-2xl font-bold text-so-text leading-snug mb-3">Coffee crafted for the everyday rhythm.</h2>
                    <p class="text-so-muted text-base leading-7">Balanced espresso, smooth cold brews, and the kind of drinks people come back for — made fresh, every day, for the neighborhood.</p>
                </div>
                <div class="mt-8 pt-6 border-t border-white/[0.06] flex flex-wrap items-center gap-6">
                    <div>
                        <p class="text-xl font-bold text-so-text">Daily</p>
                        <p class="text-xs text-so-muted mt-0.5">Fresh brews</p>
                    </div>
                    <div class="w-px h-8 bg-white/10"></div>
                    <div>
                        <p class="text-xl font-bold text-so-text">Local</p>
                        <p class="text-xs text-so-muted mt-0.5">Lumban, Laguna</p>
                    </div>
                    <div class="w-px h-8 bg-white/10"></div>
                    <div>
                        <p class="text-xl font-bold text-so-text">Warm</p>
                        <p class="text-xs text-so-muted mt-0.5">Atmosphere</p>
                    </div>
                </div>
            </div>

            {{-- 2x2 smaller cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-feature-card
                    title="Easygoing atmosphere"
                    description="Comfortable seating, good music, and a place to stay awhile with friends or a laptop."
                    :icon="'<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z\'/><polyline points=\'9 22 9 12 15 12 15 22\'/></svg>'"
                />
                <x-feature-card
                    title="Simple loyalty rewards"
                    description="One personal drink equals one point. Every visit counts, no complicated rules."
                    :icon="'<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><polyline points=\'20 12 20 22 4 22 4 12\'/><rect x=\'2\' y=\'7\' width=\'20\' height=\'5\'/><line x1=\'12\' y1=\'22\' x2=\'12\' y2=\'7\'/><path d=\'M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z\'/><path d=\'M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z\'/></svg>'"
                />
                <x-feature-card
                    title="Right in Lumban"
                    description="A familiar neighborhood stop with easy access and a clear route to the café."
                    :icon="'<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z\'/><circle cx=\'12\' cy=\'10\' r=\'3\'/></svg>'"
                />
                <x-feature-card
                    title="Community first"
                    description="A place where regulars feel at home and new faces are always welcome."
                    :icon="'<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\'/><circle cx=\'9\' cy=\'7\' r=\'4\'/><path d=\'M23 21v-2a4 4 0 0 0-3-3.87\'/><path d=\'M16 3.13a4 4 0 0 1 0 7.75\'/></svg>'"
                />
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="bg-so-surface py-20 lg:py-28" aria-labelledby="about-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">

            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-6 h-px bg-so-accent/50"></span>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">About Sideout</p>
                </div>
                <h2 id="about-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-so-text leading-tight">
                    Coffee, good company,<br>and a little room to breathe.
                </h2>
                <p class="mt-6 text-base leading-7 text-so-muted">
                    Sideout Cafe is a neighborhood coffee spot in Lumban, Laguna built around calm mornings, easy catch-ups, and drinks that keep people coming back.
                </p>
                <p class="mt-4 text-base leading-7 text-so-muted">
                    Whether it's a quick espresso before the day starts or a long catch-up over iced drinks, the vibe stays warm, welcoming, and familiar.
                </p>
                <div class="mt-8">
                    <a href="{{ route('about') }}"
                       class="inline-flex items-center gap-2 text-sm font-medium text-so-accent hover:text-so-accent2 transition-colors">
                        Learn more about us
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <div class="rounded-2xl bg-so-surface2 border border-white/[0.07] overflow-hidden">
                <div class="h-1.5 bg-gradient-to-r from-so-accent/50 via-so-accent/20 to-transparent"></div>
                <div class="p-8">
                    <p class="text-xs uppercase tracking-[0.22em] text-so-muted font-medium mb-6">The Sideout experience</p>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-so-accent/10 flex items-center justify-center flex-shrink-0 mt-0.5" aria-hidden="true">
                                <svg class="w-4 h-4 text-so-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <p class="text-so-text font-semibold text-sm">Lumban, Laguna 4014</p>
                                <p class="text-so-muted text-sm mt-0.5">Your neighborhood café, easy to find.</p>
                            </div>
                        </div>
                        <div class="h-px bg-white/[0.06]"></div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-so-accent/10 flex items-center justify-center flex-shrink-0 mt-0.5" aria-hidden="true">
                                <svg class="w-4 h-4 text-so-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                            </div>
                            <div>
                                <p class="text-so-text font-semibold text-sm">1 drink = 1 loyalty point</p>
                                <p class="text-so-muted text-sm mt-0.5">Simple rewards, every personal drink counts.</p>
                            </div>
                        </div>
                        <div class="h-px bg-white/[0.06]"></div>
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-lg bg-so-accent/10 flex items-center justify-center flex-shrink-0 mt-0.5" aria-hidden="true">
                                <svg class="w-4 h-4 text-so-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>
                            </div>
                            <div>
                                <p class="text-so-text font-semibold text-sm">Specialty coffee & more</p>
                                <p class="text-so-muted text-sm mt-0.5">Espresso, cold brew, matcha, and seasonal picks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MENU --}}
<section id="menu" class="bg-so-bg py-20 lg:py-28" aria-labelledby="menu-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-6 h-px bg-so-accent/50"></span>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">The full menu</p>
                </div>
                <h2 id="menu-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-so-text">
                    What's on the menu.
                </h2>
            </div>
            <a href="{{ route('menu') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-so-muted hover:text-so-text transition-colors flex-shrink-0">
                Full menu
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Menu categories grid --}}
        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Coffee --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-5 pt-5 pb-4 border-b border-white/[0.06] flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>
                    </div>
                    <h3 class="text-so-text font-bold text-sm">Coffee</h3>
                </div>
                <ul class="px-5 py-4 space-y-2.5" role="list">
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Classic Americano</span><span class="font-semibold text-so-text flex-shrink-0">₱100</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">House Latte</span><span class="font-semibold text-so-text flex-shrink-0">₱120</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Spanish Latte</span><span class="font-semibold text-so-text flex-shrink-0">₱130</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">White Velvet Latte</span><span class="font-semibold text-so-text flex-shrink-0">₱135</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Macadamia</span><span class="font-semibold text-so-text flex-shrink-0">₱135</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Caramel Espresso</span><span class="font-semibold text-so-text flex-shrink-0">₱140</span></li>
                </ul>
            </div>

            {{-- Non Coffee --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-5 pt-5 pb-4 border-b border-white/[0.06] flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    </div>
                    <h3 class="text-so-text font-bold text-sm">Non Coffee</h3>
                </div>
                <ul class="px-5 py-4 space-y-2.5" role="list">
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Coco Latte</span><span class="font-semibold text-so-text flex-shrink-0">₱135</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Matcha Latte</span><span class="font-semibold text-so-text flex-shrink-0">₱135</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Milky Strawberry</span><span class="font-semibold text-so-text flex-shrink-0">₱125</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Lychee Yogurt</span><span class="font-semibold text-so-text flex-shrink-0">₱125</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Pink Drink</span><span class="font-semibold text-so-text flex-shrink-0">₱146</span></li>
                </ul>
            </div>

            {{-- Tea --}}
            <div class="rounded-2xl bg-so-surface border border-white/[0.06] overflow-hidden">
                <div class="px-5 pt-5 pb-4 border-b border-white/[0.06] flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-so-accent/10 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/></svg>
                    </div>
                    <h3 class="text-so-text font-bold text-sm">Tea</h3>
                </div>
                <ul class="px-5 py-4 space-y-2.5" role="list">
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">English Breakfast</span><span class="font-semibold text-so-text flex-shrink-0">₱70</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Green Tea</span><span class="font-semibold text-so-text flex-shrink-0">₱70</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Earl Grey</span><span class="font-semibold text-so-text flex-shrink-0">₱70</span></li>
                    <li class="flex justify-between gap-2 text-sm border-t border-white/[0.06] pt-2.5 mt-1"><span class="text-so-muted/70 italic">Add-on: Darbo Honey</span><span class="font-semibold text-so-muted flex-shrink-0">+₱30</span></li>
                </ul>
            </div>

            {{-- Special Coffee --}}
            <div class="rounded-2xl bg-so-surface2 border border-so-accent/[0.20] overflow-hidden">
                <div class="px-5 pt-5 pb-4 border-b border-so-accent/[0.12] flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-so-accent/15 flex items-center justify-center text-so-accent flex-shrink-0" aria-hidden="true">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h3 class="text-so-text font-bold text-sm">Special Coffee</h3>
                    <span class="ml-auto text-[10px] font-bold uppercase tracking-wider bg-so-accent text-so-bg px-2 py-0.5 rounded-full flex-shrink-0">Featured</span>
                </div>
                <ul class="px-5 py-4 space-y-2.5" role="list">
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Sideout Signature</span><span class="font-bold text-so-accent flex-shrink-0">₱160</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Brown Coconut</span><span class="font-semibold text-so-text flex-shrink-0">₱150</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Cacao Espresso</span><span class="font-semibold text-so-text flex-shrink-0">₱170</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Cacao Berry</span><span class="font-semibold text-so-text flex-shrink-0">₱165</span></li>
                    <li class="flex justify-between gap-2 text-sm"><span class="text-so-muted">Cacao Matcha</span><span class="font-semibold text-so-text flex-shrink-0">₱180</span></li>
                </ul>
            </div>

        </div>

        <p class="mt-5 text-center text-xs text-so-muted/50">
            Prices sourced from <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer" class="text-so-accent/70 hover:text-so-accent transition-colors underline underline-offset-2">sideout-cafe.com</a> — visit the official site for the latest.
        </p>
    </div>
</section>

{{-- LOYALTY --}}
<section id="loyalty" class="bg-so-surface py-20 lg:py-28" aria-labelledby="loyalty-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-[1fr_380px] lg:gap-16">

            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-6 h-px bg-so-accent/50"></span>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Loyalty Program</p>
                </div>
                <h2 id="loyalty-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-so-text leading-tight">
                    Every cup<br>brings you closer.
                </h2>
                <p class="mt-6 text-base leading-7 text-so-muted max-w-lg">
                    No complicated app. No hidden rules. One personal drink equals one point, and every visit keeps your progress moving toward a free drink.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('loyalty') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                        Join Loyalty
                    </a>
                    <a href="{{ route('menu') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-white/[0.15] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.25] transition-colors">
                        Check Drinks
                    </a>
                </div>
            </div>

            <div class="rounded-2xl bg-so-surface2 border border-so-accent/20 p-7">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-[10px] uppercase tracking-[0.22em] text-so-muted font-medium">Your progress</p>
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

                <div class="flex items-center justify-between text-sm">
                    <span class="text-so-muted">7 of 10 points</span>
                    <span class="text-so-accent font-semibold">3 more for a free drink</span>
                </div>

                <div class="mt-4 pt-4 border-t border-white/[0.07]">
                    <p class="text-xs text-so-muted leading-5">1 personal drink = 1 point · Earn on every visit</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section id="testimonials" class="bg-so-bg py-20 lg:py-28" aria-labelledby="testimonials-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center gap-3 mb-12">
            <span class="w-6 h-px bg-so-accent/50"></span>
            <p id="testimonials-heading" class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">What regulars say</p>
        </div>

        <div class="grid gap-5 md:grid-cols-3 lg:gap-6">
            <x-testimonial-card
                review="The kind of cafe where you can slow down for a bit and still feel right at home. The iced latte is always on point."
                name="Ari"
                position="Local regular"
            />
            <div class="lg:-mt-6">
                <x-testimonial-card
                    review="Good coffee, warm atmosphere, and the kind of loyalty program that actually makes sense. I'm here almost every week."
                    name="Mae"
                    position="Weekend visitor"
                />
            </div>
            <x-testimonial-card
                review="Always a solid place to catch up or get a quick espresso before heading out. The matcha refresher is a personal favorite."
                name="Jules"
                position="Lumban local"
            />
        </div>

        <p class="mt-6 text-center text-xs text-so-muted/50">
            Sample testimonials for academic prototype purposes — not real Sideout Cafe customer reviews.
        </p>
    </div>
</section>

{{-- VISIT / MAP --}}
<section id="contact" class="bg-so-surface py-20 lg:py-28" aria-labelledby="contact-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">

            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-6 h-px bg-so-accent/50"></span>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Visit us</p>
                </div>
                <h2 id="contact-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-so-text">
                    Come find us in<br>Lumban, Laguna.
                </h2>
                <p class="mt-5 text-base leading-7 text-so-muted max-w-sm">
                    Stop by for your next coffee, a quick catch-up, or a calm place to recharge before the day picks up again.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Get Directions
                    </a>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-white/[0.15] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.25] transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden border border-white/[0.07] aspect-[4/3]">
                <iframe
                    src="https://www.google.com/maps?q=Sideout+Cafe,+Lumban,+Laguna,+Philippines&output=embed"
                    class="h-full w-full border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Map showing Sideout Cafe in Lumban, Laguna"
                ></iframe>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-so-bg py-20 lg:py-24" aria-label="Call to action">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl bg-so-surface2 border border-so-accent/[0.15] px-8 py-14 sm:px-12 lg:px-16 text-center relative overflow-hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(154,240,106,0.06),transparent_65%)]"></div>
            <div class="relative z-10">
                <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent mb-4">Sideout Cafe · Lumban, Laguna</p>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-so-text leading-tight">
                    Your next cup<br>is waiting.
                </h2>
                <p class="mt-5 text-base text-so-muted max-w-md mx-auto leading-7">
                    Come in, sit down, and let the day slow down for a moment. We'll have the coffee ready.
                </p>
                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('menu') }}"
                       class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors">
                        View the Menu
                    </a>
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl border border-white/[0.15] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.25] transition-colors">
                        Find Sideout
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-footer />

@endsection
