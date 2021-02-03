<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WP NEXT</title>
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