@extends('layouts.app')

@section('title', 'Sideout Café | Coffee & Community in Lumban, Laguna')

@section('content')

<x-navbar />
<x-hero />

<section class="bg-so-bg py-20 lg:py-24" id="features" aria-labelledby="features-heading">
    <x-container>
        <div class="mb-12 text-center">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">Why people stop by</p>
            <h2 id="features-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">A café built for the everyday rhythm.</h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <x-feature-card title="Coffee crafted daily" description="Balanced espresso, smooth cold brews, and the kind of drinks people come back for." :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M17 8h1a4 4 0 0 1 0 8h-1\'/><path d=\'M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z\'/><line x1=\'6\' y1=\'2\' x2=\'6\' y2=\'4\'/><line x1=\'10\' y1=\'2\' x2=\'10\' y2=\'4\'/><line x1=\'14\' y1=\'2\' x2=\'14\' y2=\'4\'/></svg>'"/>
            <x-feature-card title="Easygoing atmosphere" description="Comfortable seating, good music, and a place to stay awhile with friends or a laptop." :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z\'/><polyline points=\'9 22 9 12 15 12 15 22\'/></svg>'"/>
            <x-feature-card title="Loyalty that feels simple" description="One personal drink equals one point. Every visit counts, and it stays easy to follow." :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><polyline points=\'20 12 20 22 4 22 4 12\'/><rect x=\'2\' y=\'7\' width=\'20\' height=\'5\'/><line x1=\'12\' y1=\'22\' x2=\'12\' y2=\'7\'/><path d=\'M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z\'/><path d=\'M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z\'/></svg>'"/>
            <x-feature-card title="Right in Lumban" description="A familiar neighborhood stop with easy access and a clear route to the café." :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z\'/><circle cx=\'12\' cy=\'10\' r=\'3\'/></svg>'"/>
        </div>
    </x-container>
</section>

<section id="about" class="bg-so-surface py-20 lg:py-24" aria-labelledby="about-heading">
    <x-container>
        <div class="grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-14">
            <div>
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">About Sideout</p>
                <h2 id="about-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">Coffee, good company, and a little room to breathe.</h2>
                <p class="mt-5 max-w-xl text-base leading-7 text-so-muted">Sideout Café is a neighborhood coffee spot in Lumban, Laguna built around calm mornings, easy catch-ups, and drinks that keep people coming back.</p>
                <p class="mt-4 max-w-xl text-base leading-7 text-so-muted">Whether it is a quick espresso before the day starts or a long catch-up over iced drinks, the vibe stays warm, welcoming, and familiar.</p>
                <div class="mt-8">
                    <x-button variant="outline" href="{{ route('about') }}">Learn More</x-button>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-[#121a15] p-6 sm:p-8">
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-[#0d1712] p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-so-muted">Local spot</p>
                        <p class="mt-3 text-2xl font-bold text-so-text">Lumban</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-[#0d1712] p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-so-muted">Loyalty</p>
                        <p class="mt-3 text-2xl font-bold text-so-text">1 point</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-[#0d1712] p-5 sm:col-span-2">
                        <p class="text-xs uppercase tracking-[0.2em] text-so-muted">Everyday routine</p>
                        <p class="mt-3 text-base leading-7 text-so-muted">Coffee, conversations, and the feeling that this is the place to slow down for a while.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</section>

<section id="menu" class="bg-so-bg py-20 lg:py-24" aria-labelledby="menu-heading">
    <x-container>
        <div class="mb-12 text-center">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">Menu favorites</p>
            <h2 id="menu-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">Drinks people keep coming back for.</h2>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <x-pricing-card plan="Sideout Iced Latte" category="Coffee" price="₱120">
                <li>Espresso, fresh milk, and ice</li>
                <li>Balanced, smooth, easy to love</li>
            </x-pricing-card>
            <x-pricing-card plan="Sideout Signature" category="Featured" price="₱150" :popular="true">
                <li>House favorite, built for regulars</li>
                <li>Made to order with a rich finish</li>
            </x-pricing-card>
            <x-pricing-card plan="Matcha Refresher" category="Non-Coffee" price="₱135">
                <li>Light, cool, and refreshing</li>
                <li>Perfect for an easy afternoon pause</li>
            </x-pricing-card>
        </div>

        <div class="mt-10 flex justify-center">
            <x-button variant="secondary" href="{{ route('menu') }}">View Full Menu</x-button>
        </div>
    </x-container>
</section>

<section id="loyalty" class="bg-so-surface py-20 lg:py-24" aria-labelledby="loyalty-heading">
    <x-container>
        <div class="rounded-[2rem] border border-white/10 bg-[#121a15] p-8 sm:p-10 lg:p-12">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">Loyalty</p>
                    <h2 id="loyalty-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">Every cup brings you closer.</h2>
                    <p class="mt-5 max-w-lg text-base leading-7 text-so-muted">No complicated app. No hidden rules. One personal drink equals one point, and every visit keeps your progress moving.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <x-button variant="primary" href="{{ route('loyalty') }}">Join Loyalty</x-button>
                        <x-button variant="outline" href="{{ route('menu') }}">Check Drinks</x-button>
                    </div>
                </div>

                <div class="rounded-[1.5rem] border border-so-accent/20 bg-[#0d1712] p-6">
                    <div class="mb-4 flex items-end gap-3">
                        <span class="text-5xl font-black text-so-accent">1</span>
                        <span class="text-2xl text-so-text">drink</span>
                        <span class="text-2xl text-so-muted">=</span>
                        <span class="text-5xl font-black text-so-text">1</span>
                        <span class="text-2xl text-so-text">point</span>
                    </div>
                    <div class="h-2.5 w-full overflow-hidden rounded-full bg-so-bg">
                        <div class="h-full w-[70%] rounded-full bg-gradient-to-r from-so-accent to-so-accent2"></div>
                    </div>
                    <p class="mt-4 text-sm text-so-muted">7 of 10 points toward a free drink — a simple way to enjoy the rewards.</p>
                </div>
            </div>
        </div>
    </x-container>
</section>

<section id="testimonials" class="bg-so-bg py-20 lg:py-24" aria-labelledby="testimonials-heading">
    <x-container>
        <div class="mb-12 text-center">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">What regulars say</p>
            <h2 id="testimonials-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">A favorite stop for easy coffee and conversation.</h2>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <x-testimonial-card review="The kind of café where you can slow down for a bit and still feel right at home." name="Ari" position="Local regular" />
            <x-testimonial-card review="Good coffee, warm atmosphere, and the kind of loyalty program that actually makes sense." name="Mae" position="Weekend visitor" />
            <x-testimonial-card review="Always a solid place to catch up or get a quick espresso before heading out." name="Jules" position="Lumban local" />
        </div>
    </x-container>
</section>

<section id="contact" class="bg-so-surface py-20 lg:py-24" aria-labelledby="contact-heading">
    <x-container>
        <div class="grid items-center gap-10 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-so-accent">Visit us</p>
                <h2 id="contact-heading" class="text-3xl font-bold tracking-tight text-so-text sm:text-4xl">Sideout Café</h2>
                <p class="mt-5 text-lg text-so-muted">Lumban, Laguna, Philippines</p>
                <p class="mt-3 max-w-md text-base leading-7 text-so-muted">Stop by for your next coffee, a quick catch-up, or a calm place to recharge before the day picks up again.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <x-button variant="primary" href="https://maps.app.goo.gl/cUTeXGX83iXzW5D18" target="_blank" rel="noopener noreferrer">Get Directions</x-button>
                    <x-button variant="outline" href="{{ route('contact') }}">Contact Us</x-button>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-[#101810] p-4 sm:p-6">
                <div class="overflow-hidden rounded-[1.5rem] border border-white/10 bg-so-surface2 aspect-[4/3]">
                    <iframe
                        src="https://www.google.com/maps?q=Sideout+Cafe,+Lumban,+Laguna,+Philippines&output=embed"
                        class="h-full w-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Map showing Sideout Café in Lumban, Laguna"
                    ></iframe>
                </div>
            </div>
        </div>
    </x-container>
</section>

<x-footer />

@endsection
