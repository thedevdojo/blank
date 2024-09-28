<section class="pt-16 pb-10 sm:py-20">

    <x-container>    
        <x-marketing.heading
            level="h2"
            title="Pricing plans"
            description="Modify this view from your theme pages/pricing/index.blade.php file." 
        />

        <div x-data="{ on: false, billing: 'Monthly', basic: {'Monthly' : '19', 'Yearly' : '180'}, pro: {'Monthly' : '49', 'Yearly' : '450' },
                toggleRepositionMarker(toggleButton){
                    this.$refs.marker.style.width=toggleButton.offsetWidth + 'px';
                    this.$refs.marker.style.height=toggleButton.offsetHeight + 'px';
                    this.$refs.marker.style.left=toggleButton.offsetLeft + 'px';
                }
            }" 
            x-init="
                    setTimeout(function(){ 
                        toggleRepositionMarker($refs.monthly); 
                        $refs.marker.classList.remove('opacity-0');
                        setTimeout(function(){ 
                            $refs.marker.classList.add('duration-300', 'ease-out');
                        }, 10); 
                    }, 1);
            "
            class="mx-auto mt-12 mb-4 sm:my-12 w-full max-w-6xl" x-cloak>

            <div class="flex relative justify-start items-start pb-5 -translate-y-2">
                <div class="inline-flex relative justify-center items-center p-1 sm:mx-auto w-auto text-center border-2 border-gray-900 -translate-y-3">
                    <div x-ref="monthly" x-on:click="billing='Monthly'; toggleRepositionMarker($el)" :class="{ 'text-white': billing == 'Monthly' }" class="relative z-20 px-3.5 py-1 text-sm font-medium leading-6 text-gray-900 rounded-full duration-300 ease-out cursor-pointer">
                        Monthly
                    </div>
                    <div x-ref="yearly" x-on:click="billing='Yearly'; toggleRepositionMarker($el)" :class="{ 'text-white': billing == 'Yearly' }" class="relative z-20 px-3.5 py-1 text-sm font-medium leading-6 text-gray-900 rounded-full duration-300 ease-out cursor-pointer">
                        Yearly
                    </div>
                    <div x-ref="marker" class="absolute left-0 z-10 w-1/2 h-full opacity-0" x-cloak>
                        <div class="w-full h-full bg-gray-900 shadow-sm"></div>
                    </div>
                </div>  
            </div>

            <div class="flex flex-wrap">

                @foreach(Wave\Plan::where('active', 1)->get() as $plan)
                    @php $features = explode(',', $plan->features); @endphp
                    <div class="w-full lg:px-4 mb-8 lg:w-1/3 lg:mb-0">
                        <div class="p-8 border">
                        <h3 class="mb-6 text-xl font-semibold">{{ $plan->name }}</h3>
                        
                        <div class="mb-6 text-5xl font-bold">
                            <span>$<span x-text="billing == 'Monthly' ? '{{ $plan->monthly_price }}' : '{{ $plan->yearly_price }}'"></span></span>
                            <span class="text-base font-medium"><span x-text="billing == 'Monthly' ? '/mo' : '/yr'"></span></span>
                        </div>
                        <ul class="mb-8 text-left">
                            @foreach($features as $feature)
                                <li class="flex items-center mb-2">
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                        <x-button class="w-full">Get started</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <p class="w-full my-4 sm:my-8 text-zinc-500 md:my-10 text-center">All plans are fully configurable in the Admin Area.</p>
    </x-container>
</section>