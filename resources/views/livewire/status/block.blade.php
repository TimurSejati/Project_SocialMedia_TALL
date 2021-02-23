<div class="flex w-full" wire:poll.1000ms>
    <div class="flex-shrink-0 mr-3">
        <a href="{{ route('account.show', ['identifier' => $status->user->usernameOrHash]) }}">
            <img class="object-cover object-center w-16 h-16 rounded-full" src="{{ $status->user->gravatar() }}">
        </a>
    </div>
    <div class="relative w-full">
        <div class="flex justify-between" x-data="{dropdownIsOpen: false}">
            <a href="{{ route('account.show', ['identifier' => $status->user->usernameOrHash]) }}"
                class="font-semibold text-gray-900 hover:underline">{{ $status->user->name }}</a>
            @can('update', $status)
                <button @click="dropdownIsOpen = !dropdownIsOpen"
                    class="p-1 rounded-full hover:bg-gray-200 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div :class="{hidden:!dropdownIsOpen}"
                    class="absolute top-0 right-0 w-48 py-2 mt-8 text-sm bg-white border border-gray-200 rounded">
                    <a href="{{ route('status.edit', $status->hash) }}"
                        class="block px-3 py-1 hover:bg-gray-100 hover:text-gray-800 ">Edit the status</a>
                    <a href="{{ route('status.delete', $status->hash) }}"
                        class="block px-3 py-1 hover:bg-gray-100 hover:text-gray-800 ">Remove the status</a>
                </div>
            @endcan
        </div>
        <a href="{{ route('status.show', $status->hash) }}">
            <div class="text-sm text-gray-400">{{ $status->published }}</div>
            <div class="text-gray-800">{!! nl2br($status->body) !!}</div>
            <div class="flex items-center mt-4 -mx-4 text-sm text-gray-400">
                <div class="flex items-center mx-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                        </path>
                    </svg>
                    <a href="#showReplyForm">
                        {{ $status->comments_count }} {{ Str::plural('Comment', $status->comments_count) }}
                    </a>
                </div>

                <livewire:status.like :key="$status->id" :status="$status" />

            </div>
        </a>
    </div>
</div>
