<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toutes vos listes de tâches
        </h2>
        <a href="{{ route('lists.create') }}" role="button" class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded float-right">Créer une liste</a>
        <h4 class="pt-3">Nombre de listes : {{ count($todoLists) }}</h4>
    </x-slot>
    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-validation-errors class="mb-4" />
            @if (session()->has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3">
                {{ session('message') }}
            </div>
            @endif
            <div class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <div class="flex flex-col p-4">

                @foreach($todoLists as $list)
                <ul class="mb-5">
                    <a class="py-3 px-4 text-base bg-gray-100 hover:bg-gray-300" href="{{ route('lists.show', $list) }}">{{ $list->title }}</a>
                </ul>
                
                @endforeach

                </div>

            </div>
        </div>

    </div>
</x-app-layout>