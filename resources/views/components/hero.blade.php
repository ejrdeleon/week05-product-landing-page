<section id="home" class="relative overflow-hidden bg-so-bg pt-[68px]" aria-labelledby="hero-heading">

    <div aria-hidden="true" class="pointer-events-none absolute top-0 left-0 w-[600px] h-[500px] bg-[radial-gradient(ellipse_at_top_left,_rgba(154,240,106,0.10),transparent_65%)]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-[1fr_420px] xl:grid-cols-[1fr_460px] gap-0 lg:min-h-0">

            {{-- Left: editorial headline --}}
            <div class="flex flex-col justify-center py-16 lg:py-24 xl:py-28 lg:pr-12 xl:pr-16">

                <div class="flex items-center gap-2 mb-7">
                    <span class="w-5 h-px bg-so-accent/60"></span>
                    <span class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Lumban, Laguna</span>
                </div>

                <h1 id="hero-heading" class="text-[clamp(2.6rem,7vw,5.5rem)] font-black leading-[0.95] tracking-[-0.04em] text-so-text">
                    Where every<br>
                    <em class="not-italic gradient-text">cup</em> feels<br>
                    like home.
                </h1>

                <p class="mt-7 text-base sm:text-lg leading-7 text-so-muted max-w-md">
                    A neighborhood coffee stop in Lumban, Laguna. Good drinks, easy company, and a loyalty program that rewards every visit.
                </p>

                <div class="mt-9 flex flex-wrap items-center gap-3">
                    <a href="{{ route('menu') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors duration-200">
                        View the Menu
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-white/[0.15] text-so-muted text-sm font-medium hover:text-so-text hover:border-white/[0.25] transition-colors duration-200">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Find Us
                    </a>
                </div>

                <div class="mt-12 pt-8 border-t border-white/[0.07] flex flex-wrap items-center gap-6 sm:gap-8">
                    <div>
                        <p class="text-2xl font-bold text-so-text">1 pt</p>
                        <p class="text-xs text-so-muted mt-0.5">per personal drink</p>
                    </div>
                    <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                    <div>
                        <p class="text-2xl font-bold text-so-text">Free</p>
                        <p class="text-xs text-so-muted mt-0.5">loyalty rewards</p>
                    </div>
                    <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                    <div>
                        <p class="text-2xl font-bold text-so-text">Local</p>
                        <p class="text-xs text-so-muted mt-0.5">Lumban, Laguna</p>
                    </div>
                </div>
            </div>

            {{-- Right: café card panel --}}
            <div class="hidden lg:flex flex-col justify-center py-16 lg:py-24 xl:py-28">
                <div class="relative">
                    <div class="rounded-2xl bg-so-surface border border-white/[0.08] overflow-hidden">
                        {{-- Top atmosphere --}}
                        <div class="relative h-52 bg-gradient-to-br from-[#1a2e1a] via-[#0f1a10] to-[#0a0d0b] flex items-center justify-center overflow-hidden">
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_40%,rgba(154,240,106,0.12),transparent_60%)]"></div>
                            <div class="relative z-10 flex flex-col items-center gap-2">
                                <div class="relative">
                                    <div class="flex gap-2 justify-center mb-2" aria-hidden="true">
                                        <div class="w-0.5 h-4 rounded-full bg-so-accent/30" style="animation: steam1 2s ease-in-out infinite;"></div>
                                        <div class="w-0.5 h-5 rounded-full bg-so-accent/20" style="animation: steam2 2s ease-in-out infinite 0.3s;"></div>
                                        <div class="w-0.5 h-3 rounded-full bg-so-accent/30" style="animation: steam1 2s ease-in-out infinite 0.6s;"></div>
                                    </div>
                                    <div class="w-20 h-16 rounded-b-[2rem] rounded-t-lg bg-gradient-to-b from-[#1e3320] to-[#0d1a0f] border border-so-accent/20 relative overflow-hidden">
                                        <div class="absolute inset-x-0 top-0 h-3 bg-gradient-to-b from-so-accent/10 to-transparent"></div>
                                        <div class="absolute inset-x-2 top-2 h-2 rounded-full bg-gradient-to-r from-[#2a4a2e] via-[#3a6040] to-[#2a4a2e] opacity-80"></div>
                                    </div>
                                    <div class="absolute right-[-10px] top-3 w-4 h-8 rounded-r-full border-2 border-so-accent/20 border-l-0"></div>
                                    <div class="w-24 h-2 rounded-full bg-gradient-to-b from-[#1a2e1a] to-[#0f1a10] border border-so-accent/15 mx-auto mt-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <p class="text-[10px] uppercase tracking-[0.22em] text-so-muted font-medium">Today's pick</p>
                                    <p class="text-lg font-bold text-so-text mt-0.5">Sideout Signature</p>
                                </div>
                                <span class="text-xl font-bold text-so-accent">₱150</span>
                            </div>

                            <div class="space-y-0">
                                <div class="flex items-center justify-between py-2.5 border-t border-white/[0.06]">
                                    <span class="text-sm text-so-muted">Iced Latte</span>
                                    <span class="text-sm font-medium text-so-text">₱120</span>
                                </div>
                                <div class="flex items-center justify-between py-2.5 border-t border-white/[0.06]">
                                    <span class="text-sm text-so-muted">Matcha Refresher</span>
                                    <span class="text-sm font-medium text-so-text">₱135</span>
                                </div>
                                <div class="flex items-center justify-between py-2.5 border-t border-white/[0.06]">
                                    <span class="text-sm text-so-muted">Loyalty points</span>
                                    <span class="text-sm font-semibold text-so-accent">1 per drink</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating loyalty badge --}}
                    <div class="absolute -bottom-4 -left-4 bg-so-surface2 border border-so-accent/25 rounded-xl px-4 py-3 shadow-xl shadow-black/40">
                        <p class="text-[10px] uppercase tracking-[0.2em] text-so-muted">Loyalty</p>
                        <p class="text-sm font-bold text-so-text mt-0.5">7 / 10 points</p>
                        <div class="mt-1.5 w-28 h-1 rounded-full bg-so-bg overflow-hidden">
                            <div class="h-full w-[70%] rounded-full bg-so-accent"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        @keyframes steam1 {
            0%, 100% { transform: translateY(0) scaleX(1); opacity: 0.3; }
            50% { transform: translateY(-6px) scaleX(0.8); opacity: 0.6; }
        }
        @keyframes steam2 {
            0%, 100% { transform: translateY(0) scaleX(1); opacity: 0.2; }
            50% { transform: translateY(-8px) scaleX(0.7); opacity: 0.5; }
        }
    </style>
</section>
