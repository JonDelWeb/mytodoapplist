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

        <div class="flex flex-col items-center justify-center min-h-screen ">
            <h1 class="text-3xl text-center font-bold py-5 pb-8">{{ __('Welcome on your Todo App List !') }}</h1>
            <p class="text-2xl text-center py-5">{{ __('Simple and effective') }} !</p>
            <div class="">
                <img src="{{ asset('images/to-do-list-icon-14.jpg') }}" alt="todoList">
            </div>

            <div class="py-8">
                <a class="bg-teal-300 shadow-md hover:bg-teal-500 px-3 py-2 text-xl rounded-lg" href="{{ url('/tasks') }}">{{ __('Login') }}</a>
            </div>

        </div>
    </x-slot>
</x-guest-layout>