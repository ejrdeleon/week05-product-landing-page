<footer role="contentinfo" class="bg-so-surface border-t border-white/[0.07]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-16">

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1fr]">

            <div class="space-y-4">
                <div class="flex items-center gap-2.5">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-so-accent/10 border border-so-accent/20 text-so-accent" aria-hidden="true">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                            <line x1="6" y1="2" x2="6" y2="4"/>
                            <line x1="10" y1="2" x2="10" y2="4"/>
                            <line x1="14" y1="2" x2="14" y2="4"/>
                        </svg>
                    </span>
                    <span class="text-sm font-bold tracking-[0.18em] text-so-text uppercase">Sideout Cafe</span>
                </div>
                <p class="text-sm leading-6 text-so-muted max-w-xs">
                    A local coffee spot in Lumban, Laguna where every cup feels like a small pause in the day.
                </p>
                <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-1.5 text-xs text-so-muted hover:text-so-accent transition-colors">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    sideout-cafe.com
                </a>
            </div>

            <div>
                <h3 class="mb-4 text-xs font-semibold uppercase tracking-[0.22em] text-so-text">Pages</h3>
                <ul class="space-y-2.5 text-sm text-so-muted">
                    <li><a href="{{ route('home') }}"    class="hover:text-so-text transition-colors">Home</a></li>
                    <li><a href="{{ route('menu') }}"    class="hover:text-so-text transition-colors">Menu</a></li>
                    <li><a href="{{ route('about') }}"   class="hover:text-so-text transition-colors">About</a></li>
                    <li><a href="{{ route('loyalty') }}" class="hover:text-so-text transition-colors">Loyalty</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-so-text transition-colors">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-xs font-semibold uppercase tracking-[0.22em] text-so-text">Visit</h3>
                <div class="space-y-2.5 text-sm text-so-muted">
                    <p>Lumban, Laguna</p>
                    <p>Philippines 4014</p>
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 text-so-accent hover:text-so-accent2 transition-colors">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Get Directions
                    </a>
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-xs font-semibold uppercase tracking-[0.22em] text-so-text">Loyalty</h3>
                <div class="space-y-2.5 text-sm text-so-muted">
                    <p>1 personal drink</p>
                    <p>= 1 loyalty point</p>
                    <a href="{{ route('loyalty') }}" class="inline-flex items-center gap-1.5 text-so-accent hover:text-so-accent2 transition-colors">
                        Join the program →
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-white/[0.07] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-so-muted/60">
            <p>© {{ date('Y') }} Sideout Cafe · Lumban, Laguna, Philippines</p>
            <p class="text-so-muted/40">Academic redesign · ITST 302</p>
        </div>
    </div>
</footer>
