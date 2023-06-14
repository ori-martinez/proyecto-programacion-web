<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/products/index.css">
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
                    <a href="{{ route('welcome') }}">
                        <img src="../img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                    </a>
                </div>

                <!-- Links -->
                <ul class="navbar-links">
                    <li class="navbar-link">
                        <a href="{{ route('products.men') }}">HOMBRES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ route('products.women') }}">MUJERES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ route('products.articles') }}">ARTÍCULOS</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ route('extras.blog') }}">BLOG</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ route('extras.help') }}">AYUDA</a>
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
                                <!-- Error Message -->
                                <div id="div-error-search"></div>

                                <form id="search-form" method="POST" action="{{ route('products.search') }}">
                                    @csrf

                                    <input type="text" id="input-search" name="search" placeholder="Buscar...">
                                    
                                    <a href="{{ route('products.search') }}">
                                        <button>
                                            <span class="icon-search"></span>
                                        </button>
                                    </a>
                                </form>
                            </div>
                        </div>
                        
                        @auth
                            <!-- Dashboard -->
                            <a href="{{ route('dashboard') }}">
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
                                        <a href="{{ route('profile.edit') }}">Editar Perfil</a>
                                    </li>

                                    @if (Auth::user()->rol_id === 1)
                                        <li class="user-menu-link">
                                            <a href="{{ route('register.admin') }}">Crear Administrador</a>
                                        </li>
                                    @endif

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
            <h1 id="title-products">Productos para Hombres</h1>

            <section id="grid-cards">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/{{ $product->img }}" alt="Imagen de {{ $product->name }}">
                        </div>

                        <div class="card-content">
                            <h3>{{ $product->name }}</h3>
                            
                            <a href="{{ route('products.product', ['id' => $product->id ]) }}" class="card-button">Detalles</a>
                        </div>
                    </div>
                @endforeach
            </section>
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
                        <a href="{{ route('extras.terms') }}">Términos de Uso</a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('extras.policies') }}">Políticas de Privacidad</a>
                    </li>
                    <li class="footer-link">
                        <a href="{{ route('extras.contact') }}">Contáctanos</a>
                    </li>
                </ul>

                <p id="footer-copyright">Copyright &#169; 2023, ReyRey Sports</p>
            </div>

            <!-- Logo -->
            <img id="footer-logo" src="../img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="../js/products/index.js"></script>
    </body>
</html>
