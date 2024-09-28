<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('theme::partials.head', ['seo' => ($seo ?? null) ])
</head>
<body x-data class="flex min-h-screen overflow-x-hidden  bg-gray-100 min-h-sreen @if($bodyClass ?? false){{ $bodyClass }}@endif">

    <x-app.sidebar />
    <div class="h-full w-full flex flex-col z-20 relative">
        {{-- Mobile Header --}}
        <header class="lg:hidden px-6 block flex justify-between sticky top-0 z-40 bg-gray-50 -mb-px border-b border-zinc-200/70 h-[72px] items-center">
            <button x-on:click="window.dispatchEvent(new CustomEvent('open-sidebar'));" class="h-10 w-10 flex items-center border border-black justify-center flex-shrink-0 hover:bg-gray-200">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" /></svg>
            </button>
            <x-app.user-menu position="top" />
        </header>
        {{-- End Mobile Header --}}
        <main class="lg:p-7 p-6 lg:pl-72 w-full h-full">
            {{ $slot }}
        </main>
    </div>

    @livewire('notifications')
    @filamentScripts
    @livewireScripts
    @waveCheckout
    
    {{ $javascript ?? '' }}

</body>
</html>
