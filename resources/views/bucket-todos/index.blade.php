<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('buckets.todos.index', $bucket) }}">Todos</a>
            </h2>

            <div class="flex items-center space-x-2">
                <a href="{{ route('buckets.todos.create', $bucket) }}">New Todo</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($recordings as $recording)
                        @include('bucket-todos._todo', [
                            'bucket' => $bucket,
                            'recording' => $recording,
                        ])
                    @empty
                        <p>No todos yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
