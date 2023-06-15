<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/login-register.css">
        <link rel="stylesheet" href="../css/styles.css" />

        <title>Register Producto | ReyRey Sports</title>
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

        <!-- Body (Start) -->
        <main>
            <div class="div-form">
                <!-- Error Message -->
                <div id="div-error">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            @if ($error === "The email has already been taken.")
                                <p class="error-message">El correo electrónico ya esta registrado</p>
                            @else
                                <p class="error-message">{{ $error }}</p>
                            @endif
                        @endforeach
                    @endif
                </div>

                <h2></h2>

                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <!-- Login Form -->
                <form id="register-form"">
                    <h2>Producto</h2>

                    <input id="input-name" type="text" name="name" placeholder="Nombre">
                    <input id="input-price" type="text" name="price" placeholder="Precio">
                    
                    <select id="input-category" name="category">
                        <option value="0">Categoría...</option>
                        <option value="1">Hombres</option>
                        <option value="2">Mujeres</option>
                        <option value="3">Artículos</option>
                    </select>
                    <select id="input-sport" name="sport">
                        <option value="0">Deporte...</option>
                        <option value="2">Fútbol</option>
                        <option value="3">Básquetbol</option>
                        <option value="4">Béisbol</option>
                        <option value="1">Todos</option>
                    </select>

                    <input accept="image/png" id="input-img" type="file" name="img" placeholder="Imagen...">
                    
                    <a href="{{ route('dashboard') }}">
                        <button id="form-button">Register</button>
                    </a>
                    
                </form>
            </div>   
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
        <script src="../js/profile/product.js"></script>
    </body>
</html>
