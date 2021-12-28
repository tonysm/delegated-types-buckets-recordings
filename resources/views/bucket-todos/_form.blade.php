<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form
        action="{{
            $recording->exists
                ? route('buckets.todos.update', [
                    'bucket' => $bucket,
                    'recording' => $recording,
                ])
                : route('buckets.todos.store', [
                    'bucket' => $bucket,
                ])
            }}"
        method="POST"
    >
        @csrf

        @if($recording->exists)
            @method('PUT')
        @endif

        <!-- Todo Title -->
        <div>
            <x-label for="title" :value="__('Title')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $todo->title)" autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ $recording->exists ? route('buckets.todos.show', [$bucket, $recording]) : route('buckets.todos.index', $bucket) }}">
                {{ __('Cancel') }}
            </a>

            <x-button class="ml-3">
                {{ __('Submit') }}
            </x-button>
        </div>
    </form>
</div>
