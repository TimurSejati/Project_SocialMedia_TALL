<div class="p-6">
    <div class="w-full">
        <div class="bg-white border border-gray-200 rounded ">
            <h1 class="px-5 py-2 text-lg font-semibold text-gray-700 capitalize bg-gray-100 border-b border-gray-200">
                Update your
                profile</h1>

            <form wire:submit.prevent="update" class="p-5">
                <div class="mb-5 ">
                    <div class="flex items-center">
                        @if ($picture)
                            <img src="{{ $picture->temporaryUrl() }}" alt=""
                                class="object-cover object-center w-16 h-16 mr-3 rounded-full">
                        @else
                            <img src="{{ auth()->user()->gravatar() }}" alt=""
                                class="object-cover object-center w-16 h-16 mr-3 rounded-full">
                        @endif

                        <label for="picture" class="px-4 py-2 bg-white border border-gray-200 rounded-lg">
                            Upload Image
                            <input type="file" wire:model="picture" id="picture" class="sr-only">
                        </label>

                    </div>

                    @error('picture')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="block mb-1 font-medium">Username</label>
                    <input type="text" wire:model="username" id="username" class="w-full form-input"
                        value="{{ old('username') ?? $username }}">
                    @error('username')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="name" class="block mb-1 font-medium">Name</label>
                    <input type="text" id="name" class="w-full form-input" wire:model="name"
                        value="{{ old('name') ?? $name }}">
                    @error('name')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-1 font-medium">Bio</label>
                    <textarea type="text" wire:model="description" id="description"
                        class="w-full form-textarea">{{ old('description') ?? $description }}</textarea>
                    @error('description')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <x-button.primary>Update</x-button.primary>

            </form>
        </div>
    </div>
</div>
