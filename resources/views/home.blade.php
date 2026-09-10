<x-layout>
    <x-hero />

    <!-- Features Section -->
    <section id="features" class="py-20 px-8 md:px-20 bg-gray-50">
        <h2 class="text-3xl font-bold text-center mb-12">Why Choose Sideout Cafe?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-feature-card icon="☕" title="Artisan Coffee" description="Brewed to perfection." />
            <x-feature-card icon="🌙" title="Late Night Hours" description="Open 5PM to 2AM daily." />
            <x-feature-card icon="🎁" title="Loyalty Perks" description="1 point for every drink." />
            <x-feature-card icon="🛋️" title="Chill Ambience" description="Perfect for hanging out." />
            <x-feature-card icon="🍰" title="Snacks & Pastries" description="Pair your drink with bites." />
            <x-feature-card icon="📍" title="Local Spot" description="Heart of Lumban, Laguna." />
        </div>
    </section>

    <!-- Pricing / Menu Section -->
    <section id="menu" class="py-20 px-8 md:px-20 bg-white">
        <h2 class="text-3xl font-bold text-center mb-12">Our Bestsellers</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-pricing-card plan="Classic Coffee" price="₱120">
                <li>1 Personal Drink</li><li>Hot or Iced</li><li>1 Loyalty Point</li>
            </x-pricing-card>
            <x-pricing-card plan="Signature Frappe" price="₱160">
                <li>Premium Blended</li><li>Whipped Cream</li><li>1 Loyalty Point</li>
            </x-pricing-card>
            <x-pricing-card plan="Barkada Bundle" price="₱550">
                <li>4 Personal Drinks</li><li>1 Free Snack</li><li>4 Loyalty Points</li>
            </x-pricing-card>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-8 md:px-20 bg-gray-50">
        <h2 class="text-3xl font-bold text-center mb-12">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-testimonial-card review="The best late-night spot in Lumban. Rated 5 stars for a reason!" name="Juan D." position="Local Guide" />
            <x-testimonial-card review="Love the loyalty program. Free drinks just for hanging out." name="Maria S." position="Regular Customer" />
            <x-testimonial-card review="Great ambience and the coffee hits the spot perfectly." name="Mark T." position="Student" />
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="rewards" class="py-20 bg-orange-600 text-white text-center">
        <h2 class="text-4xl font-bold mb-6">Join the Sideout Community</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Sign up for our loyalty program today. Earn a point for every drink you purchase and enjoy exclusive rewards.</p>
        <x-button type="secondary" href="/register">Start Earning Points</x-button>
    </section>
</x-layout>