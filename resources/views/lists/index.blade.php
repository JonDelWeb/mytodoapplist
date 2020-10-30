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
                    <ul class="flex flex-row sm:flex-col md:flex-row bg-gray-100 justify-around my-3">
                        <div class="flex flex-col sm:flex-row w-full sm:justify-around sm:items-center text-center align-center justify-center rounded-lg bg-gray-200">
                            <li class="text-2xl font-bold">{{ $list->title }}</li>
                            <li class="text-base">{{ $list->description }}</li>
                        </div>
                        <div class="flex flex-col sm:flex-row">
                            <li class="px-4 py-3"><a href="{{ route('lists.show', $list) }}" role="button" class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-1 px-2 xs:py-2 xs:px-4 rounded">Voir</a></li>
                            <li class="px-4 py-3">
                                <form id="destroy{{ $list->id }}" action="{{ route('lists.destroy', $list->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a role="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 xs:py-2 xs:px-4 rounded" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Delete') }}
                                    </a>
                                </form>
                            </li class="px-4 py-3">
                        </div>


                    </ul>

                    @endforeach

                </div>

            </div>
        </div>

    </div>
</x-app-layout>