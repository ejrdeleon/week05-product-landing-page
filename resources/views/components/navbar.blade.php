{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-navbar>                                                         │
    │  Responsive sticky navigation bar                                   │
    │                                                                     │
    │  Features:                                                          │
    │   – Fixed/sticky top with backdrop blur                             │
    │   – Desktop nav links (Home, Menu, About, Contact)                  │
    │   – Mobile hamburger toggle (vanilla JS, no external library)       │
    │   – Mobile slide-down menu panel                                    │
    │   – Keyboard accessible (ARIA labels + focus states)                │
    └─────────────────────────────────────────────────────────────────────┘
--}}

<header
    id="navbar"
    role="banner"
    class="fixed top-0 left-0 right-0 z-50 border-b border-white/10 bg-[#0b120d]/90 backdrop-blur-lg"
>
    <x-container>
        <nav role="navigation" aria-label="Main navigation" class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group flex-shrink-0" aria-label="Sideout Café home">
                <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-so-accent/10 border border-so-accent/25 text-so-accent" aria-hidden="true">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                        <line x1="6" y1="2" x2="6" y2="4"/>
                        <line x1="10" y1="2" x2="10" y2="4"/>
                        <line x1="14" y1="2" x2="14" y2="4"/>
                    </svg>
                </span>
                <span class="text-xl font-bold tracking-tight text-so-text">Sideout<span class="text-so-accent">Café</span></span>
            </a>

            <ul class="hidden md:flex items-center gap-1" role="list" aria-label="Main menu">
                @foreach ([
                    ['route' => 'home', 'label' => 'Home'],
                    ['route' => 'menu', 'label' => 'Menu'],
                    ['route' => 'about', 'label' => 'About'],
                    ['route' => 'loyalty', 'label' => 'Loyalty'],
                    ['route' => 'contact', 'label' => 'Contact'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($link['route']) ? 'text-so-text bg-white/5' : 'text-so-muted hover:text-so-text hover:bg-white/5' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="hidden md:flex items-center gap-3">
                <x-button variant="ghost" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer">Find Us</x-button>
                <x-button variant="primary" href="{{ route('menu') }}">View Menu</x-button>
            </div>

            <button id="mobile-menu-btn" type="button" onclick="toggleMobileMenu()" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open navigation menu" class="md:hidden flex items-center justify-center w-11 h-11 rounded-xl text-so-muted hover:text-so-text hover:bg-white/5 transition-colors">
                <svg id="icon-menu" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
                <svg id="icon-close" class="hidden w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </nav>
    </x-container>

    <div id="mobile-menu" class="md:hidden border-t border-white/10 max-h-0 overflow-hidden bg-[#0b120d]/95" style="transition: max-height 0.35s ease-in-out;" role="region" aria-label="Mobile navigation">
        <x-container class="py-4">
            <ul class="flex flex-col gap-1" role="list">
                @foreach ([
                    ['route' => 'home', 'label' => 'Home'],
                    ['route' => 'menu', 'label' => 'Menu'],
                    ['route' => 'about', 'label' => 'About'],
                    ['route' => 'loyalty', 'label' => 'Loyalty'],
                    ['route' => 'contact', 'label' => 'Contact'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" onclick="closeMobileMenu()" class="flex items-center px-3 py-3 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs($link['route']) ? 'text-so-text bg-white/5' : 'text-so-muted hover:text-so-text hover:bg-white/5' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="flex flex-col gap-2 mt-4 pt-4 border-t border-white/10">
                <x-button variant="secondary" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" class="w-full" target="_blank" rel="noopener noreferrer">Find Us</x-button>
                <x-button variant="primary" href="{{ route('menu') }}" class="w-full">View Menu</x-button>
            </div>
        </x-container>
    </div>
</header>

<script>
    (function () {
        var isOpen = false;
        function toggleMobileMenu() { isOpen ? closeMobileMenu() : openMobileMenu(); }
        function openMobileMenu() {
            isOpen = true;
            var menu = document.getElementById('mobile-menu');
            var btn = document.getElementById('mobile-menu-btn');
            var iconMenu = document.getElementById('icon-menu');
            var iconClose = document.getElementById('icon-close');
            menu.style.maxHeight = menu.scrollHeight + 'px';
            btn.setAttribute('aria-expanded', 'true');
            btn.setAttribute('aria-label', 'Close navigation menu');
            iconMenu.classList.add('hidden');
            iconClose.classList.remove('hidden');
        }
        function closeMobileMenu() {
            isOpen = false;
            var menu = document.getElementById('mobile-menu');
            var btn = document.getElementById('mobile-menu-btn');
            var iconMenu = document.getElementById('icon-menu');
            var iconClose = document.getElementById('icon-close');
            menu.style.maxHeight = '0';
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-label', 'Open navigation menu');
            iconMenu.classList.remove('hidden');
            iconClose.classList.add('hidden');
        }
        window.toggleMobileMenu = toggleMobileMenu;
        window.closeMobileMenu = closeMobileMenu;
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isOpen) closeMobileMenu();
        });
    })();
</script>
