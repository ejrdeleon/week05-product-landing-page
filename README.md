# Sideout Café — Responsive Product Landing Page

Mini Project 04 · ITST 302 Client-Server Technologies · Week 5

A responsive landing page built with **Laravel**, **Blade Components**, and **Tailwind CSS**
for **Sideout Café**, a real coffee shop in Brgy. Maytalang I, Lumban, Laguna.

---

## 1. Introduction

A product landing page is a single, focused web page designed to introduce a product or
business, communicate its value clearly, and drive a specific action — signing up,
subscribing, or visiting in person. For small local businesses like Sideout Café, a landing
page is often the only formal online presence beyond social media, so it has to do the work
of a menu board, a storefront, and a sign-up counter all at once.

This project recreates Sideout Café's identity — its coffee-and-waffles menu, garden
seating on the old WinArt resort grounds, and points-per-drink loyalty program — as a
modern, responsive, component-based Laravel application. The purpose is twofold: give the
café a page that could realistically drive loyalty sign-ups, and practice the Blade +
Tailwind workflow used across the industry for building maintainable frontends.

## 2. Objectives

- Built responsive interfaces for desktop, tablet, and mobile using Tailwind CSS.
- Created seven reusable Blade Components (`navbar`, `hero`, `feature-card`,
  `pricing-card`, `testimonial-card`, `button`, `footer`) instead of duplicating markup.
- Applied Flexbox and CSS Grid for layout across every section.
- Organized the frontend following Laravel's `layouts` / `components` / `pages` convention.
- Maintained consistent typography, spacing, and a limited amber/stone color palette.
- Documented the component architecture and design decisions in this README.
- Published the project to GitHub and LinkedIn as a portfolio piece.

## 3. Responsive Web Design

**Mobile-first design.** Base utility classes target mobile layout first; `sm:`, `md:`,
and `lg:` breakpoints progressively add columns and spacing as the viewport grows. The
navbar, for example, defaults to a hamburger menu and only shows the full link row at `md:`.

**Responsive breakpoints.** Tailwind's default breakpoints (`sm: 640px`, `md: 768px`,
`lg: 1024px`) drive every layout shift in this project — hero grid columns, feature card
counts (1 → 2 → 3 per row), and pricing card stacking.

**Flexbox** handles one-dimensional alignment: navbar link rows, button groups, footer
social icons, testimonial card contents.

**CSS Grid** handles two-dimensional layout: the hero (`grid lg:grid-cols-2`), the features
section (`grid sm:grid-cols-2 lg:grid-cols-3`), and the footer's four-column link layout.

**User experience.** Sticky navigation keeps sign-up and menu links always reachable;
generous spacing (`py-20`, `gap-6`) and a warm, limited color palette keep the page calm
and readable rather than cluttered — important on a page whose whole job is to get someone
to tap "Join."

Responsive design matters here specifically because most of Sideout's actual customers
find the café through Instagram or TikTok on their phones — the mobile layout is the one
that gets used most, not an afterthought.

## 4. Tailwind CSS

**Utility-first CSS.** Instead of writing custom CSS classes and switching files, styling
is composed directly in the markup: `class="px-6 py-3 rounded-full bg-amber-700"` reads as
padding, border radius, and background color without leaving the Blade file.

**Advantages used in this project:**
- No context-switching between `.blade.php` and a stylesheet.
- Consistent spacing/color scale (`amber-700`, `amber-800`, `stone-100`...) keeps the
  palette from drifting section to section.
- Small utility diffs make refactoring a section low-risk.

**Responsive utilities** — e.g. `grid sm:grid-cols-2 lg:grid-cols-3` on the features
section, or `hidden md:flex` on the desktop nav — apply different rules per breakpoint
without media query blocks.

**Component styling example** — the `<x-button>` component centralizes every button
variant (`primary`, `secondary`, `ghost`) as a single Tailwind class string, so every CTA
across the page stays visually consistent by construction rather than by convention.

## 5. Blade Components

**What they are.** Blade Components are reusable, self-contained view files
(`resources/views/components/*.blade.php`) that can accept data via `@props` and be
dropped into any page with `<x-component-name />`.

**Why they matter here.** The pricing section alone needed three near-identical cards; the
features section needed six. Without components, that's 9 blocks of duplicated markup to
maintain. With `<x-pricing-card>` and `<x-feature-card>`, each instance is a one-line call
with different props — a design tweak to the card only has to happen once.

**Components built:**

| Component | Responsibility |
|---|---|
| `navbar.blade.php` | Sticky nav, desktop links, Alpine.js-powered mobile menu |
| `hero.blade.php` | Product name, headline, description, dual CTA, image |
| `feature-card.blade.php` | Icon + title + description, used 6x |
| `pricing-card.blade.php` | Loyalty tier card with a `highlighted` prop for the featured plan |
| `testimonial-card.blade.php` | Customer photo, name, position, review |
| `button.blade.php` | Single source of truth for every CTA style (`primary`/`secondary`/`ghost`) |
| `footer.blade.php` | Company info, quick links, contact, social |

Example — reusing the feature card six times with different content:

```blade
<x-feature-card icon="☕" title="Specialty Coffee" description="Hand-pulled espresso..." />
<x-feature-card icon="🧇" title="Waffles & Bites" description="Sweet and savory waffles..." />
```

## 6. User Interface Design

- **Color palette:** amber (`amber-700`/`800`) as the brand/accent color against a warm
  `stone` neutral scale — evokes coffee without leaning on brown/beige clichés.
- **Typography:** a single sans-serif stack, weight used to build hierarchy
  (`font-extrabold` headlines, `font-semibold` labels, regular body text).
- **Iconography:** simple emoji icons (☕ 🧇 🌿) keep the feature cards lightweight and
  on-brand without pulling in an icon library.
- **Button styles:** three variants (`primary`, `secondary`, `ghost`) cover every CTA
  context — filled for primary actions, outlined for secondary, text-only for tertiary
  links — all from the one `<x-button>` component.
- **Card design:** consistent rounded corners (`rounded-2xl`), soft shadows, and hover
  lift (`hover:-translate-y-1`) unify feature, pricing, and testimonial cards.
- **Layout consistency:** every section uses the same `max-w-7xl mx-auto px-4 sm:px-6
  lg:px-8` container and `py-20` vertical rhythm, so the page reads as one system.

## 7. Folder Structure

```
week05-product-landing-page/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php       # Base HTML shell every page extends
│   │   ├── components/             # Reusable UI building blocks
│   │   │   ├── navbar.blade.php
│   │   │   ├── hero.blade.php
│   │   │   ├── feature-card.blade.php
│   │   │   ├── pricing-card.blade.php
│   │   │   ├── testimonial-card.blade.php
│   │   │   ├── button.blade.php
│   │   │   └── footer.blade.php
│   │   └── pages/
│   │       └── landing.blade.php   # Assembles components into the full page
├── routes/
│   └── web.php                     # Serves the landing page at "/"
├── public/
│   └── images/                     # Café photos (see note below)
├── screenshots/                    # Desktop/tablet/mobile + component screenshots
├── documentation/                  # Before-and-after comparison images
└── README.md
```

- `resources/views/layouts` — the one HTML skeleton (head, nav, footer slot) every page extends.
- `resources/views/components` — self-contained, reusable, prop-driven UI pieces.
- `resources/views/pages` — actual routed pages, composed almost entirely of components.
- `public` — web-accessible static assets (images referenced via `asset()`).
- `screenshots` — evidence of responsive testing across breakpoints and components.
- `documentation` — before/after design evolution.

> **Note on images:** `public/images/` currently has no files checked in. Before final
> submission, add real photos (`hero-mockup.jpg`, `showcase-interior.jpg`,
> `showcase-drink.jpg`, `showcase-mobile.jpg`, `avatar-placeholder.jpg`) — either your own
> shots of the café or photos pulled from Sideout's Instagram/TikTok with permission.

## 8. Screenshots

_Add screenshots to `/screenshots` and reference them here before submission:_

- [ ] Desktop View
- [ ] Tablet View
- [ ] Mobile View
- [ ] Navigation Bar (open + mobile menu state)
- [ ] Hero Section
- [ ] Features Section
- [ ] Pricing / Loyalty Tiers Section
- [ ] Testimonials
- [ ] Footer
- [ ] Blade Components folder (VS Code)
- [ ] GitHub Repository

## 9. Before-and-After Comparison

_Add to `/documentation` before submission:_

- **Before:** initial wireframe / unstyled HTML structure.
- **After:** final responsive, styled interface shown above.

---

## Setup

```bash
composer create-project laravel/laravel week05-product-landing-page
cd week05-product-landing-page
npm install
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
# copy resources/, routes/web.php from this repo into the fresh project
npm run dev
php artisan serve
```

## Tech Stack

Laravel · Blade Components · Tailwind CSS · Alpine.js (mobile nav toggle)
