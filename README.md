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

A fully responsive, multi-page product landing page built with Laravel 12, Blade Components, Tailwind CSS v4, and Vite — made for Sideout Cafe, a local coffee shop in Lumban, Laguna, Philippines.

---

## 2. Introduction

### What is a Product Landing Page?

A product landing page is a standalone web page built to promote one specific thing — a product, a service, or in this case, a local café. It's different from a regular website because it only has one goal: get the visitor to do something. For Sideout Cafe, that means getting people to check the menu, find the location, or learn about the loyalty program.

A typical landing page has:

- A hero section with a headline and a clear call to action
- A features section that explains what makes the place worth visiting
- A menu or pricing section
- Testimonials from customers
- A loyalty or rewards section
- A contact or location section

### Why Landing Pages Matter for Businesses

For a small local business like Sideout Cafe, a landing page is basically their digital storefront. Most people will look up a café online before deciding to visit. If the page looks bad or doesn't load properly on mobile, they'll just move on.

A good landing page:

- Gets the point across fast — people don't read, they scan
- Pushes visitors toward one action instead of overwhelming them with options
- Looks professional enough to build trust
- Works on any device, especially phones
- Helps people find the place through Google Maps integration

In the Philippines, most people browse on their phones. A café that only has a desktop-friendly site is already losing customers.

### Purpose of This Project

This project was built to practice:

- Laravel Blade Components for building reusable UI pieces
- Tailwind CSS v4 for styling without writing custom CSS files
- Vite for bundling assets with hot reload during development
- Responsive design applied to a real local business
- Accessibility basics like ARIA labels and semantic HTML

### About Sideout Cafe

Sideout Cafe is a real café in Lumban, Laguna, Philippines (4014). Their official site at [sideout-cafe.com](https://www.sideout-cafe.com/) has a loyalty program where customers earn one point per personal drink. The menu data in this project comes directly from their official website.

---

## 3. Objectives

| Objective                                           | Where It Was Applied                  |
| --------------------------------------------------- | ------------------------------------- |
| ✅ Build responsive layouts with Tailwind CSS       | All sections across all pages         |
| ✅ Create and reuse Laravel Blade Components        | 11 components across the project      |
| ✅ Apply mobile-first responsive design             | All breakpoints from 320px upward     |
| ✅ Implement modular component architecture         | `resources/views/components/`         |
| ✅ Use CSS Grid for multi-column layouts            | Features, Menu, Footer, Hero          |
| ✅ Use Flexbox for inline and navigation layouts    | Navbar, buttons, stat strips          |
| ✅ Apply Tailwind utility classes and breakpoints   | Throughout all components             |
| ✅ Demonstrate UI/UX design principles              | Dark design system, visual hierarchy  |
| ✅ Structure a Laravel application with layouts     | `layouts/app.blade.php`               |
| ✅ Implement a working contact form with validation | `ContactController.php`               |
| ✅ Connect to the official business website         | All pages link to `sideout-cafe.com`  |
| ✅ Use real menu data from the official source      | Menu page and home page menu section  |
| ✅ Use Git for version control                      | Commits throughout development        |
| ✅ Prepare a GitHub-ready public repository         | `.gitignore`, README, clean structure |

---

## 4. Responsive Web Design

### Mobile-First Design

The whole project is built mobile-first. That means the base styles are written for small screens, and then `sm:`, `md:`, `lg:`, and `xl:` prefixes are added to adjust the layout for bigger screens. Nothing is designed for desktop first and then shrunk down.

```html
<!-- starts as 1 column on mobile, expands to 4 on desktop -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">...</div>
```

### Responsive Breakpoints

| Prefix   | Min-width | Used For                    |
| -------- | --------- | --------------------------- |
| _(none)_ | 0px       | Mobile base styles          |
| `sm:`    | 640px     | Large phones, small tablets |
| `md:`    | 768px     | Tablets                     |
| `lg:`    | 1024px    | Laptops                     |
| `xl:`    | 1280px    | Desktops                    |
| `2xl:`   | 1536px    | Wide monitors               |

### Tested Viewports

| Device       | Size          |
| ------------ | ------------- |
| iPhone SE    | 375 × 667px   |
| iPhone 14    | 390 × 844px   |
| Android      | 414 × 896px   |
| iPad         | 768 × 1024px  |
| iPad Air     | 820 × 1180px  |
| Laptop       | 1366 × 768px  |
| Desktop      | 1440 × 900px  |
| Wide Desktop | 1920 × 1080px |

### Flexbox

Flexbox handles one-dimensional layouts — the navbar, button groups, icon-text rows, and the stat strip in the hero.

```html
<!-- navbar -->
<nav class="flex items-center justify-between h-[68px]">
    <!-- logo left, links center, CTA right -->
</nav>

<!-- hero stat strip -->
<div class="flex flex-wrap items-center gap-6 sm:gap-8">
    <div>...</div>
    <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
    <div>...</div>
</div>
```

### CSS Grid

Grid handles all the multi-column sections.

```html
<!-- asymmetric hero: text left, card right -->
<div class="grid lg:grid-cols-[1fr_420px] xl:grid-cols-[1fr_460px]">...</div>

<!-- features: big block left, 2x2 grid right -->
<div class="grid lg:grid-cols-2 gap-6 lg:gap-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">...</div>
</div>

<!-- full menu: 4 categories -->
<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">...</div>

<!-- footer -->
<div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1fr]">...</div>
```

### User Experience (UX)

A few specific decisions made for usability:

- No horizontal scrolling at any screen size
- All buttons and links are at least 44px tall for touch targets
- Body text is capped with `max-w-xl` so lines don't stretch too wide on large screens
- The middle testimonial card is offset upward on desktop (`lg:-mt-6`) so the row doesn't look like three identical boxes
- The navbar collapses to a hamburger at the `md` breakpoint with a smooth animation
- Section padding scales with `py-20 lg:py-28` so mobile doesn't feel cramped and desktop doesn't feel empty

### Why Responsive Design Matters

Most people in the Philippines browse on their phones. If a café's website only works on desktop, it's already failing most of its potential customers. This project makes sure the page works properly at every size — the menu is readable, the buttons are easy to tap, and the map loads correctly on mobile.

---

## 5. Tailwind CSS

### Utility-First CSS

Instead of writing `.card { background: ...; border-radius: ...; }` in a separate CSS file, Tailwind lets you write those styles directly in the HTML using small utility classes. The result is that you never have to leave the template file to understand what something looks like.

```html
<!-- old way -->
<div class="card">...</div>

<!-- tailwind way -->
<div class="rounded-2xl bg-so-surface border border-white/[0.06] p-6">...</div>
```

### Advantages of Tailwind CSS

1. No switching between HTML and CSS files while building
2. Unused classes are automatically removed in production builds
3. Every utility has responsive variants built in (`sm:`, `md:`, `lg:`, etc.)
4. The spacing and sizing scale is consistent — no random pixel values
5. Custom design tokens in `@theme` make the brand colors available as utility classes

### Custom Design Tokens (`resources/css/app.css`)

```css
@theme {
    --font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;

    --color-so-bg: #0a0d0b;
    --color-so-surface: #111613;
    --color-so-surface2: #171d19;
    --color-so-accent: #9af06a;
    --color-so-accent2: #d9f7c0;
    --color-so-text: #f5f7f2;
    --color-so-muted: #9ca69d;
}
```

After defining these, `bg-so-bg`, `text-so-accent`, `border-so-surface2`, etc. all work as regular Tailwind classes.

### Responsive Utility Classes

```html
<!-- fluid hero heading — no breakpoint jumps needed -->
<h1
    class="text-[clamp(2.6rem,7vw,5.5rem)] font-black leading-[0.95] tracking-[-0.04em]"
>
    Where every cup feels like home.
</h1>

<!-- section padding scales up on desktop -->
<section class="py-20 lg:py-28">...</section>

<!-- grid expands at each breakpoint -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">...</div>

<!-- café card only shows on desktop -->
<div class="hidden lg:flex flex-col justify-center">...</div>
```

### Component Styling Examples

**Navbar:**

```html
<header
    class="fixed top-0 left-0 right-0 z-50 border-b border-white/[0.06]
               bg-so-bg/95 backdrop-blur-md"
></header>
```

**Feature card:**

```html
<div
    class="group flex flex-col gap-4 p-6 rounded-2xl bg-so-surface
            border border-white/[0.06] hover:border-so-accent/30
            hover:bg-so-surface2 transition-all duration-300"
></div>
```

**Primary button:**

```html
<a
    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl
          bg-so-accent text-so-bg text-sm font-bold
          hover:bg-so-accent2 transition-colors duration-200"
>
    View the Menu
</a>
```

**Loyalty point grid:**

```html
<div class="grid grid-cols-5 gap-2">
    <div
        class="h-8 rounded-lg bg-so-accent text-so-bg flex items-center
                justify-center text-xs font-bold"
    >
        ✓
    </div>
    <div
        class="h-8 rounded-lg bg-so-bg border border-white/10
                text-so-muted/40 flex items-center justify-center text-xs"
    >
        8
    </div>
</div>
```

### Tailwind Configuration (`tailwind.config.js`)

```js
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                so: {
                    bg: "#0A0D0B",
                    surface: "#111613",
                    surface2: "#171D19",
                    accent: "#9AF06A",
                    accent2: "#D9F7C0",
                    text: "#F5F7F2",
                    muted: "#9CA69D",
                },
            },
            fontFamily: {
                sans: [
                    "Instrument Sans",
                    "ui-sans-serif",
                    "system-ui",
                    "sans-serif",
                ],
            },
        },
    },
};
```

---

## 6. Blade Components

### What are Blade Components?

Blade Components are reusable pieces of UI stored in `resources/views/components/`. You call them with `<x-component-name>` and pass data through props defined with `@props`. Instead of copying the same card HTML five times across different pages, you write it once and reuse it everywhere.

```blade
<x-feature-card
    title="Simple loyalty rewards"
    description="One personal drink equals one point."
    :icon="'<svg ...>...</svg>'"
/>
```

### Why Reusable Components Improve Maintainability

Without components, you end up copying HTML blocks across multiple files. Then when you need to change something — a border radius, a color, a spacing value — you have to find and update every copy. With components, you change one file and every instance updates automatically.

It also keeps page templates clean. `home.blade.php` reads like a list of sections rather than hundreds of lines of raw HTML.

### Benefits of Modular UI Development

- Each component does one thing and does it well
- Props define a clear interface — you know exactly what data a component expects
- Components can be dropped into any page without modification
- Updating one component doesn't break anything else

### Component Inventory

| Component              | File                         | What It Does                                 |
| ---------------------- | ---------------------------- | -------------------------------------------- |
| `<x-navbar>`           | `navbar.blade.php`           | Sticky nav with mobile hamburger menu        |
| `<x-hero>`             | `hero.blade.php`             | Asymmetric two-column hero section           |
| `<x-feature-card>`     | `feature-card.blade.php`     | Icon + title + description tile              |
| `<x-pricing-card>`     | `pricing-card.blade.php`     | Menu/drink card with optional featured badge |
| `<x-testimonial-card>` | `testimonial-card.blade.php` | Star rating + review + author                |
| `<x-footer>`           | `footer.blade.php`           | Four-column footer                           |
| `<x-button>`           | `button.blade.php`           | Button with four style variants              |
| `<x-container>`        | `container.blade.php`        | Max-width wrapper with responsive padding    |
| `<x-badge>`            | `badge.blade.php`            | Small pill/label badge                       |
| `<x-section-heading>`  | `section-heading.blade.php`  | Label + heading + subtitle pattern           |
| `<x-stat-card>`        | `stat-card.blade.php`        | Large number + label display                 |

### `<x-feature-card>` Example

```blade
{{-- component definition --}}
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

```blade
{{-- usage in home.blade.php --}}
<x-feature-card
    title="Simple loyalty rewards"
    description="One personal drink equals one point. Every visit counts."
    :icon="'<svg viewBox=\'0 0 24 24\' ...>...</svg>'"
/>
```

### `<x-button>` Example

Renders an `<a>` tag when `href` is set, a `<button>` otherwise.

```blade
{{-- primary CTA --}}
<x-button variant="primary" href="{{ route('menu') }}">View the Menu</x-button>

{{-- outline link --}}
<x-button variant="outline" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18">
    Find Us
</x-button>

{{-- form submit --}}
<x-button variant="primary" type="submit" class="w-full">Send Message</x-button>
```

### `<x-testimonial-card>` Example

Auto-derives initials from the name and clamps stars between 1 and 5.

```blade
@php
    $avatarInitials = $initials ?: implode('', array_map(
        fn ($w) => strtoupper($w[0]),
        array_filter(array_slice(explode(' ', trim($name)), 0, 2))
    ));
    $starCount = max(1, min(5, (int) $stars));
@endphp
```

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

| Role             | Token             | Hex                           | Used For                |
| ---------------- | ----------------- | ----------------------------- | ----------------------- |
| Background       | `bg-so-bg`        | `#0A0D0B`                     | Page background         |
| Surface          | `bg-so-surface`   | `#111613`                     | Cards, sections         |
| Surface 2        | `bg-so-surface2`  | `#171D19`                     | Elevated cards, inputs  |
| Primary Accent   | `text-so-accent`  | `#9AF06A`                     | CTAs, highlights, icons |
| Secondary Accent | `text-so-accent2` | `#D9F7C0`                     | Hover states            |
| Text             | `text-so-text`    | `#F5F7F2`                     | Headings, body text     |
| Muted            | `text-so-muted`   | `#9CA69D`                     | Secondary text, labels  |
| Borders          | —                 | `rgba(255,255,255,0.06–0.14)` | Card borders            |

The near-black base keeps the focus on the content. The green accent (`#9AF06A`) has enough contrast to stand out on dark backgrounds while still feeling natural for a café — not like a tech startup.

### Typography

- **Font:** Instrument Sans via Bunny Fonts, loaded through Vite
- **Weights:** 400, 500, 600, and 900 (black for the hero heading)
- **Hero H1:** `text-[clamp(2.6rem,7vw,5.5rem)] font-black leading-[0.95] tracking-[-0.04em]`
- **Section headings:** `text-3xl sm:text-4xl font-bold tracking-tight`
- **Body:** `text-base leading-7 text-so-muted`
- **Labels:** `text-[11px] font-semibold uppercase tracking-[0.28em]`
- **Gradient text:** `.gradient-text` class for key words in headings

Using `clamp()` on the hero heading means it scales smoothly between mobile and desktop without needing separate breakpoint overrides.

### Iconography

All icons are inline SVG — no icon library, no extra HTTP requests. They're based on the Lucide icon set. Icons used:

- Coffee cup — logo, features, about
- Map pin — location, directions
- Gift — loyalty sections
- House — atmosphere feature
- Users — community feature
- Star — testimonial ratings
- Arrow right — CTA links
- Globe — official website links
- Hamburger / X — mobile menu toggle

Inline icons at `w-4 h-4` for text-level use, `w-5 h-5` inside icon containers.

### Button Styles

| Variant     | Look                         | When to Use        |
| ----------- | ---------------------------- | ------------------ |
| `primary`   | Green fill, dark text        | Main CTAs          |
| `secondary` | Dark surface, subtle border  | Secondary actions  |
| `ghost`     | Transparent, muted text      | Low-priority links |
| `outline`   | Green border, fills on hover | Alternative CTAs   |

All variants share `rounded-xl`, `font-semibold`, `text-sm`, and `transition-colors duration-200`.

### Card Design

Every card in the project follows the same base pattern:

- `rounded-2xl` corners
- `bg-so-surface` or `bg-so-surface2` background
- `border border-white/[0.06]` — barely visible border that defines the edge
- `hover:border-so-accent/30` — green tint on hover
- `transition-all duration-300`

The Special Coffee menu card breaks from this slightly with `border-so-accent/[0.20]` to mark it as featured without being too loud.

### Layout Consistency

Every section uses the same container (`max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`), the same section padding (`py-20 lg:py-28`), and the same label pattern (short green line + small uppercase text). Sections alternate between `bg-so-bg` and `bg-so-surface` backgrounds so there's natural separation without needing dividers.

### Accessibility

- Semantic HTML: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`
- Skip to main content link for keyboard/screen reader users
- `aria-label` on icon-only buttons and the map iframe
- `aria-expanded` on the mobile menu button, toggled by JavaScript
- `role="img"` and `aria-label` on the loyalty point grid and star ratings
- Focus rings on all interactive elements: `focus:ring-2 focus:ring-so-accent/50`
- Green accent on dark background passes WCAG AA contrast ratio

---

## 8. Folder Structure

```
week05-product-landing-page/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── ContactController.php     validates and logs contact form submissions
│
├── resources/
│   ├── css/
│   │   └── app.css                       Tailwind v4 entry, @theme tokens, keyframes
│   ├── js/
│   │   └── app.js                        Vite JS entry point
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php             root HTML shell — head, Vite, meta, skip link
│       ├── components/
│       │   ├── navbar.blade.php
│       │   ├── hero.blade.php
│       │   ├── feature-card.blade.php
│       │   ├── pricing-card.blade.php
│       │   ├── testimonial-card.blade.php
│       │   ├── footer.blade.php
│       │   ├── button.blade.php
│       │   ├── container.blade.php
│       │   ├── badge.blade.php
│       │   ├── section-heading.blade.php
│       │   └── stat-card.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── menu.blade.php
│           ├── about.blade.php
│           ├── loyalty.blade.php
│           └── contact.blade.php
│
├── public/
│   └── build/                            compiled Vite assets (CSS, JS, fonts)
│
├── routes/
│   └── web.php                           all routes
│
├── screenshots/                          viewport screenshots for documentation
├── documentation/                        component reference, LinkedIn post draft
├── tailwind.config.js
├── vite.config.js
├── postcss.config.js
└── README.md
```

**`resources/views/layouts/`** — the root HTML shell. Every page extends `layouts.app` with `@extends('layouts.app')`. It handles the `<head>`, Vite asset injection, SEO meta, Open Graph tags, and the skip link. Content goes in via `@section('content')`.

**`resources/views/components/`** — all 11 reusable components. This is the core of the project architecture. Each component is self-contained with its own props and markup.

**`resources/views/pages/`** — the five page templates. Each one extends the layout and assembles its content from components. The files are intentionally short — they describe what's on the page, not how each piece is built.

**`public/`** — the web server root. The `build/` folder inside is generated by `npm run build` and contains hashed, production-ready CSS, JS, and font files. Never edit this manually.

**`screenshots/`** — PNG screenshots at various viewports for documentation and submission.

**`documentation/`** — supplementary docs including the component architecture reference.

---

## 9. Screenshots

### Device Layouts

**Desktop View (1440 × 900px)**
![Full desktop view](desktop.jpg)

**Tablet View (768 × 1024px)**
![Tablet view](tablet.jpg)

**Mobile View (390 × 844px)**
![Mobile view](mobile.png)

---

### Page Sections

**Features**
![Features — large block + 2x2 grid](features.png)

**Menu & Pricing**
![Menu section with real drink data](menu.png)

**Testimonials**
![Staggered testimonial cards](testimonials.png)

**Footer**
![4-column footer](footer.png)

---

### Project Files & Version Control

**VS Code Project Structure**
![VS Code Explorer — full project tree](folder_structure.jpg)

**GitHub Repository**
![GitHub repository page](repo.png)

---

## 10. Technologies Used

| Technology         | Version   | Purpose                                  |
| ------------------ | --------- | ---------------------------------------- |
| Laravel            | 12.x      | PHP framework, routing, Blade templating |
| PHP                | 8.2+      | Server-side language                     |
| Blade              | built-in  | Templating engine and component system   |
| Tailwind CSS       | v4.3.x    | Utility-first CSS framework              |
| Vite               | v8.x      | Asset bundler                            |
| @tailwindcss/vite  | v4.3.x    | Tailwind v4 Vite plugin                  |
| Instrument Sans    | via Bunny | Font loaded through Vite                 |
| Vanilla JavaScript | —         | Mobile menu toggle, no libraries         |
| Git                | —         | Version control                          |
| GitHub             | —         | Remote repository                        |

---

## 11. Installation

**Requirements:** PHP 8.2+, Composer, Node.js 18+, npm

```bash
git clone https://github.com/ejrdeleon/week05-product-landing-page.git
cd week05-product-landing-page
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build
```

**Development (with hot reload):**

```bash
# terminal 1
npm run dev

# terminal 2
php artisan serve
```

Open `http://localhost:8000`.

---

## 12. Credits & References

| Resource                      | URL                                                                            |
| ----------------------------- | ------------------------------------------------------------------------------ |
| Official Sideout Cafe Website | [sideout-cafe.com](https://www.sideout-cafe.com/)                              |
| Sideout Cafe on Google Maps   | [maps.app.goo.gl/cUTeXGX83iXzW5D18](https://maps.app.goo.gl/cUTeXGX83iXzW5D18) |
| Laravel Documentation         | [laravel.com/docs](https://laravel.com/docs)                                   |
| Tailwind CSS Documentation    | [tailwindcss.com/docs](https://tailwindcss.com/docs)                           |
| Lucide Icons                  | [lucide.dev](https://lucide.dev)                                               |
| Instrument Sans               | [fonts.bunny.net](https://fonts.bunny.net)                                     |

---

## GitHub Repository

```
https://github.com/ejrdeleon/week05-product-landing-page
```

---

_ITST 302 – Client-Server Technologies · Week 5 · MP04 · Academic Year 2026_
