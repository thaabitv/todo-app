<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Fill Out Your Task details</h1>

        <form action="{{ route('todos.store') }}" method="POST" class="mb-8">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-600">Title *</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-600">Description</label>
                <input type="text" name="description" id="description" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="assign_to" class="block text-sm font-semibold text-gray-600">Assign To</label>
                <select name="assign_to" id="assign_to" class="w-full p-2 border rounded-md">
                    <option value="0">Jeff</option>
                    <option value="1">Steve</option>
                    <option value="2">Bill</option>
                    <option value="3">Mark</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="public" class="block text-sm font-semibold text-gray-600">Public or private</label>
                <select name="public" id="public" class="w-full p-2 border rounded-md">
                    <option value="0">Private</option>
                    <option value="1">Public</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white p-2 rounded-md">Create</button>
        </form>
    </div>
</x-app-layout>
