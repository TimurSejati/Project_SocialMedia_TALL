<div>
    {{-- <div class="py-10 -mt-6 bg-gray-700 md:py-16"> --}}
    <div class="p-6 bg-gray-700 border-b border-gray-200 ">
        <div>
            <div class="flex flex-col items-center text-center md:items-start md:flex-row md:text-left">
                <div class="flex-shrink-0 mb-4 mr-0 mr-3 md:mr-8 md:mb-0">
                    <img src="{{ $user->gravatar() }}" class="object-cover object-center w-24 h-24 rounded-full">
                </div>
                <div>
                    <h1 class="mb-2 text-xl font-semibold text-white">
                        {{ $user->name }}
                    </h1>

                    <div class="mb-5 text-gray-400">
                        <div class="mb-4 leading-relaxed">
                            {{ $bio }}
                            @if (strlen($bio) >= 120)
                                <button wire:click="readMore"
                                    class="{{ $readMore ? 'block' : 'hidden' }} text-sm text-indigo-400 focus:outline-none hover:underline">Read
                                    more</button>
                                <button wire:click="less"
                                    class="{{ $readMore ? 'hidden' : 'block' }} text-sm text-indigo-400 focus:outline-none hover:underline">Less
                                </button>
                            @endif
                        </div>

                        <div>
                            Joined : {{ $user->created_at->format('d M, Y') }}
                        </div>
                    </div>
                    <livewire:follow.button :user="$user" />
                </div>
            </div>
        </div>

        <div class="flex justify-between w-full p-4">
            <livewire:follow.statistic :user="$user" />
        </div>
    </div>
    {{-- </div> --}}


    <div class="p-4">
        @foreach ($statuses as $status)
            <div class="mb-10">
                <livewire:status.block :status="$status" :key="$status->id" />
            </div>
        @endforeach

        @if ($statuses->hasMorePages())
            <div class="flex justify-center">
                <x-button.primary wire:click.prevent="loadMore">
                    <span wire:loading>Please wait...</span>
                    <span wire:loading.class="hidden">
                        Load More
                    </span>
                </x-button.primary>
            </div>
        @endif
    </div>


</div>
