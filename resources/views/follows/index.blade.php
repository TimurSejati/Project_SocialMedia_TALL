@extends('layouts.app', ['title' => 'Following / Followers'])

@section('content')
    <div class="p-4 text-lg font-semibold border-b border-gray-200">
        {{ ucfirst($follow) }}
    </div>

    <div class="p-6">
        <div class="flex flex-wrap">
            @foreach ($follows as $follow)
                <div class="w-full mb-4 lg:w-1/2">
                    <div class="flex items-center">
                        <img class="flex-shrink-0 object-cover object-center w-16 h-16 mr-3 rounded-full"
                            src="{{ $follow->gravatar() }}" alt="{{ $follow->name }}">
                        <div>
                            <div>
                                <a class="hover:underline"
                                    href="{{ route('account.show', ['identifier' => $follow->usernameOrHash]) }}">{{ $follow->name }}</a>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $follow->created_at->format('d F, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $follows->links() }}
        </div>
    </div>
@endsection
