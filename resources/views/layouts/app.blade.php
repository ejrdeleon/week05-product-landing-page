<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- SEO Meta --}}
    <meta name="description"
          content="Sideout Café is a local coffee spot in Lumban, Laguna serving specialty coffee, non-coffee drinks, and a loyalty program that rewards every visit.">
    <meta name="keywords"
          content="Sideout Café, Lumban Laguna, coffee shop, loyalty rewards, café Philippines">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="Sideout Café | Coffee &amp; Community in Lumban, Laguna">
    <meta property="og:description" content="Your local coffee stop in Lumban, Laguna. Join the loyalty program and earn a point for every personal drink.">
    <meta property="og:image"       content="">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="Sideout Café | Coffee &amp; Community in Lumban, Laguna">
    <meta name="twitter:description" content="Experience the warmth of Sideout Café. Join our loyalty program.">

    {{-- Page Title --}}
    <title>@yield('title', 'Sideout Café | Coffee &amp; Community in Lumban, Laguna')</title>

    {{-- Favicon (inline SVG data URI – coffee cup emoji) --}}
    <link rel="icon"
          href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>☕</text></svg>">

    {{-- Vite Assets (Tailwind CSS + JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional head content from child views --}}
    @stack('head')
</head>
<body class="bg-so-bg text-so-text font-sans antialiased min-h-screen overflow-x-hidden">

    {{-- Skip to main content for accessibility --}}
    <a href="#main-content"
       class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4
              focus:z-[100] focus:px-4 focus:py-2 focus:bg-so-accent focus:text-so-bg
              focus:rounded-lg focus:font-semibold focus:text-sm">
        Skip to main content
    </a>

    {{-- Main content from child view --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- Additional scripts from child views --}}
    @stack('scripts')

</body>
</html>