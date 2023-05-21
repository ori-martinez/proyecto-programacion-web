<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/welcome.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>ReyRey Sports</title>
    </head>

    <body>
        <!-- Header (Start) -->
        <header>
            <span class="navbar-toggle">
                <!-- Toggle Button -->
                <button class="toggle-button">
                    <img src="./img/menu-icon.svg" alt="Menú">
                </button>
            </span>

            <!-- Navbar -->
            <nav class="navbar">
                <!-- Logo -->
                <div id="navbar-logo">
                    <a href="/">
                        <img src="./img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
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

        <!-- Body (Start) -->
        <main>
            <!-- Carousel (Start) -->
            <section id="section-carousel">
                <!-- Arrows -->
                <a href="javascript: executeCarousel('prev');" class="arrow-prev">
                    <span class="icon-cheveron-left"></span>
                </a>
                <a href="javascript: executeCarousel('next');" class="arrow-next">
                    <span class="icon-cheveron-right"></span>
                </a>

                <!-- Selectors -->
                <ul class="list-carousel">
                    <li><a itlist="itList_0" href="#" class="item-selected"></a></li>
                    <li><a itlist="itList_1" href="#"></a></li>
                    <li><a itlist="itList_2" href="#"></a></li>
                </ul>

                <!-- Banners -->
                <ul id="banners">
                    <li style="background-image: url('./img/banners/1.svg'); z-index:0; opacity: 1;">
                        <div class="content-banner" >
                            <div>
                                <p id="banner-title-1">HASTA <span>30</span>% DE DESCUENTO</p>

                                <span class="banner-high-text-1">¡No dejes pasar estas ofertas!</span>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url('./img/banners/2.svg');">
                        <div class="content-banner" >
                            <div>
                                <p class="banner-high-text-2">¡SUPER OFERTAS DE SEMANA SANTA!</p>

                                <h2 id="banner-title-2">Están en pleno apogeo</h2>

                                <p class="banner-high-text-2">¡SUPER OFERTAS DE SEMANA SANTA!</p>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url('./img/banners/3.svg');">
                        <div class="content-banner" >
                            <div>
                                <h2>Encuentra lo mejor en deportes</h2>

                                <p>¡SÉ LO QUE USAS Y USA SIEMPRE LO MEJOR!</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- Carousel (End) -->
        </main>
        <!-- Body (End) -->

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
            <img id="footer-logo" src="./img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="./js/index.js"></script>
        <script type="text/javascript">
            if (document.querySelector('#section-carousel')) setInterval('executeCarousel("next")', 10000);

            if (document.querySelector('.list-carousel')) {
                let links = document.querySelectorAll('.list-carousel li a');

                links.forEach((link) => {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();

                        let list = this.getAttribute('itlist');
                        let arrayList = list.split("_");

                        executeCarousel(arrayList[1]);

                        return false;
                    });
                });
            }

            function executeCarousel (side) {
                let banners = document.getElementById('banners');
                let items = banners.getElementsByTagName('li');
                let currentItem, nextItem;

                for (let i = 0; i < items.length; i++) {
                    if (items[i].style.opacity === '1'){
                        currentItem = i;
                        break;
                    }
                }

                if (side === 'prev' || side === 'next') {
                    if (side === 'prev') {
                        nextItem = (currentItem === 0) ? items.length - 1 : currentItem - 1;
                    }
                    else {
                        nextItem = (currentItem === items.length - 1) ? 0 : currentItem + 1;
                    }
                }
                else {
                    nextItem = side;
                    side = (currentItem > nextItem) ? 'prev' : 'next';
                }

                let selectedItem = document.getElementsByClassName('list-carousel')[0].getElementsByTagName('a');

                selectedItem[currentItem].classList.remove('item-selected');
                selectedItem[nextItem].classList.add('item-selected');
                items[currentItem].style.opacity = 0;
                items[currentItem].style.zIndex = 0;
                items[nextItem].style.opacity = 1;
                items[nextItem].style.zIndex = 1;
            }
        </script>
    </body>
</html>
