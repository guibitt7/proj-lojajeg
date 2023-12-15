<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="dropdown">
                    <a href="/produtos">Produtos</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/categoria/Televisões">Televisão</a>
                        </li>
                        <li>
                            <a href="/categoria/Telefones">Celular</a>
                        </li>
                        <li>
                            <a href="#">Categoria 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/carrinho">Carrinho</a>
                </li>
                <li>
                    <a href="/contato">Contato</a>
                </li>
                @if (Auth::check())
                <li class="dropdown dropdown-hover">
                    <a href="/dashboard">Dashboard</a>
                </li>
                @else
                <li>
                    <a href="/login">Login</a>
                </li>
                <li>
                    <a href="/register">Registro</a>
                </li>
                @endif
            </ul>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
