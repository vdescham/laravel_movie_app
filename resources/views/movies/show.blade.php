<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
   
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn-primary">Dashboard</a>
            <form method="POST"  action="{{ route('logout') }}" style="display: inline-block;">
                @csrf

                <a class="logout btn-primary" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
            </a>
            </form>
             
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn-primary">Log in</a> 
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline btn-primary">Register</a> 
            @endif 
             @endauth
        </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200" style="text-align: center; max-width:600px">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2><b>{{$movie->title}}</b> ({{$movie->year}})</h2>
                         </div>
                        <img src="https://image.tmdb.org/t/p/w220_and_h330_face/{{$movie->img}}" alt="{{$movie->title}}"/>
                        <p style="text-align:justify;"><b>Description:</b> {{$movie->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
