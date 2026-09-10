{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-footer>                                                         │
    │  Premium dark footer for Sideout Café                               │
    │                                                                     │
    │  4 columns:                                                         │
    │   1. Brand + tagline                                                │
    │   2. Quick links                                                    │
    │   3. Find Us (Google Maps link)                                     │
    │   4. Official links + social placeholders                           │
    │                                                                     │
    │  Verified information:                                              │
    │   – Business name: Sideout Café                                     │
    │   – Location: Lumban, Laguna, Philippines 4014                      │
    │   – Loyalty program: 1 point per personal drink                     │
    │   – Official website: https://www.sideout-cafe.com/                 │
    │   – Google Maps: https://maps.app.goo.gl/cUTeXGX83iXzW5D18         │
    │                                                                     │
    │  ⚠ Phone, email, and social handles are NOT provided as they        │
    │    cannot be verified from the official website.                    │
    └─────────────────────────────────────────────────────────────────────┘
--}}

<footer
    id="contact"
    role="contentinfo"
    class="relative border-t border-white/[0.06] bg-so-surface overflow-hidden"
>
    {{-- Subtle background glow --}}
    <div
        aria-hidden="true"
        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-96 h-48 opacity-10 pointer-events-none"
        style="background: radial-gradient(ellipse, #9AF06A 0%, transparent 70%);"
    ></div>

    <x-container class="relative z-10 py-14 lg:py-20">

        {{-- ── MAIN GRID ──────────────────────────────────────────────── --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">

            {{-- Column 1 – Brand --}}
            <div class="sm:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-2.5 mb-4">
                    <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-so-accent/10 border border-so-accent/25"
                          aria-hidden="true">
                        <svg class="w-4 h-4 text-so-accent" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                            <line x1="6" y1="2" x2="6" y2="4"/>
                            <line x1="10" y1="2" x2="10" y2="4"/>
                            <line x1="14" y1="2" x2="14" y2="4"/>
                        </svg>
                    </span>
                    <span class="font-bold text-so-text">Sideout<span class="text-so-accent">Café</span></span>
                </div>
                <p class="text-so-muted text-sm leading-relaxed mb-4">
                    Your local coffee destination in Lumban, Laguna. A warm space
                    for community, good drinks, and rewarding loyalty.
                </p>
                <div class="flex flex-col gap-1 text-xs text-so-muted/60">
                    <span>Lumban, Laguna</span>
                    <span>Philippines 4014</span>
                </div>
            </div>

            {{-- Column 2 – Quick Links --}}
            <div>
                <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-5">
                    Quick Links
                </h3>
                <ul class="flex flex-col gap-3" role="list">
                    @foreach ([
                        ['#home',         'Home'],
                        ['#features',     'Features'],
                        ['#pricing',      'Pricing'],
                        ['#testimonials', 'Testimonials'],
                        ['#contact',      'Contact'],
                    ] as [$href, $label])
                        <li>
                            <a
                                href="{{ $href }}"
                                class="text-so-muted text-sm hover:text-so-text
                                       transition-colors duration-200 focus:outline-none focus:text-so-accent"
                            >
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3 – Find Us --}}
            <div>
                <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-5">
                    Find Us
                </h3>
                <div class="flex flex-col gap-4">
                    <a
                        href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group flex items-start gap-3 text-so-muted text-sm hover:text-so-text
                               transition-colors duration-200 focus:outline-none focus:text-so-accent"
                        aria-label="Open Sideout Café location on Google Maps"
                    >
                        <svg class="w-4 h-4 text-so-accent flex-shrink-0 mt-0.5 group-hover:text-so-accent2
                                   transition-colors duration-200"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>
                            Lumban, Laguna, Philippines 4014
                            <span class="block text-xs text-so-accent/60 mt-0.5">
                                View on Google Maps ↗
                            </span>
                        </span>
                    </a>

                    {{-- Loyalty note --}}
                    <div class="p-3 rounded-xl bg-so-surface2 border border-so-accent/10">
                        <p class="text-xs text-so-muted leading-relaxed">
                            <span class="text-so-accent font-semibold">Loyalty program:</span>
                            Earn 1 point for every personal drink purchased.
                        </p>
                        <p class="text-[10px] text-so-muted/40 mt-1">
                            ↳ Source: sideout-cafe.com
                        </p>
                    </div>
                </div>
            </div>

            {{-- Column 4 – Official Links --}}
            <div>
                <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-5">
                    Official Links
                </h3>
                <div class="flex flex-col gap-3">
                    <a
                        href="https://www.sideout-cafe.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center gap-2 text-so-muted text-sm hover:text-so-accent
                               transition-colors duration-200 focus:outline-none focus:text-so-accent"
                        aria-label="Visit the official Sideout Café website (opens in new tab)"
                    >
                        <svg class="w-4 h-4 text-so-muted/50" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="2" y1="12" x2="22" y2="12"/>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                        Official Website ↗
                    </a>
                    <a
                        href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center gap-2 text-so-muted text-sm hover:text-so-accent
                               transition-colors duration-200 focus:outline-none focus:text-so-accent"
                        aria-label="View Sideout Café on Google Maps (opens in new tab)"
                    >
                        <svg class="w-4 h-4 text-so-muted/50" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        Google Maps ↗
                    </a>
                    <a
                        href="https://www.sideout-cafe.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center gap-2 text-so-muted text-sm hover:text-so-accent
                               transition-colors duration-200 focus:outline-none focus:text-so-accent"
                        aria-label="Join the Sideout Café loyalty program (opens in new tab)"
                    >
                        <svg class="w-4 h-4 text-so-muted/50" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <polyline points="20 12 20 22 4 22 4 12"/>
                            <rect x="2" y="7" width="20" height="5"/>
                            <line x1="12" y1="22" x2="12" y2="7"/>
                            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/>
                            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>
                        </svg>
                        Join Loyalty ↗
                    </a>
                </div>

                <div class="mt-6">
                    <p class="text-xs text-so-muted/40 leading-relaxed">
                        Social media handles not included — could not be verified from official sources.
                    </p>
                </div>
            </div>

        </div>{{-- / main grid --}}

        {{-- ── FOOTER BOTTOM BAR ───────────────────────────────────────── --}}
        <div class="mt-14 pt-6 border-t border-white/[0.06] flex flex-col sm:flex-row
                    items-center justify-between gap-4 text-xs text-so-muted/40">
            <p>
                &copy; {{ date('Y') }} Sideout Café · Lumban, Laguna, Philippines
            </p>
            <p class="text-center sm:text-right leading-relaxed">
                Academic redesign · ITST 302 – Client-Server Technologies · Week 5<br>
                <span class="text-so-muted/25">
                    Not the official Sideout Café website · For educational/portfolio purposes only
                </span>
            </p>
        </div>

    </x-container>
</footer>