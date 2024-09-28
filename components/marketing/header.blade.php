<section x-data="{ mobileNavOpen: false }" class="overflow-hidden">
    <div class="flex justify-between items-center p-5 mx-auto max-w-6xl bg-white">
        <div class="w-auto">
            <div class="flex flex-wrap items-center">
                <div class="mr-14 w-auto">
                    <a href="/">
                        <x-logo class="h-8"></x-logo>
                    </a>
                </div>
                <div class="hidden w-auto lg:block">
                    <ul class="flex items-center mr-16">
                        <li class="mr-9 font-medium hover:text-gray-700"><a href="/">Home</a></li>
                        <li class="mr-9 font-medium hover:text-gray-700"><a href="/blog">Blog</a></li>
                        <li class="mr-9 font-medium hover:text-gray-700"><a href="#">Features</a></li>
                        <li class="font-medium hover:text-gray-700"><a href="/pricing">Pricing</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-auto">
            <div class="flex flex-wrap items-center">
                @if(auth()->guest())
                    <div class="hidden mr-5 w-auto lg:block">
                        <div class="inline-block">
                            <a href="/auth/login" class="px-5 py-3 w-full font-medium bg-transparent rounded-xl transition duration-200 ease-in-out hover:text-gray-700" type="button">Sign In</a>
                        </div>
                    </div>
                    <div class="hidden w-auto lg:block">
                        <div class="inline-block">
                            <x-button size="md" tag="a" href="/auth/register">Try 14 Days Free Trial</x-button>
                        </div>
                    </div>
                @else
                    <div class="hidden w-auto lg:block">
                        <div class="inline-block">
                            <x-button size="md" tag="a" href="/dashboard">View Dashboard</x-button>
                        </div>
                    </div>
                @endif
                <div class="w-auto lg:hidden">
                    <button x-on:click="mobileNavOpen = !mobileNavOpen" class="text-white bg-gray-900 p-3">
                        <x-phosphor-list class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div :class="{'block': mobileNavOpen, 'hidden': !mobileNavOpen}" class="hidden fixed top-0 bottom-0 left-0 z-50 w-4/6 sm:max-w-xs">
        <div x-on:click="mobileNavOpen = !mobileNavOpen" class="fixed inset-0 bg-gray-800 opacity-80"></div>
        <nav class="overflow-y-auto relative z-10 px-9 pt-8 h-full bg-white">
            <div class="flex flex-wrap justify-between h-full">
                <div class="w-full">
                    <div class="flex justify-between items-center -m-2">
                        <div class="p-2 w-auto">
                            <a class="inline-block" href="#">
                                <img src="flaro-assets/logos/flaro-logo-black.svg" alt="">
                            </a>
                        </div>
                        <div class="p-2 w-auto">
                            <button x-on:click="mobileNavOpen = !mobileNavOpen">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 18L18 6M6 6L18 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center py-16 w-full">
                    <ul>
                        <li class="mb-12"><a class="font-medium hover:text-gray-700" href="/">Home</a></li>
                        <li class="mb-12"><a class="font-medium hover:text-gray-700" href="/blog">Blog</a></li>
                        <li class="mb-12"><a class="font-medium hover:text-gray-700" href="#_">Features</a></li>
                        <li><a class="font-medium hover:text-gray-700" href="/pricing">Pricing</a></li>
                    </ul>
                </div>
                <div class="flex flex-col justify-end pb-8 w-full">
                    @if(auth()->guest())
                        <div class="flex flex-wrap space-y-3 w-full">
                            <a href="/auth/login" class="px-5 block text-center bg-gray-100 py-3 w-full font-medium transition duration-200 ease-in-out hover:text-gray-700" type="button">Sign In</a>
                            <a href="/auth/register" class="px-5 block text-center py-3 w-full font-semibold text-white bg-gray-900 transition duration-200 ease-in-out focus:ring focus:ring-gray-900 hover:bg-gray-900">Try 14 Days Free Trial</a>
                        </div>
                    @else
                        <a href="/dashboard" class="px-5 block text-center py-3 w-full font-semibold text-white bg-gray-900 transition duration-200 ease-in-out focus:ring focus:ring-gray-900 hover:bg-gray-900">View Dashboard</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</section>