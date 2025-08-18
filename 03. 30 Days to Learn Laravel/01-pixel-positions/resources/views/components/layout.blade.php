<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white pb-8">
    <header class="flex justify-between items-center px-10 py-4 border-b border-white/10">
        <a href="/">
            <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="Site Logo" />
        </a>

        <nav>
            <ul class="flex justify-center items-center gap-10 font-bold">
                <li><a href="/">Jobs</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Salaries</a></li>
                <li><a href="#">Companies</a></li>
            </ul>
        </nav>

        @auth
            <a href="/jobs/create">Post a Job</a>
        @endauth
        @guest
            <ul class="flex justify-center items-center gap-5">
                <li><a href="/register">Sign Up</a></li>
                <li><a href="/login">Log In</a></li>
            </ul>
        @endguest
    </header>

    <main class="mt-10 max-w-[986px] container mx-auto px-10">
        {{ $slot }}
    </main>
</body>
</html>
