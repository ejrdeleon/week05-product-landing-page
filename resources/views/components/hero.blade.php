{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-hero>                                                           │
    │  Premium 2-column hero section for Sideout Café                    │
    │                                                                     │
    │  Left:  Badge · H1 · Subtext · Dual CTAs · Location pill           │
    │  Right: Loyalty card mockup (academic prototype visual)             │
    │                                                                     │
    │  Responsive:                                                        │
    │   Mobile  → single column (text on top, visual below)              │
    │   Tablet  → 2-col, tighter spacing                                  │
    │   Desktop → 2-col, generous spacing                                 │
    └─────────────────────────────────────────────────────────────────────┘
--}}

<section
    id="home"
    class="relative min-h-screen flex items-center pt-16 pb-20 overflow-hidden"
    aria-labelledby="hero-heading"
>
    {{-- ── BACKGROUND DECORATION ─────────────────────────────────────── --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
        {{-- Top-left glow --}}
        <div class="glow-orb w-[500px] h-[500px] -top-32 -left-32 opacity-60"></div>
        {{-- Bottom-right glow --}}
        <div class="glow-orb w-[400px] h-[400px] bottom-0 right-0 opacity-40"
             style="animation-delay: 1.5s;"></div>
        {{-- Subtle grid overlay --}}
        <div class="absolute inset-0 opacity-[0.025]"
             style="background-image:
                 linear-gradient(rgba(154,240,106,0.8) 1px, transparent 1px),
                 linear-gradient(90deg, rgba(154,240,106,0.8) 1px, transparent 1px);
                 background-size: 60px 60px;">
        </div>
    </div>

    <x-container class="relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- ── LEFT COLUMN – TEXT CONTENT ───────────────────────────── --}}
            <div class="flex flex-col gap-6 animate-fade-up order-2 lg:order-1">

                {{-- Location badge --}}
                <div class="flex items-center gap-2">
                    <x-badge color="green">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        Lumban, Laguna
                    </x-badge>
                </div>

                {{-- Main headline --}}
                <h1
                    id="hero-heading"
                    class="text-5xl sm:text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight"
                >
                    Good Coffee.<br>
                    <span class="gradient-text">Good Energy.</span><br>
                    <span class="text-so-muted font-semibold text-4xl sm:text-5xl lg:text-6xl">
                        Find Your Sideout.
                    </span>
                </h1>

                {{-- Supporting copy --}}
                <p class="text-so-muted text-lg sm:text-xl leading-relaxed max-w-xl">
                    Sideout Café is your local coffee destination in Lumban, Laguna — a warm space
                    for community, good drinks, and a loyalty program that rewards every visit.
                    <br><br>
                    <span class="text-so-accent2 font-medium">
                        Earn one point for every personal drink purchased.
                    </span>
                    <span class="block text-xs text-so-muted/60 mt-1">
                        ↳ Verified from the official Sideout Café website.
                    </span>
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <x-button
                        variant="primary"
                        href="https://www.sideout-cafe.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Get Started
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </x-button>
                    <x-button
                        variant="outline"
                        href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        Find Us
                    </x-button>
                </div>

                {{-- Trust pill --}}
                <p class="text-xs text-so-muted/50 max-w-sm leading-relaxed">
                    Academic redesign concept for ITST 302 · Not the official Sideout Café website.
                </p>

            </div>{{-- / left column --}}

            {{-- ── RIGHT COLUMN – LOYALTY CARD MOCKUP ─────────────────── --}}
            <div
                class="relative flex justify-center lg:justify-end order-1 lg:order-2 animate-fade-up"
                style="animation-delay: 0.15s;"
                aria-label="Loyalty dashboard prototype visual"
                role="img"
            >
                {{-- Background halo --}}
                <div
                    aria-hidden="true"
                    class="absolute inset-0 m-auto w-72 h-72 rounded-full opacity-20 blur-3xl"
                    style="background: radial-gradient(circle, #9AF06A 0%, transparent 70%);"
                ></div>

                {{-- Loyalty Dashboard Card --}}
                <div class="relative w-full max-w-sm">

                    {{-- Main loyalty card --}}
                    <div class="glass-card rounded-3xl p-6 shadow-2xl shadow-black/40">

                        {{-- Card header --}}
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <p class="text-xs text-so-muted uppercase tracking-widest font-semibold mb-0.5">
                                    Loyalty Program
                                </p>
                                <p class="text-so-text font-bold text-lg leading-tight">
                                    Sideout Café
                                </p>
                            </div>
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-so-accent/10 border border-so-accent/20">
                                <svg class="w-5 h-5 text-so-accent" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="20 12 20 22 4 22 4 12"/>
                                    <rect x="2" y="7" width="20" height="5"/>
                                    <line x1="12" y1="22" x2="12" y2="7"/>
                                    <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/>
                                    <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Member name (sample) --}}
                        <div class="mb-5">
                            <p class="text-xs text-so-muted mb-0.5">Member</p>
                            <p class="text-so-text font-semibold">Sample Member</p>
                        </div>

                        {{-- Points display --}}
                        <div class="bg-so-accent/8 rounded-2xl p-4 mb-5 border border-so-accent/15">
                            <p class="text-xs text-so-muted mb-1 uppercase tracking-wider">Current Points</p>
                            <div class="flex items-end gap-2">
                                <span class="text-5xl font-bold text-so-accent leading-none">7</span>
                                <span class="text-so-muted text-sm mb-1">/ 10 pts</span>
                            </div>
                        </div>

                        {{-- Progress bar --}}
                        <div class="mb-5">
                            <div class="flex justify-between text-xs text-so-muted mb-2">
                                <span>Reward progress</span>
                                <span class="text-so-accent font-semibold">70%</span>
                            </div>
                            <div class="h-2 bg-so-surface2 rounded-full overflow-hidden">
                                <div
                                    class="h-full rounded-full bg-gradient-to-r from-so-accent to-so-accent2 transition-all duration-700"
                                    style="width: 70%;"
                                    role="progressbar"
                                    aria-valuenow="70"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    aria-label="Loyalty reward progress: 70%"
                                ></div>
                            </div>
                        </div>

                        {{-- Rule indicator --}}
                        <div class="flex items-center gap-2 p-3 rounded-xl bg-so-surface2 border border-white/5">
                            <svg class="w-4 h-4 text-so-accent flex-shrink-0" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span class="text-xs text-so-muted">
                                <strong class="text-so-text">1 drink = 1 point</strong>
                                &nbsp;·&nbsp; per personal drink
                            </span>
                        </div>

                        {{-- Academic prototype note --}}
                        <p class="text-[10px] text-so-muted/40 text-center mt-4 leading-relaxed">
                            Visual prototype · Academic project · ITST 302
                        </p>

                    </div>{{-- / loyalty card --}}

                    {{-- Floating drink-count badge --}}
                    <div
                        class="absolute -top-4 -right-4 glass-card rounded-2xl px-4 py-2.5
                               border border-so-accent/20 shadow-xl shadow-black/30"
                        aria-hidden="true"
                    >
                        <p class="text-[10px] text-so-muted uppercase tracking-wide">Drinks</p>
                        <p class="text-xl font-bold text-so-text leading-none">7 ☕</p>
                    </div>

                    {{-- Floating "Next reward" badge --}}
                    <div
                        class="absolute -bottom-4 -left-4 glass-card rounded-2xl px-4 py-2.5
                               border border-white/10 shadow-xl shadow-black/30"
                        aria-hidden="true"
                    >
                        <p class="text-[10px] text-so-muted uppercase tracking-wide">Next reward</p>
                        <p class="text-sm font-bold text-so-accent leading-none">3 more drinks</p>
                    </div>

                </div>{{-- / card wrapper --}}
            </div>{{-- / right column --}}

        </div>{{-- / grid --}}
    </x-container>
</section>