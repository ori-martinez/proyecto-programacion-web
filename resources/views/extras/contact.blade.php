<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/contact.css">
        <link rel="stylesheet" href="../css/styles.css" />

        <title>ReyRey Sports</title>
    </head>

    <body>
        <!-- Header (Start) -->
        <header>
            <span class="navbar-toggle">
                <!-- Toggle Button -->
                <button class="toggle-button">
                    <img src="../img/menu-icon.svg" alt="Menú">
                </button>
            </span>

            <!-- Navbar -->
            <nav class="navbar">
                <!-- Logo -->
                <div id="navbar-logo">
                    <a href="/">
                        <img src="../img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                    </a>
                </div>

                <!-- Links -->
                <ul class="navbar-links">
                    <li class="navbar-link">
                        <a href="{{ url('/productos/hombres') }}">HOMBRES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ url('/productos/mujeres') }}">MUJERES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ url('/productos/articulos') }}">ARTÍCULOS</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ url('/blog') }}">BLOG</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ url('/ayuda') }}">AYUDA</a>
                    </li>
                </ul>

                @if (Route::has('login'))
                    <!-- Actions Buttons -->
                    <div id="navbar-buttons">
                        <!-- Searcher -->
                        <div id="navbar-searcher">
                            <button id="searcher-button" class="navbar-button-icon">
                                <span class="icon-search"></span>
                            </button>

                            <div id="searcher-input">
                                <input type="text" name="searcher">
                            </div>
                        </div>

                        @auth
                            <!-- Dashboard -->
                            <a href="{{ url('/dashboard') }}">
                                <button class="navbar-button-icon">
                                    @if (Auth::user()->rol_id === 1)
                                        <span class="icon-dashboard"></span>
                                    @else
                                        <span class="icon-shopping-cart"></span>
                                    @endif
                                </button>
                            </a>

                            <!-- User Menu -->
                            <div id="navbar-user-menu">
                                <button id="user-menu-button" class="navbar-button-icon">
                                    <span class="icon-user"></span>
                                </button>

                                <ul id="user-menu">
                                    <li class="user-menu-name">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</li>

                                    <li class="user-menu-link">
                                        <a href="{{ url('/profile') }}">Editar Perfil</a>
                                    </li>
                                    <li class="user-menu-link">
                                        <form id="navbar-form" method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#navbar-form').submit();">
                                                <button class="navbar-button">Logout</button>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <!-- Login -->
                            <a href="{{ route('login') }}" class="navbar-button">
                                <button class="navbar-button">Login</button>
                            </a>

                            @if (Route::has('register'))
                                <!-- Register -->
                                <a href="{{ route('register') }}">
                                    <button class="navbar-button">Register</button>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </header>
        <!-- Header (End) -->

        <!-- Body -->
        <main>
            <div id="" class="content-wrapper">
                <div id="" class="content">
                    <div id="" class="sesions">
                        <div id="" class="sesion page-sesion">
                            <div id="" class="col sesion-1">
                                <div id="" class="u-1 bloque bloque-texto">
                                    <div id="" class="bloque-texto-content">
                                        <div id="" class="u-1-texto"></div>
                                    </div>
                                </div>
                                <div id="" class="u-2 bloque bloque-separador"></div>
                                <div id="" class="u-3 bloque bloque-texto"></div>
                            </div>
                            <div id="" class="col sesion-2">
                                <div id="" class="bloque bloque-space">
                                    <div id="" class="bloque-space-content">kdlsladjkl</div>
                            </div>
                            </div>
                            <div id="" class="col sesion-3">
                                <div id="" class="bloque bloque-formulario"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Pagina de Contacto</h2>
        </main>

        <!-- Footer (Start) -->
        <footer>
            <!-- Social Media -->
            <div id="footer-social-media">
                <a class="footer-social-media-icon" href="https://www.facebook.com/profile.php?id=100091871862034" target="_blank">
                    <span class="icon-facebook2"></span>
                </a>
                <a class="footer-social-media-icon" href="https://www.instagram.com/reyreysports/" target="_blank">
                    <span class="icon-instagram"></span>
                </a>
                <a class="footer-social-media-icon" href="https://twitter.com/reyreysports/following" target="_blank">
                    <span class="icon-twitter"></span>
                </a>
            </div>

            <div id="footer-texts">
                <!-- Links -->
                <ul id="footer-links">
                    <li class="footer-link">
                        <a href="{{ url('/terminos') }}">Términos de Uso</a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ url('/politicas') }}">Políticas de Privacidad</a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ url('/contacto') }}">Contáctanos</a>
                    </li>
                </ul>

                <p id="footer-copyright">Copyright &#169; 2023, ReyRey Sports</p>
            </div>

            <!-- Logo -->
            <img id="footer-logo" src="../img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="../../js/extras/contact.js"></script>
    </body>
</html>
