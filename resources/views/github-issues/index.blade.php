<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            GitHub Issues
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="mb-4">
                <a href="{{ route('github-issues.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Issue</a>
            </div>
            @if (empty($issues))
                <p>No issues found in the repository.</p>
            @else
                @foreach ($issues as $index => $issue)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="font-semibold text-lg">{{ $issue['title'] }}</h3>
                            <p><strong>Description:</strong> {{ $issue['body'] }}</p>
                            <p><strong>Created at:</strong> {{ $issue['created_at'] }}</p>
                            <p><strong>URL:</strong> <a href="{{ $issue['html_url'] }}" class="text-blue-500">{{ $issue['html_url'] }}</a></p>
                            @if (!empty($issue['assignees']))
                                <p><strong>Assignees:</strong>
                                    @foreach ($issue['assignees'] as $assignee)
                                        {{ $assignee['login'] }}
                                        @if (!$loop->last), @endif <!-- Add comma if not the last assignee -->
                                    @endforeach
                                </p>
                            @else
                                <p><strong>Assignees:</strong> None</p>
                            @endif
                            <div class="mt-4">
                                <form action="{{ route('github-issues.close', $issue['number']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
