@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #e9ecef; color: #333;">
                <div class="card-header">{{ __('Contact') }}</div>

                <div class="card-body">
                    <h1 style="font-family: 'Arial Black', sans-serif; font-size: 2.5rem; color: #343a40;">{{ __('Contact Us') }}</h1>
                    <p style="font-size: 1.2rem;">{{ __('Hello, this is our contact page!') }}</p>

                    @can('home.secret')
                        <p>
                            <a href="{{ route('secret') }}" style="font-size: 1.2rem; color: #007bff;">{{ __('Go to special contact details!') }}</a>
                        </p>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
