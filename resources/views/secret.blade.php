@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-danger">{{ __('🔒 Secret Page! 🔒') }}</h1>
        </div>
        <div class="card-body">
          <p class="lead text-muted text-center">{{ __("Psst... here's a secret email: ") }}<span class="text-primary">confidential@secretcorp.test</span></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
