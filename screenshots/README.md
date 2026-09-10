# Screenshot Guide – MP04 Sideout Café Landing Page
## ITST 302 – Client-Server Technologies · Week 5

---

## Required Screenshots

Below are all 14 required screenshots, their suggested filenames, and the exact viewport/settings to use.

---

### 01 — Before Design
**File:** `01-before-design.png`
**Label:** "Initial student prototype"
**Source:** The original stub files (`resources/views/home.blade.php`, original components)
**Viewport:** 1440 × 900px
**Notes:** Take this from the original git state (before the rebuild), or recreate it as a simple mockup.

---

### 02 — After Design
**File:** `02-after-design.png`
**Label:** "Final polished interface"
**Viewport:** 1440 × 900px
**URL:** `http://localhost:8000`
**Notes:** Full page screenshot showing the hero section and beginning of features.

---

### 03 — Desktop Layout
**File:** `03-desktop-layout.png`
**Viewport:** 1440 × 900px (or 1920 × 1080px)
**URL:** `http://localhost:8000`
**Notes:** Full page or visible viewport screenshot at desktop width.

---

### 04 — Tablet Layout
**File:** `04-tablet-layout.png`
**Viewport:** 768 × 1024px
**DevTools:** Open Chrome DevTools → Dimensions: `768 × 1024`
**URL:** `http://localhost:8000`

---

### 05 — Mobile Layout
**File:** `05-mobile-layout.png`
**Viewport:** 390 × 844px (iPhone 14) or 375 × 812px (iPhone SE)
**DevTools:** Open Chrome DevTools → Dimensions: `390 × 844`
**URL:** `http://localhost:8000`

---

### 06 — Navigation Bar
**File:** `06-navigation-bar.png`
**Viewport:** 1440 × 120px (crop just the navbar)
**Notes:** Capture both desktop and mobile hamburger state if possible.

---

### 07 — Hero Section
**File:** `07-hero-section.png`
**Viewport:** 1440 × 900px (just the hero viewport)
**URL:** `http://localhost:8000#home`
**Notes:** Should show the full hero — headline, CTAs, and loyalty card mockup.

---

### 08 — Features Section
**File:** `08-features-section.png`
**Viewport:** 1440 × 900px
**URL:** `http://localhost:8000#features`
**Notes:** Scroll to the features section. Capture all 8 feature cards if possible.

---

### 09 — Pricing Cards
**File:** `09-pricing-cards.png`
**Viewport:** 1440 × 800px
**URL:** `http://localhost:8000#pricing`
**Notes:** Should clearly show all 3 pricing cards and the academic disclaimer banner.

---

### 10 — Testimonials
**File:** `10-testimonials.png`
**Viewport:** 1440 × 700px
**URL:** `http://localhost:8000#testimonials`
**Notes:** Should show all 3 testimonial cards and the sample content disclaimer.

---

### 11 — Footer
**File:** `11-footer.png`
**Viewport:** 1440 × 500px
**URL:** `http://localhost:8000` (scroll to bottom)
**Notes:** Should show all 4 footer columns and the copyright bar.

---

### 12 — VS Code Project Structure
**File:** `12-vscode-project-structure.png`
**Source:** VS Code sidebar showing the `week05-product-landing-page/` folder expanded
**Notes:** Expand `resources/views/` to show `layouts/`, `components/`, and `pages/` folders.

---

### 13 — Blade Components Folder
**File:** `13-blade-components-folder.png`
**Source:** VS Code Explorer showing `resources/views/components/` with all 11 component files
**Notes:** All component files should be visible: navbar, hero, feature-card, pricing-card, etc.

---

### 14 — GitHub Repository
**File:** `14-github-repository.png`
**Source:** Browser screenshot of the GitHub repository page
**URL:** `https://github.com/YOUR_USERNAME/week05-product-landing-page`
**Notes:** Should show the repository name, README preview, and file structure.

---

## How to Take Screenshots

### Using Chrome DevTools (Recommended)

1. Open `http://localhost:8000` in Chrome
2. Press `F12` to open DevTools
3. Click the device toolbar icon (Ctrl + Shift + M)
4. Set the desired viewport dimensions
5. For full-page screenshots:
   - Press `Ctrl + Shift + P`
   - Type `screenshot`
   - Select "Capture full size screenshot"

### Using Windows Snipping Tool

1. Press `Windows + Shift + S`
2. Select the area to capture
3. Save to the `screenshots/` folder

---

## Tips

- Run `npm run dev` and `php artisan serve` simultaneously for live preview
- Use the `--scroll-padding` CSS to ensure section headings are visible after sticky navbar
- Test at each viewport before taking the screenshot
- Name files exactly as listed above for grading consistency

---

*Screenshot guide prepared for ITST 302 – Client-Server Technologies · Week 5 · MP04*
