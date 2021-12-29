<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg leading-tight text-gray-800 font-semibold">Activities</h3>

                    <div class="mt-3">
                        @forelse($feedItems as $feedItem)
                            @include('bucket-feed-items._feed_item', [
                                'feedItem' => $feedItem,
                            ])
                        @empty
                            <p>No activities yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
