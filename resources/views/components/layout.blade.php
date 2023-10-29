<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
</head>

<body class="mx-auto pr-5 pl-5 mt-10 max-w-3xl bg-slate-100 text-slate-800">
    <div>
        <div class="mb-10">
            <header class="text-4xl">Job board</header>
        </div>

        {{ $slot }}

    </div>
</body>

</html>
