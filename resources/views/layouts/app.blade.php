<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Blog Post App - @yield('title')</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #4c4c4c; /* Lighter shade of coal color */
        }

        .navbar {
            border-bottom: 2px solid #007bff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* White background for navbar */
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
            font-weight: 400;
            color: #555;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        /* New CSS rule to make text white on dark background */
        body:not(.navbar) {
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home.index') }}">Blog Post App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.contact') }}">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Blog Posts') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">{{ __('Add') }}</a>
                </li>
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.edit', ['user' => Auth::user()->id]) }}">
                            {{ __('Edit Profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} ({{ Auth::user()->name }})
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
