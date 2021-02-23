<div class="mb-5 overflow-hidden border border-gray-200 rounded-lg card">
    <div class="px-4 py-3 font-semibold text-gray-700 bg-gray-100">
        Your Status
    </div>
    <form wire:submit.prevent="store">
        <div class="p-4 bg-gray-50">
            <textarea rows="5" class="w-full p-3 border-0 resize-none focus:shadow-none form-textarea" wire:model="body"
                placeholder="What's is your mind?"></textarea>
            @error('body')
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-100 border-t border-gray-200">
            <x-button.secondary>Post</x-button.secondary>
        </div>
    </form>
</div>
