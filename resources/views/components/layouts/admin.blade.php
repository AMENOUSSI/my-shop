<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" data-theme="cymak
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
 
    
 
    {{-- The main content with `full-width` --}}
    <x-main with-nav full-width>
 
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
 
    {{--  TOAST area --}}
    <x-toast />
</body>
</html>