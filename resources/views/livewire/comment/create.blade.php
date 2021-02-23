<div class="flex p-5 border border-gray-200 rounded-lg">

    <div class="flex-shrink-0 mr-4">
        <img src="{{ auth()->user()->gravatar() }}" class="object-cover object-center w-16 h-16 rounded-full">
    </div>

    <div class="w-full">
        <div class="mb-3 text-lg font-semibold">{{ auth()->user()->name }}</div>
        <div>
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <textarea wire:model="body" class="w-full p-0 border-0 resize-none form-textarea focus:shadow-none"
                        placeholder="Write your idea..."></textarea>
                </div>

                <div class="flex justify-end">
                    <x-button.secondary>Comment</x-button.secondary>
                </div>
            </form>
        </div>
    </div>
</div>
