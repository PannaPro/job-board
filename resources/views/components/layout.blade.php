<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-300 text-slate-800">
    <div class="mx-auto pr-5 pl-5 mt-10 max-w-3xl">
            <nav class="mb-8 flex justify-between text-lg">
                <ul>
                    <li>
                        <a href="{{ route('jobs.index') }}"><header class="text-4xl">Job Board</header></a>
                    </li>
                </ul>

                <ul>
                    @auth
                        <div class="flex justify-between space-x-5">
                            <li>   
                            {{ Auth()->user()->name ?? Anynomus }}
                            </li>
                            <li>
                                <form action="{{ route('auth.destroy')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="hover:underline">Logout</button>
                                </form>
                            </li>
                        </div>    
                    @else
                        <li>
                            <a href="{{ route('auth.create')}}">Sign in</a>    
                        </li>
                    @endauth

                </ul>
         
               
            </nav>


        {{ $slot }}

    </div>
    
    <div name="footer" class="mt-20 pt-20 bg-slate-800 text-white mx-auto pl-20">
        <p class="text-lg">Job board</p>
        <p class="mt-4 pb-20 text-sm">Job board is the special place for searching work.</p>
    </div>
</body>

</html>
