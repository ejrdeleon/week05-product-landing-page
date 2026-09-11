<header
    id="navbar"
    role="banner"
    class="fixed top-0 left-0 right-0 z-50 border-b border-white/[0.06] bg-so-bg/95 backdrop-blur-md"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav role="navigation" aria-label="Main navigation" class="flex items-center justify-between h-[68px]">

            <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0" aria-label="Sideout Cafe home">
                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-so-accent/10 border border-so-accent/20 text-so-accent" aria-hidden="true">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 8h1a4 4 0 0 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/>
                        <line x1="6" y1="2" x2="6" y2="4"/>
                        <line x1="10" y1="2" x2="10" y2="4"/>
                        <line x1="14" y1="2" x2="14" y2="4"/>
                    </svg>
                </span>
                <span class="text-sm font-bold tracking-[0.18em] text-so-text uppercase">Sideout Cafe</span>
            </a>

            <ul class="hidden md:flex items-center gap-0.5" role="list">
                @foreach ([
                    ['route' => 'home',    'label' => 'Home'],
                    ['route' => 'menu',    'label' => 'Menu'],
                    ['route' => 'about',   'label' => 'About'],
                    ['route' => 'loyalty', 'label' => 'Loyalty'],
                    ['route' => 'contact', 'label' => 'Contact'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}"
                           class="px-3.5 py-2 rounded-lg text-sm transition-colors duration-200 {{ request()->routeIs($link['route']) ? 'text-so-accent font-medium' : 'text-so-muted hover:text-so-text' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="hidden md:flex items-center gap-3">
                <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer" class="text-sm text-so-muted hover:text-so-text transition-colors duration-200">Official Site</a>
                <a href="{{ route('menu') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-so-accent text-so-bg text-sm font-semibold hover:bg-so-accent2 transition-colors duration-200">
                    View Menu
                </a>
            </div>

            <button
                id="mobile-menu-btn"
                type="button"
                onclick="toggleMobileMenu()"
                aria-controls="mobile-menu"
                aria-expanded="false"
                aria-label="Open navigation menu"
                class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-so-muted hover:text-so-text hover:bg-white/5 transition-colors"
            >
                <svg id="icon-menu" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="3" y1="7" x2="21" y2="7"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="9" y1="17" x2="21" y2="17"/>
                </svg>
                <svg id="icon-close" class="hidden w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </nav>
    </div>

    <div
        id="mobile-menu"
        class="md:hidden border-t border-white/[0.06] max-h-0 bg-so-bg"
        role="region"
        aria-label="Mobile navigation"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5">
            <ul class="flex flex-col gap-1" role="list">
                @foreach ([
                    ['route' => 'home',    'label' => 'Home'],
                    ['route' => 'menu',    'label' => 'Menu'],
                    ['route' => 'about',   'label' => 'About'],
                    ['route' => 'loyalty', 'label' => 'Loyalty'],
                    ['route' => 'contact', 'label' => 'Contact'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}"
                           onclick="closeMobileMenu()"
                           class="flex items-center px-3 py-3 rounded-xl text-sm transition-colors {{ request()->routeIs($link['route']) ? 'text-so-accent font-medium bg-so-accent/8' : 'text-so-muted hover:text-so-text hover:bg-white/5' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="flex flex-col gap-2 mt-5 pt-5 border-t border-white/[0.06]">
                <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center px-4 py-3 rounded-xl text-sm font-medium text-so-muted border border-white/10 hover:text-so-text hover:border-white/20 transition-colors">Official Site</a>
                <a href="{{ route('menu') }}" class="flex items-center justify-center px-4 py-3 rounded-xl text-sm font-semibold bg-so-accent text-so-bg hover:bg-so-accent2 transition-colors">View Menu</a>
            </div>
        </div>
    </div>
</header>

<script>
(function () {
    var isOpen = false;
    function toggleMobileMenu() { isOpen ? closeMobileMenu() : openMobileMenu(); }
    function openMobileMenu() {
        isOpen = true;
        var menu = document.getElementById('mobile-menu');
        var btn  = document.getElementById('mobile-menu-btn');
        menu.style.maxHeight = menu.scrollHeight + 'px';
        btn.setAttribute('aria-expanded', 'true');
        btn.setAttribute('aria-label', 'Close navigation menu');
        document.getElementById('icon-menu').classList.add('hidden');
        document.getElementById('icon-close').classList.remove('hidden');
    }
    function closeMobileMenu() {
        isOpen = false;
        var menu = document.getElementById('mobile-menu');
        var btn  = document.getElementById('mobile-menu-btn');
        menu.style.maxHeight = '0';
        btn.setAttribute('aria-expanded', 'false');
        btn.setAttribute('aria-label', 'Open navigation menu');
        document.getElementById('icon-menu').classList.remove('hidden');
        document.getElementById('icon-close').classList.add('hidden');
    }
    window.toggleMobileMenu = toggleMobileMenu;
    window.closeMobileMenu  = closeMobileMenu;
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) closeMobileMenu();
    });
})();
</script>
