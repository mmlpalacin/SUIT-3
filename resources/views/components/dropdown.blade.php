<!-- resources/views/components/dropdown.blade.php -->
@props([
    'href' => null, // Si se proporciona href, se renderiza un enlace.
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white',
    'dropdownClasses' => '',
])

@php
$isLink = !is_null($href);
@endphp

@if ($isLink)
    <!-- Enlace -->
    <a {{ $attributes->merge(['href' => $href, 'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>
        {{ $slot }}
    </a>
@else
    <!-- Dropdown -->
    <div class="relative" x-data="{ open: false }" @click.away="open = false">
        <!-- Trigger -->
        <div @click="open = !open">
            {{ $trigger ?? '' }}
        </div>

        <!-- Dropdown Content -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $align }} {{ $dropdownClasses }}"
             style="display: none;">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
                {{ $content }}
            </div>
        </div>
    </div>
@endif
