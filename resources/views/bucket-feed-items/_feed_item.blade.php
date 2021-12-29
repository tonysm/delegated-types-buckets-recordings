<div>
    <a href="{{ $feedItem->recording->showRoute() }}">
        @if ($feedItem->event === 'created')
            {{ $feedItem->recordable->feedName() }} was created.
        @elseif ($feedItem->event === 'updated')
            {{ $feedItem->recordable->feedName() }} was updated.
        @else
            {{ $feedItem->recordable->feedName() }} was deleted.
        @endif
    </a>
</div>
