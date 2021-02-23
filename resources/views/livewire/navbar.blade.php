<div class="w-full bg-gray-600 border-gray-500 lg:h-screen lg:fixed lg:border-r lg:w-1/5">
    @auth
        <div class="px-6 py-5 bg-gray-700 border-b border-gray-500">
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img src="{{ auth()->user()->gravatar() }}" class="object-cover object-center rounded-full w-14 h-14">
                </div>

                <div>
                    <h1 class="text-white">{{ auth()->user()->name }}</h1>
                    <small class="text-sm text-gray-400">
                        Joined {{ auth()->user()->created_at->format('d F, Y') }}
                    </small>
                </div>
            </div>

            <div class="mt-2 leading-relaxed text-white text-md">
                {{ auth()->user()->description }}
            </div>
        </div>
        <div class="py-2 leading-loose text-white">
            @auth
                <a href="/timeline" class="block px-6 py-1 hover:bg-gray-700 hover:text-gray-300 ">Timeline</a>
            @endauth

            <a href={{ route('settings') }} class="block px-6 py-1 hover:bg-gray-700 hover:text-gray-300">Settings</a>
            <a href={{ route('account.show', auth()->user()->usernameOrHash) }}
                class="block px-6 py-1 hover:bg-gray-700 hover:text-gray-300">Your Profile</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="block px-6 py-1 hover:bg-gray-700 hover:text-gray-300">
                Log out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @else
        <div class="px-6 py-1 text-lg font-semibold text-white">{{ config('app.name') }}</div>
        <a href={{ route('login') }} class="block px-6 py-1 text-white hover:bg-gray-700 hover:text-gray-300">Login</a>
        <a href={{ route('register') }}
            class="block px-6 py-1 text-white hover:bg-gray-700 hover:text-gray-300">Register</a>
    @endauth
</div>
