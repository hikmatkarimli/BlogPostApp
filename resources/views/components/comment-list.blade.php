@forelse($comments as $comment)
    <p>
        {{ $comment->content }}
    </p>
    <x-tags :tags="$comment->tags" />
    <x-updated :date="$comment->created_at" :name="$comment->user->name" :userId="$comment->user->id" />
@empty
    <p>{{ __('No comments yet!') }}</p>
@endforelse