<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Edit todos</h1>

        <form action="{{ route('todos.update', $todo->id) }}" method="post" class="mb-8">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-600">Title *</label>
                <input type="text" name="title" id="title" placeholder="{{ $todo->title }}" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-600">Description</label>
                <input type="text" name="description" id="description" placeholder="{{ $todo->description }}" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="public" class="block text-sm font-semibold text-gray-600">Public or private</label>
                <select name="public" id="public" class="w-full p-2 border rounded-md">
                    <option value="0" {{ $todo->public == 0 ? 'selected' : '' }}>Private</option>
                    <option value="1" {{ $todo->public == 1 ? 'selected' : '' }}>Public</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
        </form>

        <h2 class="text-lg"><a href="{{ route('todos.index') }}" class="text-blue-500">Go back</a></h2>
    </div>
</x-app-layout>
