<h3>
    @if($post->trashed())
       <del>
    @endif
    <a class="{{ $post->trashed() ? 'text-muted' : '' }}"
        href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
    @if($post->trashed())
        </del>
    @endif
</h3>
<!-- <p class="text-muted">
    Added {{ $post->created_at->diffForHumans() }}
    by {{ $post->user->name }}
</p> -->
<!-- <x-updated :date="$post->created_at" :name="$post->user->name" :userId="$post->user->id"></x-updated> -->
<x-updated :date="$post->created_at" :name="$post->user->name" :userId="$post->user->id"/>

<x-tags :tags="$post->tags" />

<p>
    {{ trans_choice('messages.comments', $post->comments_count) }}
</p>

<div class="mb-3">
    <div style="float: left; margin-right: 3px;">
        @auth
            @can('update', $post)
                <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                    class="btn btn-primary">
                    {{ __('Edit') }}
                </a>
            @endcan
        @endauth
    </div>
    <div style="float: left;">
        @auth
            @if(!$post->trashed())
                @can('delete', $post)
                    <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ __('Delete!') }}" class="btn btn-primary"/>
                    </form>
                @endcan
            @endif
        @endauth
    </div>
    <div style="clear: both;"></div>
</div>