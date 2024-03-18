<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">My To Do List</h1>
        <div class="mb-4">
            <a href="{{ route('todos.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create a todo task +
            </a>
        </div>

        @foreach ($todos as $todo)
            <div class="bg-white shadow-md rounded-md p-4 mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $todo->title }}</h3>
                <p class="text-gray-600">{{ $todo->description }}</p>
                <p class="{{ $todo->public == 0 ? 'text-red-500' : 'text-green-500' }}">
                    {{ $todo->public == 0 ? 'Private' : 'Public' }}
                </p>
                <p>
                    <a href="{{ route('todos.show', $todo->id) }}" class="text-blue-500">Show</a>
                </p>
                <p>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="text-yellow-500">Edit</a>
                </p>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" name="delete" class="text-red-500 cursor-pointer">
                </form>
            </div>
        @endforeach
    </div>

</x-app-layout>
