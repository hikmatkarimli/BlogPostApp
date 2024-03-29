@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="row">
    <div class="col-8">
{{-- @each('posts.partials.post', $posts, 'post') --}}
@forelse ($posts as $key => $post)
@include('posts.partials.post', [])
@empty
<p>{{ __('No blog posts yet!') }}</p>
@endforelse
</div>
    <div class="col-4">
        @include('posts._activity')
    </div>
</div>   
@endsection