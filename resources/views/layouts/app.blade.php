<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>Feed me</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-7">
        <ul class="flex items-center">
            <li><a href="" class="p-3">Accueil</a></li>
            <li><a href="" class="p-3">Dashboard</a></li>
            <li><a href="{{ route('feeds') }}" class="p-3">Post</a></li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li><a href="" class="p-3">{{ auth()->user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                        <button type="submit">Déconnexion <i class="fas fa-sign-in-alt fa-lg"></i></button>
                    </form>
                </li>
            @endauth
            @guest
                <li><a href="{{ route('login') }}" class="p-3">Connexion</a></li>
                <li><a href="{{ route('register') }}" class="p-3">Inscription</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
