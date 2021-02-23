<div class="flex items-center justify-center min-h-screen">
    <div class="w-full p-6">
        <div class="p-5 text-center bg-white border border-gray-200 rounded-lg lg:mx-auto">
            <div class="text-gray-700 ">
                <div class="mb-5 text-xl font-bold">
                    Are you sure?
                </div>

                <div class="flex items-start p-4 mb-5 border border-gray-200 rounded-lg bg-gray-50">
                    <img src="{{ $status->user->gravatar() }}"
                        class="object-cover object-center w-16 h-16 mr-3 rounded-full">
                    <div class="text-left">
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
                                23 Comments
                            </div>
                            <div class="flex items-center mx-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                    </path>
                                </svg>
                                100 likes
                            </div>
                        </div>
                    </div>
                </div>

                <button wire:click.prevent="destroy"
                    class="inline-block px-4 py-2 text-center text-white bg-red-500 border border-red-500 rounded-lg hover:bg-red-600">Delete</button>
                <a href="{{ route('status.show', $status->hash) }}"
                    class="inline-block px-4 py-2 text-center bg-white border border-gray-200 rounded-lg hover:bg-gray-100">Cancel</a>
            </div>
        </div>
    </div>

</div>
