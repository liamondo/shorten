<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ? $title . ' - ' . env("APP_NAME") : env("APP_NAME") }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
</head>
<body class="antialiased text-zinc-800 bg-zinc-100 dark:text-zinc-50 dark:bg-zinc-900">

    {{ $slot }}

    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
