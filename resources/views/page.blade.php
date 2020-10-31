<x-guest-layout>
    <x-slot name="slot">
        <header class="flex justify-end bg-teal-400 shadow-lg h-14 py-4">
            @if (Route::has('login'))
            <div class=" px-6 pb-3 font-bold">
                @auth
                <a href="{{ url('/tasks') }}" class="text-lg text-white underline hover:text-teal-500">{{ __('My list') }}</a>
                @else
                <a href="{{ route('login') }}" class="text-lg text-white underline hover:text-teal-500">{{ __('Login') }}</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-lg text-white underline hover:text-teal-500">{{ __('Register') }}</a>
                @endif
                @endif
            </div>
            @endif
        </header>
        <div class="flex flex-col items-center min-h-screen">
            <div class="mt-5">
                <h1 class="text-3xl">{{ $page->title }}</h1>
            </div>

            <div class="bg-white px-5 py-5 rounded-lg">
                <div>
                    <p>{{ $page->text }}</p>
                </div>
            </div>
    </x-slot>
</x-guest-layout>