@extends('layouts.base')

@section('body')
    <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/5">
            <livewire:navbar />
        </div>

        <div class="flex-1 ">
            @yield('content')
        </div>

        <div class="w-full lg:w-1/3">
            <div class="w-full border border-gray-200 lg:fixed lg:w-1/3 lg:h-screen">
                <div class="p-4">
                    @yield('righside')
                </div>

                <div class="p-4 text-sm text-gray-600 border-t border-gray-200">
                    <div class="mb-1">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum, at.
                    </div>
                    &copy; {{ config('app.name') }} since 2020 - {{ date('Y') }}
                </div>
            </div>
        </div>

    </div>

@endsection
