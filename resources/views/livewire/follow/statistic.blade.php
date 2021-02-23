<div class="block w-full mt-4 text-gray-300 bg-gray-600 rounded-lg shadow md:inline-block ">
    <div class="flex justify-center">
        <div class="flex flex-1">
            <div class="flex-1 px-6 py-2 text-center border-r border-gray-500">
                <div class="text-sm">Status</div>
                <div class="text-xl font-semibold text-white">{{ $user->statuses()->count() }}</div>
            </div>
            <a href="{{ route('account.following', [$user->usernameOrHash, 'following']) }}"
                class="flex-1 px-6 py-2 text-center border-r border-gray-500">
                <div class="text-sm">Following</div>
                <div class="text-xl font-semibold text-white ">
                    {{ $user->follows()->count() }}
                </div>
            </a>
            <a href="{{ route('account.following', [$user->usernameOrHash, 'followers']) }}"
                class="flex-1 px-6 py-2 text-center ">
                <div class="text-sm">Followers</div>
                <div class="text-xl font-semibold text-white ">
                    {{ $user->followers()->count() }}
                </div>
            </a>
        </div>
    </div>
</div>
