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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-align:center;">The 100 most voted movies</h1>
                        <div class="grid grid-cols-4 gap-4">
                            <ul>
                            @foreach ($movies as $movie)
                            
                                
                               <li> 
                                   <a href="/movie/{{$movie->id}}"><b>{{$movie->title}}</b> ({{$movie->vote_count}} votes)</a>
                                </li>
                                
                            @endforeach
                            </ul>
                          </div>
                    </div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                            <div>
                                <nav aria-label="Pagination" style="text-align:center; font-weight: bold; width:100%;">
                                    <div style="display: inline-block;">
                                    @if(isset($page) && $page>1)
                                    <a href="/{{$page-1}}" class="relative inline-flex items-center px-4 py-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 " style="margin-right: 10px;"> Previous </a> 
                                     @endif 
                                    <a href="/1" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-4 border text-sm font-medium "> 1 </a>
                                    <a href="/2" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-4 border text-sm font-medium "> 2 </a>
                                    <a href="/3" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-4 border text-sm font-medium "> 3 </a>
                                    <a href="/4" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-4 border text-sm font-medium "> 4 </a>
                                    <a href="/5" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-4 border text-sm font-medium "> 5 </a>
                                    @if(isset($page) && $page<5) 
                                    <a href="/{{$page+1}}" class="ml-3 relative inline-flex items-center px-4 py-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 " style="margin-left:10px;"> Next </a>
                                    @endif
                                    </div>  
                                </nav>
                            </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>