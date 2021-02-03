<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $meta->title ?? null }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $meta->description ?? null }}"/>
    <meta property="og:title" content="{{ $meta->title ?? null }}" />
    <meta property="og:description" content="{{ $meta->description ?? null }}" />
    <meta property="og:image" content="{{ $meta->image ?? null }}">
    <meta name="twitter:card" content="summary" />
    <link rel="stylesheet" href="{{ mix('/dist/app.css') }}">
    <script src="{{ mix('/dist/app.js') }}" defer></script>
    <link rel="shortcut icon" type="image/png" href="{{ $favicon ?? null }}">
</head>
<body>
    <div id="app">
        <x-layouts::header />

        <main>
            {!! $slot !!}
        </main>
    
        <x-layouts::footer />
    </div>
</body>
</html>