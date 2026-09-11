# Deploying Sideout Café

This project is deployment-ready. `vendor/` and `node_modules/` are not
included in this delivery (standard practice — they're rebuilt from the
lock files), and no hosting credentials were available in this session,
so nothing was actually deployed. Below is exactly what's left and the
commands to run it.

## 1. Requirements

- PHP **8.4+** (this project's `vendor/laravel/framework` is Laravel 13.17,
  which needs PHP 8.4 — the sandbox used to prepare this delivery only had
  PHP 8.3 available, so the app itself was never booted end-to-end here.
  Blade syntax and PHP files were checked statically instead. Run a quick
  smoke test with `php artisan serve` in your real 8.4 environment before
  going live.)
- Composer 2.x
- Node.js 18+ / npm (only needed to rebuild front-end assets; the compiled
  CSS/JS in `public/build/` is already included and up to date)

## 2. Install dependencies

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
```

## 3. Environment

```bash
cp .env.example .env      # if you don't already have a .env
php artisan key:generate
```

Set in `.env` for production:

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

No mail transport is configured yet — the contact form logs submissions
via `Log::info()` (see `app/Http/Controllers/ContactController.php`) so
nothing is lost, but no email is actually sent until `MAIL_*` is set in
`.env` and `config/mail.php` is configured.

## 4. Database

The project ships with `database/database.sqlite` and default migrations
(users/cache/jobs — none of that is used by the public pages, they're
Laravel scaffolding). Run migrations if you keep it:

```bash
touch database/database.sqlite   # if missing
php artisan migrate
```

If you don't need the database at all, you can remove `DB_CONNECTION`
usage, but it's harmless to leave as-is.

## 5. Web root & storage

- Point your web server's document root at **`public/`**, not the project
  root.
- If you ever start storing uploaded files: `php artisan storage:link`.

## 6. Cache for production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 7. Verify after deploying

- `/` — homepage loads, nav links work
- `/menu`, `/about`, `/contact` — all resolve (no 404s)
- Mobile menu opens/closes, closes after tapping a link
- Contact form: submit with a blank field → validation errors show;
  submit valid → success banner shows and the entry appears in
  `storage/logs/laravel.log`
- "Get Directions" / "Find Us" buttons open the Google Maps link
- No horizontal scroll at 375px–1920px widths
