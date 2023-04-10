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
                                        @if (Auth::user()->rol_id === 1)
                                            <span class="icon-dashboard"></span>
                                        @else            
                                            <span class="icon-shopping-cart"></span>
                                        @endif
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
        <script src="./js/welcome.js"></script>
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
