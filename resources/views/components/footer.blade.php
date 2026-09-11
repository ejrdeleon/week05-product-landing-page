<footer role="contentinfo" class="border-t border-white/10 bg-[#0b120d]">
    <x-container class="py-14 lg:py-18">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl border border-so-accent/25 bg-so-accent/10 text-so-accent" aria-hidden="true">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                            <line x1="6" y1="2" x2="6" y2="4"/>
                            <line x1="10" y1="2" x2="10" y2="4"/>
                            <line x1="14" y1="2" x2="14" y2="4"/>
                        </svg>
                    </span>
                    <span class="text-xl font-bold text-so-text">Sideout<span class="text-so-accent">Café</span></span>
                </div>
                <p class="max-w-xs text-sm leading-6 text-so-muted">
                    A local coffee spot in Lumban, Laguna where every cup feels like a small pause in the day.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.22em] text-so-text">Navigation</h3>
                <ul class="space-y-3 text-sm text-so-muted">
                    <li><a href="{{ route('home') }}" class="hover:text-so-text">Home</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-so-text">Menu</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-so-text">About</a></li>
                    <li><a href="{{ route('loyalty') }}" class="hover:text-so-text">Loyalty</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-so-text">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.22em] text-so-text">Visit Us</h3>
                <div class="space-y-3 text-sm text-so-muted">
                    <p>Sideout Café</p>
                    <p>Lumban, Laguna</p>
                    <p>Philippines</p>
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-so-accent hover:text-so-accent2">Get Directions</a>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.22em] text-so-text">Loyalty</h3>
                <div class="rounded-2xl border border-so-accent/20 bg-so-surface2 p-4 text-sm text-so-muted">
                    <p class="font-semibold text-so-text">1 personal drink = 1 point</p>
                    <p class="mt-2 leading-6">Your next regular keeps the progress moving.</p>
                </div>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-xs text-so-muted/70 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} Sideout Café</p>
            <p>Lumban, Laguna, Philippines</p>
        </div>
    </x-container>
</footer>
