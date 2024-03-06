@extends('layouts.app')

@section('title', 'Home page')

@section('content')
    <h1 style="font-family: 'Arial Black', sans-serif; font-size: 3rem; color: #333; text-shadow: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.2); background: linear-gradient(45deg, #FFC107, #FF9800); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ __('Welcome to the Blog Post App!') }}</h1>

    <p style="font-family: 'Arial', sans-serif; font-size: 1.5rem; color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">{{ __('Explore and share your thoughts with the world.') }}</p>
@endsection
