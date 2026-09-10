{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-navbar>                                                         │
    │  Responsive sticky navigation bar                                   │
    │                                                                     │
    │  Features:                                                          │
    │   – Fixed/sticky top with backdrop blur                             │
    │   – Desktop nav links (Home, Features, Pricing, Testimonials,       │
    │     Contact)                                                        │
    │   – Sign In + Get Started action buttons                            │
    │   – Mobile hamburger toggle (vanilla JS, no external library)       │
    │   – Mobile slide-down menu panel                                    │
    │   – Keyboard accessible (ARIA labels + focus states)                │
    └─────────────────────────────────────────────────────────────────────┘
--}}

<header
    id="navbar"
    role="banner"
    class="fixed top-0 left-0 right-0 z-50 border-b border-white/[0.06]"
    style="background: rgba(10,13,11,0.85); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);"
>
    <x-container>
        <nav role="navigation" aria-label="Main navigation" class="flex items-center justify-between h-16">

            {{-- ── BRAND LOGO ──────────────────────────────────────────── --}}
            <a
                href="#home"
                class="flex items-center gap-2.5 group flex-shrink-0"
                aria-label="Sideout Café – Home"
            >
                {{-- Leaf / brand mark icon --}}
                <span
                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-so-accent/10
                           border border-so-accent/25 group-hover:bg-so-accent/20 transition-colors duration-300"
                    aria-hidden="true"
                >
                    <svg class="w-4 h-4 text-so-accent" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                        <line x1="6" y1="2" x2="6" y2="4"/>
                        <line x1="10" y1="2" x2="10" y2="4"/>
                        <line x1="14" y1="2" x2="14" y2="4"/>
                    </svg>
                </span>
                <span class="font-bold text-base text-so-text tracking-tight leading-none">
                    Sideout<span class="text-so-accent">Café</span>
                </span>
            </a>

            {{-- ── DESKTOP NAV LINKS ───────────────────────────────────── --}}
            <ul
                class="hidden md:flex items-center gap-1"
                role="list"
                aria-label="Page sections"
            >
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
                            class="px-3 py-2 rounded-lg text-sm font-medium text-so-muted
                                   hover:text-so-text hover:bg-white/5 transition-all duration-200
                                   focus:outline-none focus:ring-2 focus:ring-so-accent/50"
                        >
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- ── DESKTOP ACTION BUTTONS ──────────────────────────────── --}}
            <div class="hidden md:flex items-center gap-2">
                <x-button
                    variant="ghost"
                    href="https://www.sideout-cafe.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Sign In
                </x-button>
                <x-button
                    variant="primary"
                    href="https://www.sideout-cafe.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Get Started
                </x-button>
            </div>

            {{-- ── MOBILE HAMBURGER BUTTON ─────────────────────────────── --}}
            <button
                id="mobile-menu-btn"
                type="button"
                onclick="toggleMobileMenu()"
                aria-controls="mobile-menu"
                aria-expanded="false"
                aria-label="Open navigation menu"
                class="md:hidden flex items-center justify-center w-10 h-10 rounded-xl
                       text-so-muted hover:text-so-text hover:bg-white/5
                       transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-so-accent/50"
            >
                {{-- Hamburger icon (shown by default) --}}
                <svg id="icon-menu" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <line x1="3" y1="6"  x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
                {{-- X / close icon (hidden by default) --}}
                <svg id="icon-close" class="w-5 h-5 hidden" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <line x1="18" y1="6"  x2="6"  y2="18"/>
                    <line x1="6"  y1="6"  x2="18" y2="18"/>
                </svg>
            </button>

        </nav>
    </x-container>

    {{-- ── MOBILE MENU PANEL ───────────────────────────────────────────── --}}
    <div
        id="mobile-menu"
        class="md:hidden border-t border-white/[0.06] max-h-0 overflow-hidden"
        style="transition: max-height 0.35s ease-in-out; background: rgba(10,13,11,0.95);"
        role="region"
        aria-label="Mobile navigation"
    >
        <x-container class="py-4">
            <ul class="flex flex-col gap-1" role="list">
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
                            onclick="closeMobileMenu()"
                            class="flex items-center px-3 py-3 rounded-xl text-sm font-medium
                                   text-so-muted hover:text-so-text hover:bg-white/5
                                   transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-so-accent/50"
                        >
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="flex flex-col gap-2 mt-4 pt-4 border-t border-white/[0.06]">
                <x-button variant="secondary" href="https://www.sideout-cafe.com/"
                          class="w-full" target="_blank" rel="noopener noreferrer">
                    Sign In
                </x-button>
                <x-button variant="primary" href="https://www.sideout-cafe.com/"
                          class="w-full" target="_blank" rel="noopener noreferrer">
                    Get Started
                </x-button>
            </div>
        </x-container>
    </div>
</header>

{{-- ── MOBILE MENU JAVASCRIPT (vanilla JS, no external libraries) ──────────── --}}
<script>
    (function () {
        var isOpen = false;

        function toggleMobileMenu() {
            isOpen ? closeMobileMenu() : openMobileMenu();
        }

        function openMobileMenu() {
            isOpen = true;
            var menu   = document.getElementById('mobile-menu');
            var btn    = document.getElementById('mobile-menu-btn');
            var iMenu  = document.getElementById('icon-menu');
            var iClose = document.getElementById('icon-close');

            menu.style.maxHeight = menu.scrollHeight + 'px';
            btn.setAttribute('aria-expanded', 'true');
            btn.setAttribute('aria-label', 'Close navigation menu');
            iMenu.classList.add('hidden');
            iClose.classList.remove('hidden');
        }

        function closeMobileMenu() {
            isOpen = false;
            var menu   = document.getElementById('mobile-menu');
            var btn    = document.getElementById('mobile-menu-btn');
            var iMenu  = document.getElementById('icon-menu');
            var iClose = document.getElementById('icon-close');

            menu.style.maxHeight = '0';
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-label', 'Open navigation menu');
            iMenu.classList.remove('hidden');
            iClose.classList.add('hidden');
        }

        // Expose to inline onclick handlers
        window.toggleMobileMenu = toggleMobileMenu;
        window.closeMobileMenu  = closeMobileMenu;

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isOpen) closeMobileMenu();
        });

        // Close when clicking a nav link (smooth scroll, then close)
        document.querySelectorAll('#mobile-menu a[href^="#"]').forEach(function (link) {
            link.addEventListener('click', function () {
                setTimeout(closeMobileMenu, 50);
            });
        });
    })();
</script>