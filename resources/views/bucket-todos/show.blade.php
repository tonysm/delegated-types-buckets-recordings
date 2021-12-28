<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                From: <a href="{{ route('buckets.todos.index', $bucket) }}">Todos</a> / Todo #{{ $recording->id }}
            </h2>

            <div class="flex items-center space-x-2">
                <a href="{{ route('buckets.todos.edit', [$bucket, $recording]) }}">Edit</a>
            </div>  
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">{{ $recording->recordable->title }}</h1>

                    <form
                        action="{{ route('buckets.todos.destroy', ['bucket' => $bucket, $recording]) }}"
                        method="POST"
                        onsubmit="if (! confirm('Are you sure?')) return false;"
                    >
                        @csrf
                        @method('DELETE')

                        <x-danger-button class="mt-3">Delete</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
