{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  pages/home.blade.php                                               │
    │  Main landing page – Sideout Café                                   │
    │                                                                     │
    │  ITST 302 – Client-Server Technologies                              │
    │  Week 5 · MP04 – Responsive Product Landing Page                   │
    │                                                                     │
    │  Sections:                                                          │
    │   1. Navbar (sticky, component)                                     │
    │   2. Hero (2-col, loyalty mockup, component)                        │
    │   3. Features (6 cards via <x-feature-card>)                        │
    │   4. Product Showcase (3 panels, stat cards)                        │
    │   5. Pricing (3 plans via <x-pricing-card>, academic disclaimer)    │
    │   6. Testimonials (3 cards via <x-testimonial-card>, sample label)  │
    │   7. CTA (gradient card, dual buttons)                              │
    │   8. Footer (4-col, component)                                      │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@extends('layouts.app')

@section('title', 'Sideout Café | Coffee & Community in Lumban, Laguna')

@section('content')

{{-- ══════════════════════════════════════════════════════════════════════
     1. NAVIGATION BAR
══════════════════════════════════════════════════════════════════════ --}}
<x-navbar />

{{-- ══════════════════════════════════════════════════════════════════════
     2. HERO SECTION
══════════════════════════════════════════════════════════════════════ --}}
<x-hero />

{{-- ══════════════════════════════════════════════════════════════════════
     3. FEATURES SECTION
══════════════════════════════════════════════════════════════════════ --}}
<section id="features" class="py-20 lg:py-28 bg-so-bg" aria-labelledby="features-heading">
    <x-container>

        {{-- Section heading --}}
        <div class="flex justify-center mb-14">
            <x-section-heading
                label="Why Choose Sideout"
                title="Everything you need in <span class='gradient-text'>one great café.</span>"
                subtitle="From specialty drinks to a community-first loyalty program — here's what makes Sideout Café your Lumban spot."
            />
        </div>

        {{-- Feature cards grid – mobile:1 col, tablet:2 col, desktop:3 col --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" role="list">

            {{-- Feature 1: Specialty Coffee --}}
            <div role="listitem">
                <x-feature-card
                    title="Specialty Coffee"
                    description="Every cup at Sideout Café is crafted with care. Whether you prefer it hot, iced, or blended, the focus is always on a quality drink experience."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M17 8h1a4 4 0 0 1 0 8h-1\'/><path d=\'M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z\'/><line x1=\'6\' y1=\'2\' x2=\'6\' y2=\'4\'/><line x1=\'10\' y1=\'2\' x2=\'10\' y2=\'4\'/><line x1=\'14\' y1=\'2\' x2=\'14\' y2=\'4\'/></svg>'"
                />
            </div>

            {{-- Feature 2: Loyalty Rewards (verified from official site) --}}
            <div role="listitem">
                <x-feature-card
                    title="Loyalty Rewards"
                    description="Earn one point for every personal drink you purchase. Join the Sideout loyalty program and let every visit count toward exclusive rewards."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><polyline points=\'20 12 20 22 4 22 4 12\'/><rect x=\'2\' y=\'7\' width=\'20\' height=\'5\'/><line x1=\'12\' y1=\'22\' x2=\'12\' y2=\'7\'/><path d=\'M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z\'/><path d=\'M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z\'/></svg>'"
                />
            </div>

            {{-- Feature 3: Local Café Experience --}}
            <div role="listitem">
                <x-feature-card
                    title="Local Café Experience"
                    description="Rooted in Lumban, Laguna, Sideout Café brings a genuine local café experience — welcoming, relaxed, and community-driven."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z\'/><polyline points=\'9 22 9 12 15 12 15 22\'/></svg>'"
                />
            </div>

            {{-- Feature 4: Easy to Find --}}
            <div role="listitem">
                <x-feature-card
                    title="Easy to Find"
                    description="Located in Lumban, Laguna, Sideout Café is easy to discover. Drop a pin and navigate directly from your phone using Google Maps."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z\'/><circle cx=\'12\' cy=\'10\' r=\'3\'/></svg>'"
                />
            </div>

            {{-- Feature 5: Community & Comfort --}}
            <div role="listitem">
                <x-feature-card
                    title="Community & Comfort"
                    description="More than just a café — Sideout is a space where students, locals, and friends gather. Great energy, comfortable atmosphere, and good company."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\'/><circle cx=\'9\' cy=\'7\' r=\'4\'/><path d=\'M23 21v-2a4 4 0 0 0-3-3.87\'/><path d=\'M16 3.13a4 4 0 0 1 0 7.75\'/></svg>'"
                />
            </div>

            {{-- Feature 6: Mobile-Friendly Experience (redesigned website feature) --}}
            <div role="listitem">
                <x-feature-card
                    title="Mobile-Friendly Design"
                    description="This academic redesign is fully responsive — optimized for phones, tablets, and desktops. Designed mobile-first using Tailwind CSS breakpoints."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><rect x=\'5\' y=\'2\' width=\'14\' height=\'20\' rx=\'2\' ry=\'2\'/><line x1=\'12\' y1=\'18\' x2=\'12.01\' y2=\'18\'/></svg>'"
                />
            </div>

        </div>{{-- / feature cards grid --}}

        {{-- Feature extras row (2 more) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

            {{-- Feature 7: Simple Navigation --}}
            <div role="listitem">
                <x-feature-card
                    title="Simple Navigation"
                    description="Smooth scroll navigation, clear section anchors, and an accessible hamburger menu make this prototype easy to explore on any device."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><line x1=\'8\' y1=\'6\' x2=\'21\' y2=\'6\'/><line x1=\'8\' y1=\'12\' x2=\'21\' y2=\'12\'/><line x1=\'8\' y1=\'18\' x2=\'21\' y2=\'18\'/><line x1=\'3\' y1=\'6\' x2=\'3.01\' y2=\'6\'/><line x1=\'3\' y1=\'12\' x2=\'3.01\' y2=\'12\'/><line x1=\'3\' y1=\'18\' x2=\'3.01\' y2=\'18\'/></svg>'"
                />
            </div>

            {{-- Feature 8: Reusable Components --}}
            <div role="listitem">
                <x-feature-card
                    title="Reusable UI Components"
                    description="Built with Laravel Blade Components — every card, button, heading, and section is a reusable, maintainable component following DRY principles."
                    :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><rect x=\'3\' y=\'3\' width=\'7\' height=\'7\'/><rect x=\'14\' y=\'3\' width=\'7\' height=\'7\'/><rect x=\'14\' y=\'14\' width=\'7\' height=\'7\'/><rect x=\'3\' y=\'14\' width=\'7\' height=\'7\'/></svg>'"
                />
            </div>

        </div>

    </x-container>
</section>

{{-- ══════════════════════════════════════════════════════════════════════
     4. PRODUCT SHOWCASE SECTION
══════════════════════════════════════════════════════════════════════ --}}
<section id="showcase" class="py-20 lg:py-28 bg-so-surface" aria-labelledby="showcase-heading">
    <x-container>

        <div class="flex justify-center mb-14">
            <x-section-heading
                label="Digital Experience"
                title="Your Sideout experience, <span class='gradient-text'>reimagined.</span>"
                subtitle="A visual prototype of what a modern Sideout Café digital presence could look like — responsive, clear, and loyalty-focused."
            />
        </div>

        {{-- ── THREE SHOWCASE PANELS ───────────────────────────────────── --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-14">

            {{-- Panel A: Website Preview --}}
            <div class="lg:col-span-1 rounded-2xl border border-white/[0.06] bg-so-surface2 overflow-hidden
                        hover:border-so-accent/20 transition-colors duration-300">
                {{-- Fake browser chrome --}}
                <div class="flex items-center gap-1.5 px-4 py-3 border-b border-white/[0.06] bg-so-bg">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-500/60"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/60"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-green-500/60"></span>
                    <div class="flex-1 mx-3 h-5 rounded-md bg-so-surface flex items-center px-3">
                        <span class="text-[9px] text-so-muted/40 truncate">sideout-cafe.com · Academic prototype</span>
                    </div>
                </div>
                {{-- Fake page content --}}
                <div class="p-5 space-y-3" aria-hidden="true">
                    <div class="h-3 w-1/3 rounded bg-so-accent/20"></div>
                    <div class="h-6 w-4/5 rounded bg-white/5"></div>
                    <div class="h-4 w-3/4 rounded bg-white/[0.03]"></div>
                    <div class="h-4 w-2/3 rounded bg-white/[0.03]"></div>
                    <div class="flex gap-2 mt-4">
                        <div class="h-8 w-24 rounded-lg bg-so-accent/25"></div>
                        <div class="h-8 w-20 rounded-lg bg-white/5"></div>
                    </div>
                    <div class="mt-6 grid grid-cols-3 gap-2">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="h-16 rounded-lg bg-so-surface border border-white/[0.04]"></div>
                        @endfor
                    </div>
                </div>
                <div class="p-4 pt-0">
                    <p class="text-[10px] text-so-muted/40 text-center">
                        A — Website preview prototype
                    </p>
                </div>
            </div>

            {{-- Panel B: Loyalty Dashboard --}}
            <div class="lg:col-span-1 rounded-2xl border border-so-accent/15 bg-so-surface2 overflow-hidden
                        hover:border-so-accent/30 transition-colors duration-300">
                <div class="p-5 border-b border-white/[0.06]">
                    <x-badge color="green">Loyalty Dashboard</x-badge>
                </div>
                <div class="p-5 space-y-4">
                    {{-- Member row --}}
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-so-accent/10 border border-so-accent/20
                                    flex items-center justify-center">
                            <span class="text-so-accent font-bold text-xs">SM</span>
                        </div>
                        <div>
                            <p class="text-so-text text-sm font-semibold">Sample Member</p>
                            <p class="text-so-muted text-xs">Active Member</p>
                        </div>
                    </div>

                    {{-- Points --}}
                    <div class="grid grid-cols-2 gap-3">
                        <x-stat-card number="7" label="Points" />
                        <x-stat-card number="7" label="Drinks" />
                    </div>

                    {{-- Progress --}}
                    <div>
                        <div class="flex justify-between text-xs text-so-muted mb-2">
                            <span>Progress to reward</span>
                            <span class="text-so-accent font-semibold">7/10</span>
                        </div>
                        <div class="h-2 bg-so-bg rounded-full overflow-hidden">
                            <div class="h-full w-[70%] rounded-full bg-gradient-to-r from-so-accent to-so-accent2"></div>
                        </div>
                    </div>

                    {{-- Rule --}}
                    <div class="p-3 rounded-xl bg-so-bg border border-so-accent/10 text-xs text-so-muted">
                        <span class="text-so-accent font-semibold">1 drink</span> = <span class="text-so-text font-semibold">1 point</span>
                        <span class="text-so-muted/60"> per personal drink purchased</span>
                    </div>

                    <p class="text-[9px] text-so-muted/30 text-center">
                        B — Loyalty dashboard prototype · Academic prototype · ITST 302
                    </p>
                </div>
            </div>

            {{-- Panel C: Mobile View --}}
            <div class="lg:col-span-1 rounded-2xl border border-white/[0.06] bg-so-surface2 overflow-hidden
                        hover:border-white/[0.12] transition-colors duration-300">
                <div class="p-5 border-b border-white/[0.06]">
                    <x-badge color="gray">Mobile View</x-badge>
                </div>
                <div class="p-5 flex justify-center">
                    {{-- Phone frame --}}
                    <div class="relative w-36">
                        <div class="rounded-3xl border-2 border-so-muted/20 bg-so-bg overflow-hidden shadow-xl">
                            {{-- Phone notch --}}
                            <div class="h-6 bg-so-bg flex items-center justify-center">
                                <div class="w-12 h-1.5 rounded-full bg-so-surface2"></div>
                            </div>
                            {{-- Phone screen content (mini mockup) --}}
                            <div class="px-2 pb-4 space-y-2" aria-hidden="true">
                                <div class="h-2 w-1/2 rounded bg-so-accent/20"></div>
                                <div class="h-3 w-4/5 rounded bg-white/5"></div>
                                <div class="h-2 w-3/4 rounded bg-white/[0.03]"></div>
                                <div class="h-2 w-2/3 rounded bg-white/[0.03]"></div>
                                <div class="h-6 w-full rounded-lg bg-so-accent/20 mt-2"></div>
                                <div class="space-y-1.5 mt-3">
                                    @for ($i = 0; $i < 3; $i++)
                                        <div class="h-8 rounded-lg bg-so-surface border border-white/[0.04]"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <p class="text-[10px] text-so-muted/40 text-center">
                        C — Mobile responsive view
                    </p>
                </div>
            </div>

        </div>{{-- / panels --}}

        {{-- ── KEY HIGHLIGHTS ──────────────────────────────────────────── --}}
        <div class="rounded-2xl border border-white/[0.06] bg-so-surface2 p-8">
            <h3 class="text-so-text font-semibold text-base mb-6">Key Highlights</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ([
                    ['Responsive design',                'Built mobile-first with Tailwind CSS.'],
                    ['Loyalty-focused experience',       'Loyalty program prominently featured.'],
                    ['Easy location discovery',          'Google Maps integration throughout.'],
                    ['Clear CTAs',                       'Primary and secondary actions at every step.'],
                    ['Reusable UI Components',           'Built with Laravel Blade Components.'],
                    ['Mobile-first layout',              'Fluid at 375px all the way to 1920px.'],
                ] as [$highlight, $detail])
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 rounded-full bg-so-accent/10 flex items-center justify-center mt-0.5">
                            <svg class="w-3 h-3 text-so-accent" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                 stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-so-text text-sm font-medium">{{ $highlight }}</p>
                            <p class="text-so-muted text-xs mt-0.5">{{ $detail }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </x-container>
</section>

{{-- ══════════════════════════════════════════════════════════════════════
     5. PRICING SECTION
══════════════════════════════════════════════════════════════════════ --}}
<section id="pricing" class="py-20 lg:py-28 bg-so-bg" aria-labelledby="pricing-heading">
    <x-container>

        <div class="flex justify-center mb-6">
            <x-section-heading
                label="Sample Café Experience"
                title="Simple, <span class='gradient-text'>transparent</span> packages."
                subtitle="Example packages created for this academic prototype. These are NOT official Sideout Café prices or menu items."
            />
        </div>

        {{-- Academic disclaimer banner --}}
        <div class="flex items-center gap-3 p-4 rounded-xl border border-yellow-500/20 bg-yellow-500/5
                    mb-10 max-w-2xl mx-auto">
            <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13"/>
                <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
            <p class="text-xs text-yellow-300/80 leading-relaxed">
                <strong>Academic Prototype Disclaimer:</strong>
                All prices below are sample content created for ITST 302. They are not official Sideout Café pricing.
            </p>
        </div>

        {{-- Pricing cards – 3 columns --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-start">

            {{-- Plan 1: Starter --}}
            <x-pricing-card plan="Starter" price="₱149" cta-label="Get Started">
                @foreach ([
                    '1 sample drink selection',
                    'Loyalty point concept (1 pt)',
                    'Café visit experience',
                    'Standard seating',
                ] as $feature)
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-so-accent flex-shrink-0" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ $feature }}
                    </li>
                @endforeach
            </x-pricing-card>

            {{-- Plan 2: Regular (popular) --}}
            <x-pricing-card plan="Sideout Regular" price="₱249" :popular="true" cta-label="Get Started">
                @foreach ([
                    'Sample drink + snack concept',
                    'Loyalty reward progress (2 pts)',
                    'Priority promotional concept',
                    'Comfortable seating priority',
                    'Sample takeaway packaging',
                ] as $feature)
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-so-accent flex-shrink-0" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ $feature }}
                    </li>
                @endforeach
            </x-pricing-card>

            {{-- Plan 3: Crew --}}
            <x-pricing-card plan="Sideout Crew" price="₱399" cta-label="Get Started">
                @foreach ([
                    'Sample group package concept',
                    'Multiple loyalty reward concept',
                    'Community perk concept',
                    'Reserved group seating concept',
                    'Sample group takeaway concept',
                    'Shared loyalty experience',
                ] as $feature)
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-so-accent flex-shrink-0" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ $feature }}
                    </li>
                @endforeach
            </x-pricing-card>

        </div>

    </x-container>
</section>

{{-- ══════════════════════════════════════════════════════════════════════
     6. TESTIMONIALS SECTION
══════════════════════════════════════════════════════════════════════ --}}
<section id="testimonials" class="py-20 lg:py-28 bg-so-surface" aria-labelledby="testimonials-heading">
    <x-container>

        <div class="flex justify-center mb-6">
            <x-section-heading
                label="What People Say"
                title="Voices from the <span class='gradient-text'>community.</span>"
                subtitle="Sample testimonials shown for academic prototype purposes. These are not real customer reviews."
            />
        </div>

        {{-- Sample content disclaimer banner --}}
        <div class="flex items-center gap-3 p-4 rounded-xl border border-blue-500/20 bg-blue-500/5
                    mb-10 max-w-2xl mx-auto">
            <svg class="w-5 h-5 text-blue-400 flex-shrink-0" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <p class="text-xs text-blue-300/80 leading-relaxed">
                <strong>Sample Testimonials:</strong>
                The testimonials below are fictional sample content created for ITST 302.
                They are not real Sideout Café customer reviews.
            </p>
        </div>

        {{-- Testimonials grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <x-testimonial-card
                name="Sample Customer 01"
                position="Café Visitor"
                :stars="5"
                review="The café vibe in this prototype feels really welcoming and warm. The loyalty concept is a great idea — earning points for every drink makes me want to visit more often. A really solid concept!"
            />

            <x-testimonial-card
                name="Sample Customer 02"
                position="Student"
                :stars="5"
                review="As a student, having a local spot like Sideout Café in Lumban is a game changer. The idea of a loyalty program is brilliant. This prototype captures the community feeling really well."
            />

            <x-testimonial-card
                name="Sample Customer 03"
                position="Local Customer"
                :stars="4"
                review="The design of this academic prototype is clean and professional. Easy to navigate, and the loyalty dashboard section gives a great idea of how a real loyalty program UI could look."
            />

        </div>

    </x-container>
</section>

{{-- ══════════════════════════════════════════════════════════════════════
     7. CALL TO ACTION SECTION
══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-so-bg" aria-labelledby="cta-heading">
    <x-container>
        <div
            class="relative rounded-3xl overflow-hidden p-10 lg:p-16 text-center"
            style="background: linear-gradient(135deg, #111613 0%, #0d1a10 50%, #111613 100%);
                   border: 1px solid rgba(154,240,106,0.15);"
        >
            {{-- Background glow --}}
            <div
                aria-hidden="true"
                class="absolute inset-0 opacity-30 pointer-events-none"
                style="background: radial-gradient(ellipse at center, rgba(154,240,106,0.15) 0%, transparent 70%);"
            ></div>

            {{-- Content --}}
            <div class="relative z-10 flex flex-col items-center gap-6 max-w-2xl mx-auto">

                <x-badge color="green">Your next coffee stop</x-badge>

                <h2
                    id="cta-heading"
                    class="text-4xl sm:text-5xl font-bold tracking-tight text-so-text leading-tight"
                >
                    Make Sideout part of your<br>
                    <span class="gradient-text">next coffee stop.</span>
                </h2>

                <p class="text-so-muted text-lg leading-relaxed">
                    Join the loyalty program, find the café on the map, or explore the official
                    Sideout Café website. Every visit earns you a point.
                </p>

                <div class="flex flex-wrap justify-center gap-3">
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
                    <x-button
                        variant="secondary"
                        href="#contact"
                    >
                        Contact
                    </x-button>
                </div>

                <p class="text-xs text-so-muted/40 mt-2">
                    Links connect to the official Sideout Café website and Google Maps listing.
                </p>

            </div>
        </div>
    </x-container>
</section>

{{-- ══════════════════════════════════════════════════════════════════════
     8. FOOTER
══════════════════════════════════════════════════════════════════════ --}}
<x-footer />

@endsection
