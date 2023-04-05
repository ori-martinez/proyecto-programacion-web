<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/Favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/welcome.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>ReyRey Sports</title>
    </head>

    <body>
        <!-- Header (Start) -->
        <header>
            <!-- Navbar -->
            <nav>  
                <ul id="navbar">
                    <!-- Logo -->
                    <li id="navbar-logo">
                        <img src="./img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                    </li>
                    
                    <!-- Links -->
                    <li class="navbar-link">
                        <a href="#"><span class="icon-cheveron-right"></span>HOMBRES</a>
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
            <!-- carousel (Inicio) -->
            <div class="carousel">
                <div class="div-carousel">
                    <div id="item-carousel-1" class="item-carousel">
                        <div class="item-carousel-card">
                            <img src="./img/banners/1.png" alt="Promoción de Semana Santa">
                        </div>
                        <div class="item-carousel-arrows">
                            <a href="#item-carousel-3">
                            <span class="icon-cheveron-left"></span>
                            </a>
                            <a href="#item-carousel-2">
                                <span class="icon-cheveron-right"></span>
                            </a>
                        </div>
                    </div>

                    <div id="item-carousel-2" class="item-carousel">
                        <div class="item-carousel-card">
                            <img src="./img/banners/3.png" alt="Publicidad de ReyRey Sports">
                        </div>
                        <div class="item-carousel-arrows">
                            <a href="#item-carousel-1">
                                <span class="fas fa-chevron-left"></span>
                            </a>
                            <a href="#item-carousel-3">
                                <span class="fas fa-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                    <div id="item-carousel-3" class="item-carousel">
                        <div class="item-carousel-card">
                            <img src="./img/banners/2.png" alt="Moda de ReyRey Sports">
                        </div>
                        <div class="item-carousel-arrows">
                            <a href="#item-carousel-2">
                                <span class="fas fa-chevron-left"></span>
                            </a>
                            <a href="#item-carousel-1">
                                <span class="fas fa-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="div-carousel-controller">
                    <a href="#item-carousel-1">&#10625;</a>
                    <a href="#item-carousel-2">&#10625;</a>
                    <a href="#item-carousel-3">&#10625;</a>
                </div>
            </div>
            <!-- carousel (Fin) -->
        </main>
        <!-- Body (End) -->

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
        <script src="./js/index.js"></script>
    </body>
</html>
