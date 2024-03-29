@extends('layouts.app')

@section('content')
    <form method="POST" enctype="multipart/form-data"
        action="{{ route('users.update', ['user' => $user->id]) }}"
        class="form-horizontal">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-4">
                <img src="{{ $user->image ? $user->image->url() : '' }}" 
                class="img-thumbnail avatar" />

                <div class="card mt-4">
                    <div class="card-body" style="color: black;">
                        <h6>{{ __('Upload a different photo') }} <small>128x128</small></h6>
                        <input class="form-control-file" type="file" name="avatar" />
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label style="color: white;">{{ __('Name:') }}</label>
                    <input class="form-control" value="" type="text" name="name" />
                </div>

                <div class="form-group">
                    <label style="color: white;">{{ __('Language:') }}</label>
                    <select class="form-control" name="locale" style="color: black;">
                        @foreach(App\Models\User::LOCALES as $locale => $label)
                            <option value="{{ $locale }}" {{ $user->locale !== $locale ?: 'selected' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <x-errors style="color: black;"></x-errors>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="{{ __('Save changes') }}" style="background-color: white; color: black;" />
                </div>
            </div>
        </div>

    </form>
@endsection
