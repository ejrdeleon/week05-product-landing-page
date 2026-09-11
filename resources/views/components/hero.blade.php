<section id="home" class="relative overflow-hidden bg-[#09110d] pt-28 pb-20 md:pt-32 md:pb-24" aria-labelledby="hero-heading">
    <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(154,240,106,0.18),transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(154,240,106,0.12),transparent_30%)]"></div>
    <x-container class="relative z-10">
        <div class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16">
            <div class="max-w-2xl">
                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-so-accent/30 bg-so-accent/10 px-3 py-1.5 text-xs font-medium uppercase tracking-[0.2em] text-so-accent">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    Lumban, Laguna
                </div>

                <p class="mb-3 text-sm font-medium uppercase tracking-[0.32em] text-so-muted">Sideout Café</p>
                <h1 id="hero-heading" class="text-5xl font-black leading-none tracking-[-0.06em] text-so-text sm:text-6xl lg:text-8xl">
                    Coffee, conversations,<br>
                    and a place to slow down.
                </h1>

                <p class="mt-6 max-w-xl text-base leading-7 text-so-muted sm:text-lg">
                    A local coffee stop for good drinks, easy company, and a warm place to stay just a little longer.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <x-button variant="primary" href="{{ route('menu') }}">View Menu</x-button>
                    <x-button variant="outline" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer">Find Us</x-button>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-md">
                <div class="absolute -inset-6 rounded-full bg-so-accent/10 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-[#101910]/90 p-5 shadow-2xl shadow-black/30">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.25em] text-so-muted">Today’s pick</p>
                            <h2 class="mt-1 text-2xl font-bold text-so-text">Creamy Mocha</h2>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-so-accent/12 text-2xl text-so-accent">☕</div>
                    </div>

                    <div class="relative mb-6 overflow-hidden rounded-[1.5rem] bg-gradient-to-br from-[#223127] to-[#0d1a11] p-6">
                        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="relative mx-auto flex h-40 w-40 items-center justify-center rounded-full border border-so-accent/25 bg-[#1a2b1e] shadow-[inset_0_0_20px_rgba(154,240,106,0.15)]">
                            <div class="relative h-20 w-20 rounded-full border-[10px] border-so-accent/60 bg-[#d8f7c0] shadow-[0_0_35px_rgba(154,240,106,0.25)]"></div>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-so-muted">
                        <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-so-surface2 px-4 py-3">
                            <span>Espresso</span>
                            <span class="font-semibold text-so-text">₱120</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-so-surface2 px-4 py-3">
                            <span>Matcha Refresher</span>
                            <span class="font-semibold text-so-text">₱135</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-so-surface2 px-4 py-3">
                            <span>1 drink = 1 point</span>
                            <span class="font-semibold text-so-accent">Earn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</section>