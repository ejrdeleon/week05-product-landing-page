# MP04 – Responsive Product Landing Page · Sideout Cafe

**Course:** ITST 302 – Client-Server Technologies
**Week:** 5
**Module:** Module 1 – Frontend Development with Laravel
**Project:** MP04 – Responsive Product Landing Page
**Business:** Sideout Cafe · Lumban, Laguna, Philippines
**Official Website:** [sideout-cafe.com](https://www.sideout-cafe.com/)

---

> **Academic Disclaimer:** This is a student academic redesign project for ITST 302. It is not the official Sideout Cafe website. Menu prices are sourced from the official Sideout Cafe website. Testimonials are fictional sample content and are not real customer reviews.

---

## 1. Project Title

**MP04 – Responsive Product Landing Page for Sideout Cafe**

A fully responsive, multi-page product landing page built with Laravel 12, Blade Components, Tailwind CSS v4, and Vite — designed for Sideout Cafe, a real local coffee shop in Lumban, Laguna, Philippines.

---

## 2. Introduction

### What is a Product Landing Page?

A **product landing page** is a focused, standalone web page built to promote a specific product, service, or business. Unlike a full website with many goals, a landing page has one primary purpose: to guide visitors toward a single action — visiting the café, viewing the menu, or joining the loyalty program.

A well-structured landing page typically includes:

- A compelling **hero section** with a clear headline and call to action
- **Feature highlights** that communicate the value of the business
- A **menu or pricing section** showing what is available
- **Social proof** through testimonials from real or representative customers
- A **loyalty or rewards section** explaining the program
- A **contact or visit section** with location and directions

### Why Landing Pages Are Important for Businesses

For a local business like Sideout Cafe, a landing page serves as the digital front door. It is often the first impression a potential customer has of the brand. A well-designed landing page:

- **Communicates value immediately** — visitors decide within seconds whether to stay or leave
- **Drives conversions** — focused design guides users toward a specific action such as visiting the café or viewing the menu
- **Builds credibility** — a professional, consistent design instills trust in the brand
- **Works on all devices** — responsive design ensures a consistent experience on phones, tablets, and desktops
- **Supports local discovery** — integrating Google Maps and location information helps new customers find the café

In the Philippines, where mobile internet usage is dominant, a mobile-first landing page is not optional — it is essential for any local business that wants to reach its community.

### Purpose of This Project

This project was built to demonstrate practical application of the following technologies and concepts:

- **Laravel Blade Components** for modular, reusable UI development
- **Tailwind CSS v4** for utility-first responsive styling with a custom design system
- **Vite** for modern asset bundling with hot module replacement
- **Responsive design principles** applied to a real-world local business
- **Accessibility standards** including ARIA labels, semantic HTML, and keyboard navigation

### Sideout Cafe as the Business Context

**Sideout Cafe** is a real local café located in Lumban, Laguna, Philippines (4014). Their official website at [sideout-cafe.com](https://www.sideout-cafe.com/) features a loyalty program where customers earn one point for every personal drink purchased. Menu data used in this project is sourced directly from the official website.

---

## 3. Objectives

By completing this project, the following learning objectives were accomplished:

| Objective | Applied In |
| --- | --- |
| ✅ Build responsive layouts with Tailwind CSS | All sections across all pages |
| ✅ Create and reuse Laravel Blade Components | 11 components across the project |
| ✅ Apply mobile-first responsive design | All breakpoints from 320px upward |
| ✅ Implement modular component architecture | `resources/views/components/` |
| ✅ Use CSS Grid for multi-column layouts | Features, Menu, Footer, Hero |
| ✅ Use Flexbox for inline and navigation layouts | Navbar, buttons, stat strips |
| ✅ Apply Tailwind utility classes and breakpoints | Throughout all components |
| ✅ Demonstrate UI/UX design principles | Dark design system, visual hierarchy |
| ✅ Structure a Laravel application with layouts | `layouts/app.blade.php` |
| ✅ Implement a working contact form with validation | `ContactController.php` |
| ✅ Connect to the official business website | All pages link to `sideout-cafe.com` |
| ✅ Use real menu data from the official source | Menu page and home page menu section |
| ✅ Use Git for version control | Meaningful commits throughout |
| ✅ Prepare a GitHub-ready public repository | `.gitignore`, README, structure |

---

## 4. Responsive Web Design

### Mobile-First Design

This project follows a **mobile-first design philosophy**. Every component is written with the smallest screen as the default, and responsive prefixes progressively enhance the layout for larger screens.

In Tailwind CSS, mobile-first means writing base styles without a prefix, then layering on `sm:`, `md:`, `lg:`, and `xl:` prefixes for larger viewports:

```html
<!-- Mobile: 1 column → Tablet: 2 columns → Desktop: 4 columns -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
    ...
</div>
```

This approach ensures the page is fully usable on a 320px phone before any desktop styles are applied.

### Responsive Breakpoints

Tailwind CSS uses the following breakpoints, all of which are used in this project:

| Prefix | Min-width | Use Case |
| --- | --- | --- |
| _(none)_ | 0px | Mobile base styles |
| `sm:` | 640px | Large mobile / small tablet |
| `md:` | 768px | Tablet |
| `lg:` | 1024px | Laptop |
| `xl:` | 1280px | Desktop |
| `2xl:` | 1536px | Wide desktop |

### Tested Viewports

| Device | Viewport |
| --- | --- |
| iPhone SE | 375 × 667px |
| iPhone 14 | 390 × 844px |
| Android (general) | 414 × 896px |
| iPad | 768 × 1024px |
| iPad Air | 820 × 1180px |
| Laptop | 1366 × 768px |
| Desktop | 1440 × 900px |
| Wide Desktop | 1920 × 1080px |

### Flexbox

Flexbox is used throughout the project for one-dimensional layouts — navigation bars, button groups, stat strips, and inline icon-text combinations.

**Navbar layout:**
```html
<nav class="flex items-center justify-between h-[68px]">
    <!-- logo left, links center, CTA right -->
</nav>
```

**Hero stat strip:**
```html
<div class="flex flex-wrap items-center gap-6 sm:gap-8">
    <div>...</div>
    <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
    <div>...</div>
</div>
```

**Button group:**
```html
<div class="flex flex-wrap items-center gap-3">
    <a class="...">View the Menu</a>
    <a class="...">Find Us</a>
</div>
```

### CSS Grid

CSS Grid is used for all multi-column section layouts — the hero, features, menu, testimonials, and footer.

**Asymmetric hero grid:**
```html
<div class="grid lg:grid-cols-[1fr_420px] xl:grid-cols-[1fr_460px] gap-0">
    <!-- editorial headline left, café card right -->
</div>
```

**Features section — large block + 2×2 grid:**
```html
<div class="grid lg:grid-cols-2 gap-6 lg:gap-8">
    <!-- large featured block -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- 4 smaller feature cards -->
    </div>
</div>
```

**Menu categories:**
```html
<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
    <!-- Coffee, Non Coffee, Tea, Special Coffee -->
</div>
```

**Footer:**
```html
<div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1fr]">
    <!-- brand, pages, visit, loyalty -->
</div>
```

### User Experience (UX)

Responsive design directly improves user experience by ensuring the page works naturally on every device a visitor might use. Specific UX decisions made in this project:

- **No horizontal scrolling** at any breakpoint — all content stays within the viewport
- **Touch-friendly tap targets** — all buttons and links are at minimum 44px tall
- **Readable line lengths** — body text is constrained with `max-w-xl` or `max-w-md` to prevent lines from becoming too wide on large screens
- **Staggered testimonials** — the middle card is offset upward on desktop (`lg:-mt-6`) to break the identical-row pattern and create visual rhythm
- **Navbar collapses** to a hamburger menu at the `md` breakpoint with a smooth max-height animation
- **Section padding scales** — `py-20 lg:py-28` gives mobile sections breathing room without wasting space on desktop

### Why Responsive Design Matters

In the Philippines, mobile internet access accounts for the majority of web traffic. A café's landing page that only works on desktop will fail to reach most of its potential customers. This project ensures that a visitor on a ₱3,000 Android phone in Lumban gets the same quality experience as someone on a laptop — the menu is readable, the buttons are tappable, and the loyalty program is clearly explained.

---

## 5. Tailwind CSS

### What is Utility-First CSS?

Tailwind CSS is a **utility-first CSS framework**. Instead of writing semantic class names like `.card` or `.hero-title` and then defining their styles in a separate CSS file, Tailwind provides single-purpose utility classes that are applied directly in HTML markup.

```html
<!-- Traditional CSS approach -->
<div class="card">...</div>

<!-- Tailwind utility-first approach -->
<div class="rounded-2xl bg-so-surface border border-white/[0.06] p-6">...</div>
```

This means styles live alongside the markup, making it immediately clear what an element looks like without switching between files.

### Advantages of Tailwind CSS

1. **No context switching** — styles are written directly in HTML, no separate CSS file navigation required
2. **No unused CSS in production** — Tailwind scans all Blade files and only includes classes that are actually used
3. **Highly maintainable** — changing a component's appearance means editing one file, not hunting through stylesheets
4. **Responsive by design** — every utility class has `sm:`, `md:`, `lg:`, `xl:` variants built in
5. **Consistent design scale** — spacing, typography, and colors follow a predictable system rather than arbitrary pixel values
6. **Custom design tokens** — the `@theme` block in `app.css` defines the entire Sideout Cafe color palette as CSS custom properties

### Custom Design Tokens (`resources/css/app.css`)

```css
@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;

    --color-so-bg:       #0A0D0B;
    --color-so-surface:  #111613;
    --color-so-surface2: #171D19;
    --color-so-accent:   #9AF06A;
    --color-so-accent2:  #D9F7C0;
    --color-so-text:     #F5F7F2;
    --color-so-muted:    #9CA69D;
}
```

These tokens are then available as Tailwind utility classes: `bg-so-bg`, `text-so-accent`, `border-so-surface2`, etc.

### Responsive Utility Classes

Every Tailwind utility can be prefixed with a breakpoint to apply only at that screen size and above:

```html
<!-- Typography scales up at larger screens -->
<h1 class="text-[clamp(2.6rem,7vw,5.5rem)] font-black leading-[0.95] tracking-[-0.04em]">
    Where every cup feels like home.
</h1>

<!-- Padding increases on larger screens -->
<section class="py-20 lg:py-28">...</section>

<!-- Grid columns expand at breakpoints -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">...</div>

<!-- Elements hidden/shown at breakpoints -->
<div class="hidden lg:flex flex-col justify-center">
    <!-- café card panel, only visible on desktop -->
</div>
```

### Component Styling Examples

**Navbar container:**
```html
<header class="fixed top-0 left-0 right-0 z-50 border-b border-white/[0.06]
               bg-so-bg/95 backdrop-blur-md">
```

**Feature card hover state:**
```html
<div class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface
            border border-white/[0.06] hover:border-so-accent/30
            hover:bg-so-surface2 transition-all duration-300">
```

**Primary button:**
```html
<a class="inline-flex items-center gap-2 px-6 py-3 rounded-xl
          bg-so-accent text-so-bg text-sm font-bold
          hover:bg-so-accent2 transition-colors duration-200">
    View the Menu
</a>
```

**Loyalty point dot grid:**
```html
<div class="grid grid-cols-5 gap-2">
    <!-- filled dot -->
    <div class="h-8 rounded-lg bg-so-accent text-so-bg flex items-center
                justify-center text-xs font-bold">✓</div>
    <!-- empty dot -->
    <div class="h-8 rounded-lg bg-so-bg border border-white/10
                text-so-muted/40 flex items-center justify-center text-xs">8</div>
</div>
```

### Tailwind Configuration (`tailwind.config.js`)

```js
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                'so': {
                    'bg':       '#0A0D0B',
                    'surface':  '#111613',
                    'surface2': '#171D19',
                    'accent':   '#9AF06A',
                    'accent2':  '#D9F7C0',
                    'text':     '#F5F7F2',
                    'muted':    '#9CA69D',
                },
            },
            fontFamily: {
                sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
};
```


---

## 6. Blade Components

### What are Blade Components?

**Laravel Blade Components** are reusable UI building blocks stored in `resources/views/components/`. They are invoked in any Blade template using the `<x-component-name>` syntax and accept data through **props** declared with `@props`.

```blade
{{-- Invoking a component --}}
<x-feature-card
    title="Simple loyalty rewards"
    description="One personal drink equals one point."
    :icon="'<svg ...>...</svg>'"
/>
```

### Why Reusable Components Improve Maintainability

Without components, repeating UI patterns require copying HTML across multiple files. This creates several problems:

- A style change must be made in every copy
- Inconsistencies appear over time as copies drift apart
- Page templates become long and hard to read

With Blade Components:

- **DRY Principle** — write the markup once, use it everywhere
- **Single source of truth** — update one component file and every instance updates automatically
- **Readable page templates** — `home.blade.php` reads as a list of named sections, not raw HTML
- **Prop validation** — `@props` defines the expected interface for each component

### Benefits of Modular UI Development

Modular UI development means breaking the interface into independent, self-contained pieces. Each component in this project:

- Has a single responsibility (a card, a button, a section heading)
- Accepts props to customize its content without changing its structure
- Can be used on any page without modification
- Can be updated independently without affecting other components

This mirrors how professional frontend teams work with component libraries in React, Vue, or any modern framework — Blade Components bring the same discipline to server-rendered Laravel applications.

### Component Inventory

This project contains 11 Blade Components:

| Component | File | Purpose |
| --- | --- | --- |
| `<x-navbar>` | `navbar.blade.php` | Responsive sticky navigation with mobile hamburger |
| `<x-hero>` | `hero.blade.php` | Asymmetric two-column hero section |
| `<x-feature-card>` | `feature-card.blade.php` | Icon + title + description feature tile |
| `<x-pricing-card>` | `pricing-card.blade.php` | Café menu/drink card with optional featured badge |
| `<x-testimonial-card>` | `testimonial-card.blade.php` | Star rating + review + author card |
| `<x-footer>` | `footer.blade.php` | Four-column responsive footer |
| `<x-button>` | `button.blade.php` | Multi-variant button (primary, secondary, ghost, outline) |
| `<x-container>` | `container.blade.php` | Max-width responsive wrapper |
| `<x-badge>` | `badge.blade.php` | Pill/label badge with color variants |
| `<x-section-heading>` | `section-heading.blade.php` | Label + title + subtitle section header |
| `<x-stat-card>` | `stat-card.blade.php` | Large number + label stat display |

### Component Example: `<x-feature-card>`

**Component definition** (`resources/views/components/feature-card.blade.php`):

```blade
@props([
    'icon'        => '',
    'title'       => '',
    'description' => '',
])

<div class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface
            border border-white/[0.06] hover:border-so-accent/30
            hover:bg-so-surface2 transition-all duration-300">
    <div class="flex items-center justify-center w-10 h-10 rounded-xl
                bg-so-accent/10 text-so-accent flex-shrink-0"
         aria-hidden="true">
        <div class="w-5 h-5">{!! $icon !!}</div>
    </div>
    <h3 class="text-so-text font-semibold text-base leading-snug">{{ $title }}</h3>
    <p class="text-so-muted text-sm leading-relaxed flex-grow">{{ $description }}</p>
</div>
```

**Usage in `home.blade.php`:**

```blade
<x-feature-card
    title="Simple loyalty rewards"
    description="One personal drink equals one point. Every visit counts."
    :icon="'<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\'
            stroke-width=\'1.5\'>...</svg>'"
/>
```

### Component Example: `<x-button>`

The button component renders either an `<a>` tag or a `<button>` element depending on whether an `href` prop is provided:

```blade
@props([
    'variant' => 'primary',
    'href'    => null,
    'type'    => 'button',
    'class'   => '',
])

@php
    $variants = [
        'primary'   => 'bg-so-accent text-so-bg hover:bg-so-accent2',
        'secondary' => 'bg-so-surface2 text-so-text border border-white/10',
        'ghost'     => 'bg-transparent text-so-muted hover:text-so-text hover:bg-white/5',
        'outline'   => 'bg-transparent text-so-accent border border-so-accent/40
                        hover:bg-so-accent hover:text-so-bg',
    ];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
```

**Usage examples:**

```blade
{{-- Primary CTA --}}
<x-button variant="primary" href="{{ route('menu') }}">View the Menu</x-button>

{{-- Outline link --}}
<x-button variant="outline" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18">
    Find Us
</x-button>

{{-- Form submit --}}
<x-button variant="primary" type="submit" class="w-full">Send Message</x-button>
```

### Component Example: `<x-testimonial-card>`

This component auto-derives initials from the customer name and caps the star rating between 1 and 5:

```blade
@props([
    'name'     => 'Guest',
    'position' => 'Café Visitor',
    'review'   => '',
    'stars'    => 5,
    'initials' => '',
])

@php
    $avatarInitials = $initials ?: implode('', array_map(
        fn ($w) => strtoupper($w[0]),
        array_filter(array_slice(explode(' ', trim($name)), 0, 2))
    ));
    $starCount = max(1, min(5, (int) $stars));
@endphp
```

**Usage:**

```blade
<x-testimonial-card
    review="Good coffee, warm atmosphere, and a loyalty program that makes sense."
    name="Mae"
    position="Weekend visitor"
/>
```

---

## 7. User Interface Design

### Color Palette

The design system uses a dark charcoal base with a warm green accent. All colors are defined as CSS custom properties in `resources/css/app.css` and registered as Tailwind utilities in `tailwind.config.js`.

| Role | Token | Hex | Usage |
| --- | --- | --- | --- |
| Background | `bg-so-bg` | `#0A0D0B` | Page background |
| Surface | `bg-so-surface` | `#111613` | Cards, sections |
| Surface 2 | `bg-so-surface2` | `#171D19` | Elevated cards, inputs |
| Primary Accent | `text-so-accent` | `#9AF06A` | CTAs, highlights, icons |
| Secondary Accent | `text-so-accent2` | `#D9F7C0` | Hover states, gradients |
| Text | `text-so-text` | `#F5F7F2` | Headings, body text |
| Muted | `text-so-muted` | `#9CA69D` | Secondary text, labels |
| Borders | — | `rgba(255,255,255,0.06–0.14)` | Subtle card borders |

The dark near-black base (`#0A0D0B`) creates a premium, focused atmosphere. The warm green accent (`#9AF06A`) provides strong contrast for CTAs while feeling natural and approachable — appropriate for a café brand rather than a technology company.

### Typography

- **Font family:** Instrument Sans, loaded via Bunny Fonts through the Vite plugin
- **Weights used:** 400 (regular), 500 (medium), 600 (semibold), 900 (black for hero)
- **Hero H1:** `text-[clamp(2.6rem,7vw,5.5rem)] font-black leading-[0.95] tracking-[-0.04em]` — fluid sizing that scales from mobile to desktop without breakpoint jumps
- **Section headings:** `text-3xl sm:text-4xl font-bold tracking-tight`
- **Body text:** `text-base leading-7 text-so-muted`
- **Labels:** `text-[11px] font-semibold uppercase tracking-[0.28em]`
- **Gradient text:** `.gradient-text` utility applies a green-to-light-green gradient to key headline words

The `clamp()` function on the hero heading ensures the typography scales fluidly across all viewport widths without requiring multiple breakpoint overrides.

### Iconography

All icons are **inline SVG** using a Lucide-compatible design system. No external icon library is loaded, which keeps the page fast and fully functional offline.

Icons used across the project:
- Coffee cup — navbar logo, features, about section
- Map pin — location references, directions buttons
- Gift/reward — loyalty program sections
- House — easygoing atmosphere feature
- Users — community feature
- Star — testimonial ratings
- Arrow right — CTA links
- Globe — official website links
- Hamburger / X — mobile menu toggle

Each icon is sized consistently at `w-4 h-4` (16px) for inline use or `w-5 h-5` (20px) for icon containers.

### Button Styles

The `<x-button>` component supports four variants, each with a distinct visual role:

| Variant | Appearance | Use Case |
| --- | --- | --- |
| `primary` | Green background (`#9AF06A`), dark text | Main CTAs — "View Menu", "Join Loyalty" |
| `secondary` | Dark surface, subtle white border | Secondary actions — "View Full Menu" |
| `ghost` | Transparent, muted text | Low-emphasis links — nav items |
| `outline` | Green border, fills green on hover | Alternative CTAs — "Find Us", "Official Site" |

All buttons share a base of `rounded-xl`, `font-semibold`, `text-sm`, and `transition-colors duration-200` for consistency.

### Card Design

Cards across the project follow a consistent visual language:

- **Border radius:** `rounded-2xl` (16px) — modern but not excessive
- **Background:** `bg-so-surface` or `bg-so-surface2` — slightly elevated from the page background
- **Border:** `border border-white/[0.06]` — very subtle, visible only on close inspection
- **Hover accent border:** `hover:border-so-accent/30` — green tint appears on interaction
- **Transitions:** `transition-all duration-300` — smooth state changes

The Special Coffee menu card uses `bg-so-surface2 border-so-accent/[0.20]` to visually distinguish it as the featured category without being heavy-handed.

### Layout Consistency

Despite using varied section compositions (split layouts, asymmetric grids, full-width banners), the page maintains visual consistency through:

- **Consistent container:** `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8` on every section
- **Consistent section padding:** `py-20 lg:py-28` for major sections
- **Consistent section labels:** a short green line + small uppercase text before every section heading
- **Consistent color usage:** accent color only on interactive elements and key highlights, never decorative
- **Alternating backgrounds:** sections alternate between `bg-so-bg` and `bg-so-surface` to create natural visual separation without dividers

### Accessibility

- Semantic HTML throughout: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`
- Skip to main content link for screen readers
- `aria-label` on all icon-only controls (hamburger button, map iframe)
- `aria-expanded` on the mobile menu button, updated by JavaScript
- `role="img"` with `aria-label` on the loyalty point grid and star ratings
- All interactive elements have visible focus rings: `focus:ring-2 focus:ring-so-accent/50`
- Color contrast meets WCAG AA — green accent on dark background exceeds 4.5:1 ratio

---

## 8. Folder Structure

```
week05-product-landing-page/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── ContactController.php     Validates and logs contact form submissions
│
├── resources/
│   ├── css/
│   │   └── app.css                       Tailwind v4 @import, @theme tokens, keyframes
│   ├── js/
│   │   └── app.js                        Vite JS entry point
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php             Root HTML shell — <head>, Vite, SEO meta, skip link
│       ├── components/
│       │   ├── navbar.blade.php          Sticky responsive nav with mobile hamburger + JS
│       │   ├── hero.blade.php            Asymmetric hero — headline left, café card right
│       │   ├── feature-card.blade.php    Icon + title + description tile
│       │   ├── pricing-card.blade.php    Drink/menu card with optional featured badge
│       │   ├── testimonial-card.blade.php  Star rating + quote + author with auto initials
│       │   ├── footer.blade.php          4-column footer with brand, nav, visit, loyalty
│       │   ├── button.blade.php          Multi-variant button — renders <a> or <button>
│       │   ├── container.blade.php       max-w-7xl responsive padding wrapper
│       │   ├── badge.blade.php           Pill badge with green/gray/accent color variants
│       │   ├── section-heading.blade.php Label + heading + subtitle pattern
│       │   └── stat-card.blade.php       Large number + label stat display
│       └── pages/
│           ├── home.blade.php            Main landing page — all sections
│           ├── menu.blade.php            Full menu page — all 4 categories with real prices
│           ├── about.blade.php           About page — story and loyalty explanation
│           ├── loyalty.blade.php         Loyalty program page — how it works
│           └── contact.blade.php         Contact form + map + location info
│
├── public/
│   └── build/                            Compiled and hashed Vite assets (CSS + JS + fonts)
│
├── routes/
│   └── web.php                           All application routes (home, menu, about, loyalty, contact)
│
├── screenshots/
│   ├── 01-before-design.png              Initial prototype before redesign
│   ├── 02-after-design.png               Final polished interface
│   ├── 03-desktop-layout.png             Full desktop view at 1440px
│   ├── 04-tablet-layout.png              Tablet view at 768px
│   ├── 05-mobile-layout.png              Mobile view at 390px
│   ├── 06-navigation-bar.png             Navbar — desktop and mobile states
│   ├── 07-hero-section.png               Hero with café card mockup
│   ├── 08-features-section.png           Features — large block + 2×2 grid
│   ├── 09-pricing-cards.png              Menu section with real drink data
│   ├── 10-testimonials.png               Staggered testimonial cards
│   ├── 11-footer.png                     4-column footer
│   ├── 12-vscode-project-structure.png   VS Code Explorer showing full structure
│   ├── 13-blade-components-folder.png    All 11 component files in VS Code
│   ├── 14-github-repository.png          GitHub repository page
│   └── README.md                         Screenshot guide with viewport instructions
│
├── documentation/
│   ├── component-architecture.md         Component reference and prop documentation
│   └── linkedin-post.md                  LinkedIn post draft for project showcase
│
├── tailwind.config.js                    Custom color tokens + font + animation config
├── vite.config.js                        Vite + Laravel plugin + Tailwind v4 + Bunny fonts
├── postcss.config.js                     PostCSS config (autoprefixer)
├── .gitignore                            Git ignore rules
└── README.md                             This file
```

### Directory Purposes

**`resources/views/layouts/`**
Contains the root HTML shell (`app.blade.php`). Every page extends this layout using `@extends('layouts.app')`. It handles the `<head>` tag, Vite asset injection, SEO meta tags, Open Graph tags, the skip-to-content accessibility link, and the `<main>` wrapper. Child views inject their content using `@section('content')`.

**`resources/views/components/`**
Contains all 11 reusable Blade Components. Each component is a self-contained UI building block with its own props, markup, and styles. Components are invoked with `<x-component-name>` syntax anywhere in the application. This directory is the core of the modular architecture.

**`resources/views/pages/`**
Contains the five page templates: `home`, `menu`, `about`, `loyalty`, and `contact`. Each page extends `layouts.app` and composes its content from components. Page files are intentionally thin — they describe the structure of the page, not the implementation of each section.

**`public/`**
The web server document root. Contains the compiled Vite assets in `public/build/` — hashed CSS files, JavaScript, and font files. This directory is never edited manually; it is generated by `npm run build`.

**`screenshots/`**
Contains PNG screenshots of the finished project at various viewports and sections. Used for documentation, the README, and academic submission evidence.

**`documentation/`**
Contains supplementary documentation files including the component architecture reference and a LinkedIn post draft for the project showcase.

---

## 9. Screenshots

Screenshots are stored in the `screenshots/` directory. Take them using Chrome DevTools (`F12` → Toggle Device Toolbar → `Ctrl+Shift+M`) at the viewports listed below.

| # | File | Description | Viewport |
| --- | --- | --- | --- |
| 01 | `01-before-design.png` | Initial prototype before redesign | 1440px |
| 02 | `02-after-design.png` | Final polished interface | 1440px |
| 03 | `03-desktop-layout.png` | Full desktop view | 1440 × 900px |
| 04 | `04-tablet-layout.png` | Tablet view | 768 × 1024px |
| 05 | `05-mobile-layout.png` | Mobile view | 390 × 844px |
| 06 | `06-navigation-bar.png` | Navbar — desktop and mobile hamburger | 1440px + 390px |
| 07 | `07-hero-section.png` | Hero section with café card | 1440px |
| 08 | `08-features-section.png` | Features — large block + 2×2 cards | 1440px |
| 09 | `09-pricing-cards.png` | Menu section with real drink categories | 1440px |
| 10 | `10-testimonials.png` | Staggered testimonial cards | 1440px |
| 11 | `11-footer.png` | 4-column footer | 1440px |
| 12 | `12-vscode-project-structure.png` | VS Code Explorer — full project tree | — |
| 13 | `13-blade-components-folder.png` | All 11 component files in VS Code | — |
| 14 | `14-github-repository.png` | GitHub repository page | — |

**How to take screenshots:**

1. Run `php artisan serve` and open `http://localhost:8000`
2. Press `F12` to open Chrome DevTools
3. Click the device toolbar icon or press `Ctrl+Shift+M`
4. Enter the viewport dimensions from the table above
5. Use the browser's built-in screenshot tool or a screen capture tool

---

## 10. Technologies Used

| Technology | Version | Purpose |
| --- | --- | --- |
| **Laravel** | 12.x | PHP framework, routing, Blade templating |
| **PHP** | 8.2+ | Server-side language |
| **Blade** | Built-in | Laravel templating engine and component system |
| **Tailwind CSS** | v4.3.x | Utility-first CSS framework |
| **Vite** | v8.x | Modern asset bundler (CSS + JS + fonts) |
| **@tailwindcss/vite** | v4.3.x | Tailwind v4 Vite plugin |
| **Instrument Sans** | via Bunny | Modern sans-serif font loaded through Vite |
| **HTML5** | — | Semantic markup structure |
| **Vanilla JavaScript** | — | Mobile menu toggle — no external libraries |
| **Git** | — | Version control |
| **GitHub** | — | Remote repository hosting |

---

## 11. Installation

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- npm

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

# 7. Build front-end assets
npm run build
```

### Running the Development Server

Open two terminal windows:

**Terminal 1 — Vite dev server (hot reload):**
```bash
npm run dev
```

**Terminal 2 — Laravel server:**
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

### Building for Production

```bash
npm run build
php artisan serve
```

---

## 12. Credits & References

| Resource | URL |
| --- | --- |
| Official Sideout Cafe Website | [sideout-cafe.com](https://www.sideout-cafe.com/) |
| Sideout Cafe on Google Maps | [maps.app.goo.gl/cUTeXGX83iXzW5D18](https://maps.app.goo.gl/cUTeXGX83iXzW5D18) |
| Laravel Documentation | [laravel.com/docs](https://laravel.com/docs) |
| Tailwind CSS Documentation | [tailwindcss.com/docs](https://tailwindcss.com/docs) |
| Lucide Icons (SVG reference) | [lucide.dev](https://lucide.dev) |
| Instrument Sans font | [Bunny Fonts](https://fonts.bunny.net) |

---

## GitHub Repository

```
https://github.com/YOUR_USERNAME/week05-product-landing-page
```

> Replace `YOUR_USERNAME` with your actual GitHub username before submitting.

---

_README prepared for ITST 302 – Client-Server Technologies · Week 5 · MP04 · Academic Year 2026_
