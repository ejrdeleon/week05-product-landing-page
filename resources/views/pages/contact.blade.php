@extends('layouts.app')

@section('title', 'Contact | Sideout Cafe')

@section('content')

<x-navbar />

<section class="bg-so-bg pt-[68px]" aria-labelledby="contact-page-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="flex items-center gap-3 mb-5">
            <span class="w-6 h-px bg-so-accent/50"></span>
            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-so-accent">Get In Touch</p>
        </div>
        <h1 id="contact-page-heading" class="text-4xl sm:text-5xl font-black tracking-tight text-so-text leading-tight">
            Let's <span class="gradient-text">talk.</span>
        </h1>
        <p class="mt-4 text-so-muted text-base max-w-lg leading-7">
            Questions, group orders, or feedback — send a message and Sideout Cafe will get back to you.
        </p>
    </div>
    <div class="h-px bg-gradient-to-r from-transparent via-white/[0.07] to-transparent mx-8"></div>
</section>

<section class="bg-so-bg py-12 lg:py-16" aria-label="Contact form and info">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- Form --}}
            <div class="lg:col-span-3 rounded-2xl border border-white/[0.06] bg-so-surface p-6 sm:p-8">

                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl border border-so-accent/30 bg-so-accent/10 text-so-text text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-5" novalidate>
                    @csrf

                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-sm font-medium text-so-text">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full rounded-xl bg-so-surface2 border {{ $errors->has('name') ? 'border-red-500/60' : 'border-white/[0.10]' }}
                                   px-4 py-2.5 text-so-text placeholder:text-so-muted/50 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-so-accent/50"
                            placeholder="Your name">
                        @error('name')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-sm font-medium text-so-text">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-xl bg-so-surface2 border {{ $errors->has('email') ? 'border-red-500/60' : 'border-white/[0.10]' }}
                                   px-4 py-2.5 text-so-text placeholder:text-so-muted/50 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-so-accent/50"
                            placeholder="you@example.com">
                        @error('email')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="message" class="text-sm font-medium text-so-text">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full rounded-xl bg-so-surface2 border {{ $errors->has('message') ? 'border-red-500/60' : 'border-white/[0.10]' }}
                                   px-4 py-2.5 text-so-text placeholder:text-so-muted/50 text-sm resize-y
                                   focus:outline-none focus:ring-2 focus:ring-so-accent/50"
                            placeholder="How can we help?">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl bg-so-accent text-so-bg text-sm font-bold hover:bg-so-accent2 transition-colors self-start">
                        Send Message
                    </button>
                </form>
            </div>

            {{-- Info --}}
            <div class="lg:col-span-2 flex flex-col gap-5">

                <div class="p-6 rounded-2xl bg-so-surface2 border border-white/[0.06]">
                    <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-3">Location</h3>
                    <p class="text-so-muted text-sm leading-relaxed">Lumban, Laguna, Philippines 4014</p>
                    <a href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 text-so-accent text-sm mt-3 hover:text-so-accent2 transition-colors">
                        Get Directions
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="p-6 rounded-2xl bg-so-surface2 border border-white/[0.06]">
                    <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-3">Official Website</h3>
                    <a href="https://www.sideout-cafe.com/" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 text-so-accent text-sm hover:text-so-accent2 transition-colors">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        sideout-cafe.com
                    </a>
                </div>

                <div class="rounded-2xl overflow-hidden border border-white/[0.06] bg-so-surface2 aspect-[4/3]">
                    <iframe
                        src="https://www.google.com/maps?q=Sideout+Cafe,+Lumban,+Laguna,+Philippines&output=embed"
                        class="w-full h-full"
                        style="border:0;"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Map showing Sideout Cafe in Lumban, Laguna"
                    ></iframe>
                </div>

                <div class="p-5 rounded-2xl bg-so-surface2 border border-so-accent/[0.12]">
                    <h3 class="text-so-text font-semibold text-sm uppercase tracking-widest mb-2">Loyalty</h3>
                    <p class="text-so-muted text-sm leading-relaxed">1 point for every personal drink purchased.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<x-footer />

@endsection
