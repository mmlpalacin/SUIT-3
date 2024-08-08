<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/logo/loguito.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            .alert{background-color: rgb(108, 192, 108);}
            .post {border:none;background-color:#ffffff;color:#333;display: flex;flex-direction: column;justify-content: center;align-items: center;padding-top: 1.5rem;margin-left: 2em;margin-right: 2em; margin-bottom: 2em;padding: 10px 0;}
        </style>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-green-100">
            <nav  style="background-color: darkgreen">@yield('nav')</nav>
                <div class="mt-4 ml-4">
                    @yield('content')
                </div>
                <footer style="background-color:#333;color:#fff;text-align:center;padding:1em 0;width:100%;bottom:0;">
                    <br>
                    <p>&copy; 2024 cmc. Todos los derechos reservados.</p>
                </footer>
                @yield('scripts')
                    @stack('modals')
                 <!-- Scripts -->
                    @vite('resources/js/app.js')
                    @livewireScripts
        </div>
    </body>
</html>