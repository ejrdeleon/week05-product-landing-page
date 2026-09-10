# MP04 – Responsive Product Landing Page · Sideout Café

**Course:** ITST 302 – Client-Server Technologies
**Week:** 5
**Module:** Module 1 – Frontend Development with Laravel
**Project:** MP04 – Responsive Product Landing Page
**Business:** Sideout Café · Lumban, Laguna, Philippines

---

## Academic Disclaimer

> **This is a student academic redesign project for ITST 302. It is not the official Sideout Café website.**
>
> All pricing shown in the Pricing section is **sample content for academic prototype purposes only** — it does not represent official Sideout Café menu prices.
>
> All testimonials are **fictional sample content** — they are not real customer reviews.
>
> Information verified from the official Sideout Café website has been used where available. Any additional content is clearly labeled as academic/sample material.

---

## 1. Introduction

### What is a Product Landing Page?

A **product landing page** is a standalone web page designed to promote a specific product, service, or business. Unlike a full website, a landing page has one primary goal: to convert visitors into customers, members, or leads through a clear call to action (CTA).

Landing pages typically include:
- A compelling hero section with a strong headline
- Feature highlights explaining the value proposition
- Pricing or package options
- Social proof (testimonials, reviews)
- A clear, prominent call to action

### Why Landing Pages Matter

In modern web development, landing pages are one of the most important marketing tools for businesses. A well-designed landing page:

- **Communicates value immediately** — visitors decide within seconds whether to stay or leave
- **Drives conversions** — focused design guides users toward a specific action
- **Builds credibility** — professional design instills trust in a brand
- **Works on all devices** — responsive design ensures a consistent experience

### Purpose of This Project

This project demonstrates the practical application of:
- Laravel Blade Components for modular UI development
- Tailwind CSS for utility-first responsive styling
- Vite for modern asset bundling
- Responsive design principles for a real-world business

### Sideout Café as the Business Context

**Sideout Café** is a real local café located in Lumban, Laguna, Philippines (4014). Their official website at [sideout-cafe.com](https://www.sideout-cafe.com/) features a loyalty program where customers earn one point for every personal drink purchased.

This academic redesign uses verified information from the official website and clearly labels any content created for the prototype.

---

## 2. Objectives

By completing this project, the following learning objectives were accomplished:

| Objective | Applied In |
|-----------|------------|
| ✅ Build responsive layouts with Tailwind CSS | All sections |
| ✅ Create and reuse Laravel Blade Components | 11 components across the project |
| ✅ Apply mobile-first responsive design | All breakpoints from 375px |
| ✅ Implement modular component architecture | `resources/views/components/` |
| ✅ Use CSS Grid and Flexbox | Features, Pricing, Footer, Hero grids |
| ✅ Apply Tailwind utility classes and breakpoints | Throughout all components |
| ✅ Demonstrate UI/UX design principles | Dark design system, visual hierarchy |
| ✅ Structure a Laravel application with layouts | `layouts/app.blade.php` |
| ✅ Use Git for version control | Meaningful commits throughout |
| ✅ Prepare a GitHub-ready public repository | `.gitignore`, README, structure |

---

## 3. Responsive Web Design

### Mobile-First Approach

This project follows a **mobile-first design philosophy**. All base styles target the smallest screen (375px), and responsive utilities expand the layout for larger screens.

In Tailwind CSS, this means writing default (mobile) styles first, then adding responsive prefixes:

```html
<!-- Mobile: 1 column, Tablet: 2 columns, Desktop: 3 columns -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    ...
</div>
```

### Responsive Breakpoints

| Prefix | Min-width | Use Case |
|--------|-----------|----------|
| *(none)* | 0px | Mobile base styles |
| `sm:` | 640px | Large mobile / small tablet |
| `md:` | 768px | Tablet |
| `lg:` | 1024px | Laptop |
| `xl:` | 1280px | Desktop |
| `2xl:` | 1536px | Wide desktop |

### Tested Viewports

| Device | Viewport |
|--------|----------|
| iPhone SE | 375 × 667px |
| iPhone 14 | 390 × 844px |
| Android (general) | 414 × 896px |
| iPad | 768 × 1024px |
| iPad Air | 820 × 1180px |
| Laptop | 1366 × 768px |
| Desktop | 1440 × 900px |
| Wide Desktop | 1920 × 1080px |

### Flexbox and CSS Grid Examples

**Flexbox** – used for navigation, button groups, and inline layouts:
```html
<div class="flex items-center justify-between gap-4">
    ...
</div>
```

**CSS Grid** – used for feature cards, pricing, testimonials, and footer:
```html
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">
    ...
</div>
```

### Why Responsiveness Matters

A non-responsive site loses a significant portion of its audience. In the Philippines, mobile internet access is dominant — a café's landing page must work perfectly on a smartphone. This project ensures:
- No horizontal scrolling at any breakpoint
- Touch-friendly button sizing (minimum 44×44px)
- Readable font sizes on small screens
- Properly stacked cards on mobile

---

## 4. Tailwind CSS

### What is Tailwind CSS?

Tailwind CSS is a **utility-first CSS framework** that provides low-level utility classes for building custom designs directly in HTML. Instead of writing custom CSS for every element, Tailwind provides composable classes like `flex`, `text-center`, `rounded-xl`, and `hover:shadow-lg`.

### Advantages of Utility-First CSS

1. **No context switching** – style in HTML, no separate CSS file navigation
2. **No unused CSS** – Tailwind purges unused classes in production
3. **Highly maintainable** – styles are co-located with markup
4. **Responsive by design** – every utility has responsive variants
5. **Consistent spacing** – uses a design scale instead of arbitrary pixel values

### Utility Class Examples from This Project

**Spacing and sizing:**
```html
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
```

**Typography:**
```html
<h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight">
```

**Shadows and rounded corners:**
```html
<div class="rounded-3xl shadow-2xl shadow-black/40 border border-white/[0.06]">
```

**Hover effects and transitions:**
```html
<div class="hover:-translate-y-1 hover:shadow-xl hover:border-so-accent/30 transition-all duration-300">
```

**Tailwind v4 Configuration** (`tailwind.config.js`):
```js
theme: {
    extend: {
        colors: {
            'so': {
                'bg':      '#0A0D0B',
                'surface': '#111613',
                'accent':  '#9AF06A',
            }
        }
    }
}
```

---

## 5. Blade Components

### What are Blade Components?

**Laravel Blade Components** are reusable UI building blocks defined in `resources/views/components/`. They are invoked using the `<x-component-name>` syntax and can accept data through **props**.

### Why Reusable Components Matter

In traditional development, copying HTML for repeated elements leads to:
- Inconsistent styles across the page
- Difficult maintenance (change one → change everywhere)
- Longer, harder-to-read template files

With Blade Components:
- **DRY Principle** — write once, reuse many times
- **Single source of truth** — update one component, all instances update
- **Readable page templates** — `home.blade.php` reads like a list of sections

### Component Example: `<x-feature-card>`

**Component file** (`resources/views/components/feature-card.blade.php`):
```blade
@props([
    'icon'        => '',
    'title'       => '',
    'description' => '',
])

<div class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface border
            border-white/[0.06] hover:border-so-accent/30 transition-all duration-300">
    <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-so-accent/10
                text-so-accent group-hover:bg-so-accent/15 transition-colors duration-300">
        <div class="w-5 h-5">{!! $icon !!}</div>
    </div>
    <h3 class="text-so-text font-semibold">{{ $title }}</h3>
    <p class="text-so-muted text-sm leading-relaxed">{{ $description }}</p>
</div>
```

**Usage in `home.blade.php`:**
```blade
<x-feature-card
    title="Loyalty Rewards"
    description="Earn one point for every personal drink purchased."
    :icon="'<svg ...>...</svg>'"
/>
```

### Component Example: `<x-button>`

```blade
{{-- Primary link button --}}
<x-button variant="primary" href="https://www.sideout-cafe.com/">
    Get Started
</x-button>

{{-- Outline anchor button --}}
<x-button variant="outline" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18">
    Find Us
</x-button>

{{-- Full-width form submit button --}}
<x-button variant="secondary" type="submit" class="w-full">
    Send Message
</x-button>
```

---

## 6. User Interface Design

### Color Palette

| Role | Token | Hex |
|------|-------|-----|
| Background | `bg-so-bg` | `#0A0D0B` |
| Surface | `bg-so-surface` | `#111613` |
| Surface 2 | `bg-so-surface2` | `#171D19` |
| Primary Accent | `text-so-accent` | `#9AF06A` |
| Secondary Accent | `text-so-accent2` | `#D9F7C0` |
| Text | `text-so-text` | `#F5F7F2` |
| Muted | `text-so-muted` | `#9CA69D` |
| Borders | — | `rgba(255,255,255,0.06–0.14)` |

The dark charcoal base (`#0A0D0B`) with warm green accent (`#9AF06A`) was chosen to feel premium and modern while aligning with Sideout Café's brand identity visible on the official website.

### Typography

- **Font family:** Instrument Sans (loaded via Bunny Fonts through Vite)
- **Weights:** 400 (regular), 500 (medium), 600 (semibold)
- **Hero H1:** `text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight`
- **Section titles:** `text-3xl sm:text-4xl lg:text-5xl font-bold`
- **Body:** `text-base sm:text-lg text-so-muted leading-relaxed`
- **Labels:** `text-xs uppercase tracking-widest`

### Iconography

All icons are **inline SVG** using a Lucide-compatible design. No external icon library is required, which keeps the project fast and offline-capable. Icons used:
Coffee cup · Gift/reward · Map pin · Smartphone · House · Users · Star · Check · Arrow right · Hamburger/X · Globe

### Button Styles

| Variant | Description |
|---------|-------------|
| `primary` | Green background, dark text, glow shadow, hover lift |
| `secondary` | Dark surface, subtle border |
| `ghost` | Transparent, muted text, subtle hover |
| `outline` | Green border, fills green on hover |

### Card Design

All cards follow these principles:
- `rounded-2xl` or `rounded-3xl` (large, modern corners)
- `border border-white/[0.06]` (very subtle dark-mode border)
- `hover:border-so-accent/30` (accent border on hover)
- `hover:-translate-y-1` (lift effect)
- `transition-all duration-300` (smooth transitions)

### Spacing

Uses Tailwind's default spacing scale:
- Section padding: `py-20 lg:py-28`
- Card padding: `p-6` to `p-8`
- Container: `px-4 sm:px-6 lg:px-8` with `max-w-7xl`

### Accessibility

- Semantic HTML: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`
- Skip to main content link (screen readers)
- `aria-label` on all icon-only controls
- `aria-expanded` on mobile menu button
- `role="img"` and descriptive `aria-label` on visual mockups
- `role="progressbar"` with `aria-valuenow` on loyalty progress bar
- Star ratings use `role="img"` and `aria-label="X out of 5 stars"`
- All links and buttons have visible focus rings (`focus:ring-2 focus:ring-so-accent/50`)

---

## 7. Folder Structure

```
week05-product-landing-page/
│
├── app/                              Laravel app directory
├── resources/
│   ├── css/
│   │   └── app.css                  Tailwind v4 styles + @theme tokens
│   ├── js/
│   │   └── app.js                   Vite entry point
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        Root HTML layout (Vite, SEO meta)
│       ├── components/
│       │   ├── navbar.blade.php     Responsive sticky navigation
│       │   ├── hero.blade.php       Two-column hero section
│       │   ├── feature-card.blade.php   Feature tile component
│       │   ├── pricing-card.blade.php   Pricing plan component
│       │   ├── testimonial-card.blade.php  Review card component
│       │   ├── footer.blade.php     4-column footer
│       │   ├── button.blade.php     Multi-variant button
│       │   ├── container.blade.php  Max-width wrapper
│       │   ├── badge.blade.php      Pill/label badge
│       │   ├── section-heading.blade.php  Section title pattern
│       │   └── stat-card.blade.php  Number + label stat
│       └── pages/
│           └── home.blade.php       Main landing page
├── public/
│   └── build/                       Compiled Vite assets
├── routes/
│   └── web.php                      Application routes
├── screenshots/
│   └── README.md                    Screenshot guide with viewports
├── documentation/
│   ├── component-architecture.md    Component reference docs
│   └── linkedin-post.md             LinkedIn post draft
├── tailwind.config.js               Tailwind custom colors + animations
├── vite.config.js                   Vite + Tailwind v4 + fonts
├── postcss.config.js                PostCSS (autoprefixer only for v4)
├── .gitignore                       Git ignore rules
└── README.md                        This file
```

---

## 8. Screenshots

| # | Screenshot | Description |
|---|------------|-------------|
| 01 | `01-before-design.png` | Initial student prototype (basic layout) |
| 02 | `02-after-design.png` | Final polished interface |
| 03 | `03-desktop-layout.png` | Full desktop view at 1440px |
| 04 | `04-tablet-layout.png` | Tablet view at 768px |
| 05 | `05-mobile-layout.png` | Mobile view at 390px |
| 06 | `06-navigation-bar.png` | Navbar component (desktop + mobile) |
| 07 | `07-hero-section.png` | Hero section with loyalty card mockup |
| 08 | `08-features-section.png` | All 8 feature cards |
| 09 | `09-pricing-cards.png` | 3 pricing cards with disclaimer |
| 10 | `10-testimonials.png` | 3 testimonial cards with disclaimer |
| 11 | `11-footer.png` | 4-column footer |
| 12 | `12-vscode-project-structure.png` | VS Code Explorer showing full structure |
| 13 | `13-blade-components-folder.png` | All 11 component files in VS Code |
| 14 | `14-github-repository.png` | GitHub repository page |

See `screenshots/README.md` for viewport instructions.

---

## 9. Technologies Used

| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.x | PHP framework, routing, Blade templating |
| **PHP** | 8.2+ | Server-side language |
| **Blade** | Built-in | Laravel templating engine, component system |
| **Tailwind CSS** | v4.3.x | Utility-first CSS framework |
| **Vite** | v8.x | Modern asset bundler (CSS + JS) |
| **@tailwindcss/vite** | v4.3.x | Tailwind v4 Vite plugin |
| **Instrument Sans** | via Bunny | Modern sans-serif font (via Vite fonts) |
| **HTML5** | — | Semantic markup structure |
| **Vanilla JavaScript** | — | Mobile menu toggle (no external libraries) |
| **Git** | — | Version control |
| **GitHub** | — | Remote repository hosting |

---

## 10. Installation

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- npm or Yarn

### Setup Steps

```bash
# 1. Clone the repository
git clone https://github.com/YOUR_USERNAME/week05-product-landing-page.git

# 2. Navigate into the project directory
cd week05-product-landing-page

# 3. Install PHP dependencies
composer install

# 4. Install Node.js dependencies
npm install

# 5. Copy the environment file
cp .env.example .env

# 6. Generate the application key
php artisan key:generate

# 7. Build front-end assets (production)
npm run build

# --- OR for development with hot reload ---
npm run dev
```

---

## 11. Usage

### Running the Development Server

Open two terminal windows:

**Terminal 1 – Vite dev server (hot reload):**
```bash
npm run dev
```

**Terminal 2 – Laravel server:**
```bash
php artisan serve
```

Then open your browser and visit:
```
http://localhost:8000
```

### Building for Production

```bash
npm run build
php artisan serve
```

---

## 12. Responsive Testing

Use Chrome DevTools to test at these viewports:

| Preset | Width | Height |
|--------|-------|--------|
| Mobile S | 375px | 667px |
| Mobile M | 390px | 844px |
| Mobile L | 414px | 896px |
| Tablet | 768px | 1024px |
| Tablet L | 820px | 1180px |
| Laptop | 1366px | 768px |
| Desktop | 1440px | 900px |
| Desktop HD | 1920px | 1080px |

**Steps:**
1. Open `http://localhost:8000`
2. Press `F12` → DevTools
3. Click the "Toggle device toolbar" icon (or `Ctrl + Shift + M`)
4. Select preset or enter custom dimensions

**Things to verify at each breakpoint:**
- [ ] No horizontal scrollbar
- [ ] Navbar collapses to hamburger at `md` breakpoint
- [ ] Feature cards stack from 3-col → 2-col → 1-col
- [ ] Hero switches from 2-col to 1-col
- [ ] Pricing cards stack on mobile
- [ ] Testimonials stack on mobile
- [ ] Footer stacks to 2-col → 1-col
- [ ] CTA buttons remain accessible and tappable

---

## 13. Before and After

### Before (Initial Prototype)

The initial prototype (`resources/views/home.blade.php`) was a basic stub:
- White/gray background (default Tailwind)
- No consistent design system
- Emoji icons instead of SVG
- Placeholder images (`via.placeholder.com`)
- No mobile hamburger menu
- No dark theme
- Hardcoded simple HTML structure

### After (Final Polished Interface)

The rebuilt landing page features:
- **Dark charcoal design system** (`#0A0D0B` base)
- **Warm green accent** (`#9AF06A`) for brand consistency
- **11 reusable Blade Components** with full prop support
- **SVG inline icons** (no external icon library required)
- **Loyalty dashboard card mockup** in the hero section
- **Working mobile hamburger menu** with smooth animation
- **Strong visual hierarchy** with large typography and gradient text
- **Glass-effect cards** with backdrop blur
- **Subtle animations** (glow orb pulse, card hover lift)
- **Full accessibility** with ARIA labels and focus rings

### Key Improvement Areas

| Area | Before | After |
|------|--------|-------|
| Color scheme | White/gray, orange accent | Dark charcoal + green accent |
| Icons | Emoji (☕🎁📍) | Inline SVG (Lucide-style) |
| Navigation | Basic, no mobile menu | Sticky blur nav + mobile hamburger |
| Cards | White cards, no hover | Dark surface cards with hover lift |
| Typography | Standard size | Large hero H1, gradient accent text |
| Components | 7 basic stubs | 11 polished, fully-documented components |
| Responsiveness | Basic | Mobile-first, 8 breakpoints tested |
| Accessibility | None | ARIA labels, focus rings, skip link |

---

## 14. Academic Disclaimer

> **This is a student academic redesign project created for ITST 302 – Client-Server Technologies.**
>
> **It is NOT the official Sideout Café website.**

**Content integrity notes:**
- Business name, location (Lumban, Laguna 4014), loyalty program details ("1 point per personal drink"), and the two verified URLs (official website + Google Maps) are sourced from the official Sideout Café website.
- **Sample pricing (₱149, ₱249, ₱399)** is academic prototype content — NOT official Sideout Café menu prices.
- **Sample testimonials (Sample Customer 01/02/03)** are fictional — NOT real Sideout Café customer reviews.
- Opening hours, phone number, email, and social media handles are NOT included as they could not be verified from official sources.

---

## 15. Credits & References

| Resource | URL |
|----------|-----|
| Official Sideout Café Website | [sideout-cafe.com](https://www.sideout-cafe.com/) |
| Sideout Café on Google Maps | [maps.app.goo.gl/cUTeXGX83iXzW5D18](https://maps.app.goo.gl/cUTeXGX83iXzW5D18) |
| Laravel Documentation | [laravel.com/docs](https://laravel.com/docs) |
| Tailwind CSS Documentation | [tailwindcss.com/docs](https://tailwindcss.com/docs) |
| Lucide Icons (SVG reference) | [lucide.dev](https://lucide.dev) |
| Instrument Sans font | [Bunny Fonts](https://fonts.bunny.net) |

---

## GitHub Repository

```
https://github.com/YOUR_USERNAME/week05-product-landing-page
```

> Replace `YOUR_USERNAME` with your actual GitHub username.

---

*README prepared for ITST 302 – Client-Server Technologies · Week 5 · MP04 · Academic Year 2026*
