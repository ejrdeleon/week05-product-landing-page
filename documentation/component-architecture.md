# Component Architecture Documentation
## MP04 – Sideout Café · Responsive Product Landing Page
### ITST 302 – Client-Server Technologies · Week 5

---

## Overview

This project uses **Laravel Blade Components** to build a modular, reusable, and maintainable UI.
Instead of writing repeated HTML markup for every card, button, or section, each UI pattern is
extracted into its own Blade component file stored in:

```
resources/views/components/
```

Every component is invoked in Blade templates using the `<x-component-name>` syntax.

---

## Architecture Diagram

```
layouts/
└── app.blade.php                  ← Root HTML wrapper (Vite, meta, SEO)

pages/
└── home.blade.php                 ← Landing page, @extends layouts.app

components/
├── navbar.blade.php               ← Sticky responsive navigation
├── hero.blade.php                 ← Full-viewport hero section
├── feature-card.blade.php         ← Reusable feature tile
├── pricing-card.blade.php         ← Reusable pricing plan card
├── testimonial-card.blade.php     ← Reusable review card
├── footer.blade.php               ← Full-width footer
├── button.blade.php               ← Multi-variant button/link
├── container.blade.php            ← Max-width responsive wrapper
├── badge.blade.php                ← Pill/label badge
├── section-heading.blade.php      ← Label + title + subtitle
└── stat-card.blade.php            ← Number + label stat display
```

---

## Component Reference

---

### 1. `<x-navbar />`

**File:** `resources/views/components/navbar.blade.php`

**Purpose:** Sticky top navigation bar with desktop links, action buttons, and mobile hamburger menu.

**Features:**
- Fixed position with `backdrop-filter: blur(16px)` glass effect
- Desktop nav: Home, Features, Pricing, Testimonials, Contact
- Mobile hamburger toggle using vanilla JavaScript (no external libraries)
- Smooth `max-height` animation for the mobile menu panel
- ARIA labels and `aria-expanded` for accessibility
- Escape key closes mobile menu
- Uses `<x-container>` and `<x-button>` internally

**Usage:**
```blade
<x-navbar />
```

**No props required** — this is a self-contained navigation component.

**JavaScript approach (no Alpine.js, no jQuery):**
```javascript
function toggleMobileMenu() { ... }
function openMobileMenu()   { ... }
function closeMobileMenu()  { ... }
```

---

### 2. `<x-hero />`

**File:** `resources/views/components/hero.blade.php`

**Purpose:** Premium two-column hero section with loyalty dashboard mockup visual.

**Features:**
- Left column: badge, large gradient headline, supporting copy, dual CTA buttons
- Right column: CSS/HTML loyalty card mockup (clearly labeled as academic prototype)
- Floating badges for drink count and next reward
- Background glow orbs (decorative, `aria-hidden`)
- Subtle grid overlay
- Responsive: 2-col on `lg`, stacked on mobile

**Usage:**
```blade
<x-hero />
```

**Design notes:**
- Headline uses `.gradient-text` utility for green gradient on key words
- Loyalty card progress bar uses `aria-valuenow`, `aria-valuemin`, `aria-valuemax`
- The "1 drink = 1 point" claim is sourced from the official Sideout Café website

---

### 3. `<x-feature-card>`

**File:** `resources/views/components/feature-card.blade.php`

**Purpose:** Reusable card displaying an SVG icon, title, and description for a feature.

**Props:**

| Prop | Type | Description |
|------|------|-------------|
| `icon` | `string` | Raw SVG markup string (rendered unescaped via `{!! !!}`) |
| `title` | `string` | Card heading |
| `description` | `string` | Short supporting paragraph |

**Usage:**
```blade
<x-feature-card
    title="Loyalty Rewards"
    description="Earn one point for every personal drink purchased."
    :icon="'<svg ...>...</svg>'"
/>
```

**Hover behavior:**
- Card lifts with `-translate-y-1`
- Border reveals `so-accent/30` on hover
- Background shifts from `so-surface` to `so-surface2`

---

### 4. `<x-pricing-card>`

**File:** `resources/views/components/pricing-card.blade.php`

**Purpose:** Reusable pricing plan card with optional "Most Popular" highlight.

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `plan` | `string` | `'Plan'` | Plan name |
| `price` | `string` | `'₱0'` | Formatted price (e.g., `₱249`) |
| `popular` | `boolean` | `false` | Highlights as most popular with accent ring |
| `ctaLabel` | `string` | `'Get Started'` | CTA button text |
| `$slot` | `HTML` | — | List of `<li>` feature items |

**Usage:**
```blade
<x-pricing-card plan="Sideout Regular" price="₱249" :popular="true">
    <li class="flex items-center gap-2">
        <svg ...>...</svg> Sample drink + snack concept
    </li>
    <li>...</li>
</x-pricing-card>
```

**Built-in disclaimer:**
Every card automatically includes:
```
⚠ Sample content for academic prototype — not official Sideout Café pricing.
```

---

### 5. `<x-testimonial-card>`

**File:** `resources/views/components/testimonial-card.blade.php`

**Purpose:** Reusable review card with SVG initials avatar, star rating, and labeled sample content disclaimer.

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | `'Sample Customer'` | Display name |
| `position` | `string` | `'Café Visitor'` | Role/description |
| `review` | `string` | `''` | Review text |
| `stars` | `integer` | `5` | Star rating (1–5) |
| `initials` | `string` | `''` | Override avatar initials (auto-derived if empty) |

**Usage:**
```blade
<x-testimonial-card
    name="Sample Customer 01"
    position="Café Visitor"
    :stars="5"
    review="A great café experience in Lumban!"
/>
```

**Avatar approach:**
- Uses **SVG circles with initials** — no real photos included
- Initials are auto-derived from the first letter of each word in `$name`
- This avoids using identifiable real person photos without permission

---

### 6. `<x-footer />`

**File:** `resources/views/components/footer.blade.php`

**Purpose:** 4-column premium dark footer.

**Columns:**
1. **Brand** — Sideout Café name, tagline, verified location
2. **Quick Links** — Same anchor links as navbar
3. **Find Us** — Google Maps link (verified URL), loyalty note
4. **Official Links** — Official website, Google Maps, Join Loyalty

**Key notes:**
- Phone, email, social media handles **intentionally omitted** (unverified)
- Google Maps URL: `https://maps.app.goo.gl/cUTeXGX83iXzW5D18`
- Official website: `https://www.sideout-cafe.com/`
- Academic disclaimer in bottom bar

**Usage:**
```blade
<x-footer />
```

---

### 7. `<x-button>`

**File:** `resources/views/components/button.blade.php`

**Purpose:** Multi-variant reusable button that renders as `<a>` (with `href`) or `<button>` (without).

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `'primary'` | `primary`, `secondary`, `ghost`, `outline` |
| `href` | `string\|null` | `null` | URL (renders as `<a>` if set) |
| `type` | `string` | `'button'` | HTML button type |
| `class` | `string` | `''` | Additional classes |

**Variants:**

| Variant | Style |
|---------|-------|
| `primary` | Green background, dark text, glow shadow |
| `secondary` | Dark surface, subtle border |
| `ghost` | Transparent, muted text |
| `outline` | Transparent with green border, fills on hover |

**Usage:**
```blade
{{-- As a link --}}
<x-button variant="primary" href="https://www.sideout-cafe.com/">
    Get Started
</x-button>

{{-- As a submit button --}}
<x-button variant="secondary" type="submit">
    Send Message
</x-button>

{{-- Full width --}}
<x-button variant="outline" href="#contact" class="w-full">
    Contact
</x-button>
```

---

### 8. `<x-container>`

**File:** `resources/views/components/container.blade.php`

**Purpose:** Consistent max-width wrapper with responsive horizontal padding.

**Usage:**
```blade
<x-container>
    {{-- content limited to max-w-7xl, centered, with responsive padding --}}
</x-container>

<x-container class="py-8">
    {{-- with additional classes --}}
</x-container>
```

**Output equivalent:**
```html
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    ...
</div>
```

---

### 9. `<x-badge>`

**File:** `resources/views/components/badge.blade.php`

**Purpose:** Small pill/label for section labels, highlights, and status indicators.

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string` | `'green'` | `green`, `gray`, `accent` |

**Usage:**
```blade
<x-badge>Most Popular</x-badge>
<x-badge color="gray">Mobile View</x-badge>
<x-badge color="accent">Academic Prototype</x-badge>
```

---

### 10. `<x-section-heading>`

**File:** `resources/views/components/section-heading.blade.php`

**Purpose:** Consistent section title structure with optional badge label and subtitle.

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | `string\|null` | `null` | Badge label above title |
| `title` | `string` | `''` | Main heading (supports HTML for gradient spans) |
| `subtitle` | `string\|null` | `null` | Paragraph beneath title |
| `align` | `string` | `'center'` | `center` or `left` |

**Usage:**
```blade
<x-section-heading
    label="Why Choose Sideout"
    title="Everything you need in <span class='gradient-text'>one great café.</span>"
    subtitle="From specialty drinks to a loyalty program — here's what makes Sideout your spot."
/>
```

---

### 11. `<x-stat-card>`

**File:** `resources/views/components/stat-card.blade.php`

**Purpose:** Visual display of a key number and its label. Used in the showcase section.

**Props:**

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `number` | `string` | `'—'` | The large value to display |
| `label` | `string` | `''` | Small label below the number |

**Usage:**
```blade
<x-stat-card number="7" label="Points" />
<x-stat-card number="7" label="Drinks" />
```

---

## Design System

All components follow this shared design token system defined in `resources/css/app.css`:

| Token | Class (arbitrary) | Value |
|-------|-------------------|-------|
| Background | `bg-so-bg` | `#0A0D0B` |
| Surface | `bg-so-surface` | `#111613` |
| Surface 2 | `bg-so-surface2` | `#171D19` |
| Accent | `text-so-accent` | `#9AF06A` |
| Accent 2 | `text-so-accent2` | `#D9F7C0` |
| Text | `text-so-text` | `#F5F7F2` |
| Muted | `text-so-muted` | `#9CA69D` |
| Border | `border-white/[0.06]` | `rgba(255,255,255,0.06)` |

---

## Content Integrity Notes

| Section | Verified from official site | Labeled as sample |
|---------|-----------------------------|-------------------|
| Loyalty program (1 pt/drink) | ✅ Yes | — |
| Business name (Sideout Café) | ✅ Yes | — |
| Location (Lumban, Laguna 4014) | ✅ Yes | — |
| Google Maps URL | ✅ Yes | — |
| Official website URL | ✅ Yes | — |
| Pricing (₱149/₱249/₱399) | ❌ Not verified | ✅ Clearly labeled |
| Testimonials | ❌ Not real | ✅ Clearly labeled |
| Opening hours | ❌ Not verified | Not included |
| Phone/email | ❌ Not verified | Not included |
| Social handles | ❌ Not verified | Not included |

---

*Documentation prepared for ITST 302 – Client-Server Technologies · Week 5 · MP04*
