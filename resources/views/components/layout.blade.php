<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 text-slate-800">
    <div class="mx-auto pr-5 pl-5 mt-10 max-w-3xl ">
        <div class="container">
            <div class="mb-10" >
                <a href="{{route('jobs.index') }}"><header class="text-4xl">Job board</header></a>
            </div>

        {{ $slot }}

        </div>
    </div>
    
    <div name="footer" class="mt-20 pt-20 bg-slate-800 text-white mx-auto pl-20">
        <p class="text-lg">Job board</p>
        <p class="mt-4 pb-20 text-sm">Job board is the special place for searching work.</p>
    </div>
</body>

</html>
