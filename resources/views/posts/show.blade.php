@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-8">
        @if($post->image)
        <div style="background-image: url('{{ $post->image->url() }}'); min-height: 500px; color: white; text-align: center; background-attachment: fixed;">
            <h1 style="padding-top: 100px; text-shadow: 1px 2px #000">
        @else
            <h1>
        @endif
            {{ $post->title }}
            <x-badge show="{{ now()->diffInMinutes($post->created_at)<30 }}">
                {{ __('Brand new Post!') }}
            </x-badge>
        @if($post->image)    
            </h1>
        </div>
        @else
            </h1>
        @endif

        <p>{{ $post->content }}</p>

        <!-- <p>Added {{ $post->created_at->diffForHumans() }}</p> -->
        <x-updated :date="$post->created_at" :name="$post->user->name"></x-updated>
        <x-updated :date="$post->updated_at">
            {{ __('Updated') }}
        </x-updated>

        <x-tags :tags="$post->tags" />

        <p>{{ trans_choice('messages.people.reading', $counter) }}</p>

        <h4>{{ __('Comments') }}</h4>

        <x-commentForm :route="route('posts.comments.store', ['post' => $post->id])"></x-commentForm>

        <x-commentList :comments="$post->comments"></x-commentList>
    </div>
    <div class="col-4">
        @include('posts._activity')
    </div>
@endsection