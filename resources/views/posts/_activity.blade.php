<div class="container">
    <div class="row">
        <x-card title="{{ __('Most Commented') }}">
            <x-slot name="subtitle">
                {{ __('What people are currently talking about') }}
            </x-slot>
            <x-slot name="items">
                @foreach ($mostCommented as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </x-slot>
        </x-card>
    </div>

    <div class="row mt-4">
        <x-card title="{{ __('Most Active') }}">
            <x-slot name="subtitle">
                {{ __('Writers with most posts written') }}
            </x-slot>
            <x-slot name="items">
                @foreach ($mostActive as $writer)
                    <li class="list-group-item">{{ $writer->name }}</li>
                @endforeach
            </x-slot>
        </x-card>
    </div>

    <div class="row mt-4">
        <x-card title="{{ __('Most Active Last Month') }}">
            <x-slot name="subtitle">
                {{ __('Users with most posts written in the month') }}
            </x-slot>
            <x-slot name="items">
                @foreach ($mostActiveLastMonth as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            </x-slot>
        </x-card>
    </div>
</div>