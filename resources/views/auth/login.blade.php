<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/Favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/login-register.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>Login | ReyRey Sports</title>
    </head>

    <body>
        <!-- Header (Start) -->
        <header>
            <!-- Navbar -->
            <nav>  
                <ul id="navbar">
                    <!-- Logo -->
                    <li id="navbar-logo">
                        <a href="/">
                            <img src="./img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                        </a>
                    </li>
                    
                    <!-- Links -->
                    <li class="navbar-link">
                        <a href="#">HOMBRES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="#">MUJERES</a>
                    </li>
                    <li class="navbar-link">
                        <a href="#">ARTÍCULOS</a>
                    </li>
                    <li class="navbar-link">
                        <a href="#">BLOG</a>
                    </li>
                    <li class="navbar-link">
                        <a href="#">AYUDA</a>
                    </li>
                    
                    @if (Route::has('login'))
                        <!-- Actions Buttons -->
                        <li id="navbar-buttons">
                            <button class="navbar-button-icon">
                                <span class="icon-search"></span>
                            </button>

                            @auth
                                <a href="{{ url('/dashboard') }}">
                                    <button class="navbar-button-icon">
                                        <span class="icon-shopping-cart"></span>
                                    </button>    
                                </a>

                                <a href="{{ url('/profile') }}">
                                    <button class="navbar-button-icon">
                                        <span class="icon-user"></span>
                                    </button>    
                                </a>

                                <form id="navbar-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#navbar-form').submit();">
                                        <button class="navbar-button">Logout</button>        
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="navbar-button">
                                    <button class="navbar-button">Login</button>        
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <button class="navbar-button">Register</button>
                                    </a>
                                @endif
                            @endauth
                        </li>
                    @endif      
                    
                    <!-- Toggle Menu -->
                    <li class="navbar-toggle">
                        <img id="open" src="./img/menu-open-icon.svg" alt="Menú">
                    </li>
                </ul>                   
            </nav>
        </header>
        <!-- Header (End) -->

        <!-- Body (Start) -->
        <main>
            <!-- Error Message -->
            <div id="div-error"></div>

            <div class="div-form">
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <!-- Login Form -->
                <form id="login-form" method="POST" action="{{ route('login') }}">
                    <h2> Login </h2>

                    @csrf
                    
                    <input id="input-email" type="text" name="email" placeholder="Correo Electrónico">

                    <div id="password">
                        <input id="input-password" type="password" name="password" placeholder="Contraseña">

                        <button type="button" id="toggle-password">
                            <span class="icon-eye"></span>
                        </button>
                    </div>
                    
                    <button id="form-button">Login</button>
                </form>

                <p id="text">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a> </p>
            </div>   
        </main>

        <!-- Footer (Start) -->
        <footer>
            <!-- Social Media -->
            <div id="footer-social-media">
                <a class="footer-social-media-icon" href="https://www.facebook.com/" target="_blank">
                    <span class="icon-facebook2"></span>
                </a>
                <a class="footer-social-media-icon" href="https://www.instagram.com/" target="_blank">
                    <span class="icon-instagram"></span>
                </a>
                <a class="footer-social-media-icon" href="https://twitter.com/?lang=es" target="_blank">
                    <span class="icon-twitter"></span>
                </a>
            </div>

            <div id="footer-texts">
                <!-- Links -->
                <ul id="footer-links">
                    <li class="footer-link">
                        <a href="#">Términos de Uso</a>
                    </li>
                    <li class="footer-link">
                        <a href="#">Políticas de Privacidad</a>
                    </li>
                    <li class="footer-link">
                        <a href="#">Contáctanos</a>
                    </li>
                </ul>

                <p id="footer-copyright">Copyright &#169; 2023, ReyRey Sports</p>
            </div>

            <!-- Logo -->
            <img id="footer-logo" src="./img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="./js/login.js"></script>
    </body>
</html>
