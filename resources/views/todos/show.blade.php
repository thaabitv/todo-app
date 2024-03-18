<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Show todos</h1>
        <div class="bg-white shadow-md rounded-md p-4 mb-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $todo->title }}</h3>
            <p class="text-gray-600">{{ $todo->description }}</p>
            <p class="{{ $todo->public == 0 ? 'text-red-500' : 'text-green-500' }}">
                {{ $todo->public == 0 ? 'Private' : 'Public' }}
            </p>
        </div>
        <h2 class="text-lg mb-4"><a href="{{ route('todos.index') }}" class="text-blue-500">Go back</a></h2>
    </div>
</x-app-layout>
