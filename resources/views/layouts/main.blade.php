<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="icon" href="{{ URL::asset('/img/favicon.png') }}" type="image/x-icon"/>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito" rel="stylesheet">

        <!--CSS do BootStrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!--CSS da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/script.js"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="/" class="navbar-brand">
                    <img src="/img/hotel_icon.png" alt="Hoteleira">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Quartos Disponiveis</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a href="/quartos/create" class="nav-link">Disponibilizar Quarto</a>
                            </li>
                            <li class="nav-item">
                                <a href="/reservas" class="nav-link">Minhas reservas</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                </div>
                @yield('content')
            </div>
        </main>
        <footer>
            <p>&copy; Hoteleira</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
