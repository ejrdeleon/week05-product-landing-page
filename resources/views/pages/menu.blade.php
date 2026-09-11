@extends('layouts.app')

@section('title', 'Menu | Sideout Café')

@section('content')

<x-navbar />

<section class="min-h-screen bg-[#0a0d0b] px-4 py-8 pt-28 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <div class="mb-6 text-center text-so-text">
            <p class="text-[10px] font-semibold uppercase tracking-[0.35em] text-so-muted">Menu</p>
            <h1 class="mt-3 text-3xl font-black tracking-tight sm:text-4xl">Drinks made the Sideout way.</h1>
        </div>

        <div class="overflow-hidden rounded-[2rem] border border-[#dce8dc]/35 bg-[#0b5a4d] shadow-[0_30px_80px_rgba(0,0,0,0.45)]">
            <div class="flex items-center justify-between border-b border-[#dce8dc]/20 bg-[#0d1412] px-5 py-3 text-so-text">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#1b2d27] text-sm font-black text-so-accent">S</div>
                    <span class="text-lg font-bold tracking-wide">SIDEOUT CAFE</span>
                </div>
                <div class="hidden items-center gap-4 text-xs uppercase tracking-[0.3em] text-so-muted sm:flex">
                    <span>Overview</span>
                    <span class="text-so-text">Menu</span>
                    <span>Reviews</span>
                    <span>About</span>
                </div>
            </div>

            <div class="bg-[#f1ede7] p-4 sm:p-6 lg:p-8">
                <div class="relative overflow-hidden rounded-[1.5rem] border border-[#163d35] bg-[#e6e2d9] p-4 sm:p-6">
                    <div class="menu-script absolute left-1/2 top-5 -translate-x-1/2 text-[3.5rem] font-black italic tracking-[-0.08em] text-[#0c2f2a] opacity-95 sm:text-[5.5rem] lg:text-[8.5rem]">
                        Sideout
                    </div>

                    <div class="relative z-10 mt-16 grid gap-6 pt-10 md:grid-cols-2 xl:grid-cols-4">
                        <div>
                            <h2 class="text-2xl font-black uppercase tracking-tight text-[#0d312b]">Coffee</h2>
                            <ul class="mt-5 space-y-3 text-sm text-[#123a35] sm:text-base">
                                <li class="flex items-start justify-between gap-3"><span>Classic Americano</span><span class="font-bold">₱100</span></li>
                                <li class="flex items-start justify-between gap-3"><span>House Latte</span><span class="font-bold">₱120</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Spanish Latte</span><span class="font-bold">₱130</span></li>
                                <li class="flex items-start justify-between gap-3"><span>White Velvet Latte</span><span class="font-bold">₱135</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Macadamia</span><span class="font-bold">₱135</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Caramel Espresso</span><span class="font-bold">₱140</span></li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black uppercase tracking-tight text-[#0d312b]">Non Coffee</h2>
                            <ul class="mt-5 space-y-3 text-sm text-[#123a35] sm:text-base">
                                <li class="flex items-start justify-between gap-3"><span>Coco Latte</span><span class="font-bold">₱135</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Matcha Latte</span><span class="font-bold">₱135</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Milky Strawberry</span><span class="font-bold">₱125</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Lychee Yogurt</span><span class="font-bold">₱125</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Pink Drink</span><span class="font-bold">₱146</span></li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black uppercase tracking-tight text-[#0d312b]">Tea</h2>
                            <ul class="mt-5 space-y-3 text-sm text-[#123a35] sm:text-base">
                                <li class="flex items-start justify-between gap-3"><span>English Breakfast</span><span class="font-bold">₱70</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Green Tea</span><span class="font-bold">₱70</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Earl Grey</span><span class="font-bold">₱70</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Add on: Darbo Honey</span><span class="font-bold">₱30</span></li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black uppercase tracking-tight text-[#0d312b]">Special Coffee</h2>
                            <ul class="mt-5 space-y-3 text-sm text-[#123a35] sm:text-base">
                                <li class="flex items-start justify-between gap-3"><span>Sideout Signature</span><span class="font-bold">₱160</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Brown Coconut</span><span class="font-bold">₱150</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Cacao Espresso</span><span class="font-bold">₱170</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Cacao Berry</span><span class="font-bold">₱165</span></li>
                                <li class="flex items-start justify-between gap-3"><span>Cacao Matcha</span><span class="font-bold">₱180</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-full border border-so-accent/40 bg-so-accent px-6 py-3 text-sm font-semibold text-[#0a0d0b] transition hover:brightness-110">
                Back to Home
            </a>
        </div>
    </div>
</section>

@endsection
