<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New GitHub Issue
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Display success message -->
                    @if(session('success'))
                        <div class="bg-green-200 text-green-800 px-6 py-4 mb-4 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Display error message -->
                    @if(session('error'))
                        <div class="bg-red-200 text-red-800 px-6 py-4 mb-4 rounded-md">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('github-issues.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-semibold text-gray-600">Issue Title</label>
                            <input type="text" name="title" id="title" class="w-full p-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-semibold text-gray-600">Issue Description</label>
                            <textarea name="body" id="body" class="w-full p-2 border rounded-md"></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Issue
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
