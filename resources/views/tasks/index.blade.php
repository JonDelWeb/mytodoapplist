<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des tâches
        </h2>
        <a href="{{ route('tasks.create') }}" role="button" class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded float-right">Créer une tâche</a>
        <h4 class="pt-3">Nombre de tâches : {{ count($tasks) }}</h4>
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
                    <div class="hidden sm:flex bg-teal-400 rounded-lg">
                        <ul class="flex flex-row sm:w-full md:w-1/2 font-bold rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <li class="px-6 py-2 w-1/4 md:w-1/3">{{ __('State') }}</li>
                            <li class="px-6 py-2 w-1/4 md:w-1/3">{{ __('Title') }}</li>
                            <li class="px-6 py-2 w-1/4 md:w-1/3">{{ __('To do for') }}</li>
                        </ul>
                    </div>
                    @foreach($tasks as $task)
                    <ul class="flex flex-row sm:flex-col md:flex-row bg-gray-200 xs:bg-white rounded-lg mb-3 justify-between xs:py-4 hover:bg-gray-200">
                        <div class="flex flex-col sm:flex-row w-full">
                            <li class="px-4 py-3 flex items-center sm:w-1/4"><p class="pr-2 sm:hidden">{{ __('State') }} : </p>
                                <form action="{{ route('changeState', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="checkbox" role="button" class="form-checkbox" id="state" name="state" onclick="event.preventDefault();
                                    this.closest('form').submit();" @if(old('state', $task->state)) checked @endif>
                                </form>
                            </li>
                            <li class="flex flex-row px-4 py-3 sm:w-1/4"><p class="text-center pr-2 sm:hidden">{{ __('Title') }} : </p>{{ $task->title }}</li>
                            <li class="flex flex-row px-4 py-3 sm:w-1/4"><p class="pr-2 sm:hidden">{{ __('To do for') }} : </p>{{ $task->toDoFor }}</li>
                        </div>
                        <div class="flex flex-col sm:flex-row">
                            <li class="px-4 py-3"><a href="{{ route('tasks.show', $task->id) }}" role="button" class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-1 px-2 xs:py-2 xs:px-4 rounded">Voir</a></li>
                            <li class="px-4 py-3"><a href="{{ route('tasks.edit', $task->id) }}" role="button" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-1 px-2 xs:py-2 xs:px-4 rounded">Modifier</a></li>
                            <li class="px-4 py-3">
                                <form id="destroy{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a role="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 xs:py-2 xs:px-4 rounded" onclick="event.preventDefault();
                          this.closest('form').submit();">
                                        Supprimer
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