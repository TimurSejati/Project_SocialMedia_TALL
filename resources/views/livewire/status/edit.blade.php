<div>
    <div class="flex">
        <div class="w-full p-6">
            <div class="mb-5 overflow-hidden border border-gray-200 rounded-lg card">
                <div class="px-4 py-3 font-semibold text-gray-700 bg-gray-100">
                    Your Status
                </div>
                <form wire:submit.prevent="update">
                    <div class="p-4 bg-gray-50">
                        <textarea rows="5" class="w-full p-3 border-0 resize-none focus:shadow-none form-textarea"
                            placeholder="What's is your mind?"
                            wire:model="body">{{ old('body') ?? $status->body }}</textarea>
                        @error('body')
                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-end px-4 py-3 bg-gray-100 border-t border-gray-200">
                        <x-button.secondary>Update</x-button.secondary>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
