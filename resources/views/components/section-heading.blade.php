{{--
    ┌─────────────────────────────────────────────────────────────────────┐
    │  <x-section-heading>                                                │
    │  Reusable section header with label + title + subtitle             │
    │                                                                     │
    │  Props:                                                             │
    │   $label    – small uppercase label above title (optional)          │
    │   $title    – main heading (required)                               │
    │   $subtitle – paragraph beneath title (optional)                    │
    │   $align    – 'center' (default) | 'left'                           │
    └─────────────────────────────────────────────────────────────────────┘
--}}

@props([
    'label'    => null,
    'title'    => '',
    'subtitle' => null,
    'align'    => 'center',
])

@php
    $alignClass = $align === 'left' ? 'text-left items-start' : 'text-center items-center';
@endphp

<div class="flex flex-col gap-4 {{ $alignClass }}">

    @if ($label)
        <x-badge>{{ $label }}</x-badge>
    @endif

    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-so-text leading-tight">
        {!! $title !!}
    </h2>

    @if ($subtitle)
        <p class="text-so-muted text-base sm:text-lg leading-relaxed max-w-2xl">
            {{ $subtitle }}
        </p>
    @endif

</div>
