@extends('layouts.app')

@section('title', 'Update the post')

@section('content')
<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <button type="submit" class="btn btn-primary btn-block">{{ __('Update!') }}</button>
</form>
@endsection