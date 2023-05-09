<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/Favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/help.css">
        <link rel="stylesheet" href="../css/styles.css" />

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
                        <a href="/">
                            <img src="../img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                        </a>
                    </li>

                    <!-- Links -->
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
                        <a href="#">BLOG</a>
                    </li>
                    <li class="navbar-link">
                        <a href="{{ url('/ayuda') }}">AYUDA</a>
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
                        <img id="open" src="../img/menu-open-icon.svg" alt="Menú">
                    </li>
                </ul>
            </nav>
        </header>
        <!-- Header (End) -->

        <!-- Body -->
        <main>
            <div class="privacy-policy">
                <div class="common-policy contenido">
                    <div class="cont-encabezado">
                        <div class="espacio izq"></div>
                        <div class="centro">
                         <div class="contenido-centro">Ayuda y preguntas frecuentes</div>
                        </div>
                        <div class="espacio derch"></div>
                    </div >
                    <!-- intento de acerca de nosotros-->
                    <div class="content-general">
                        <div class="global">
                            <div class="global-coco">
                                <h2 class="content-header">  </h2 >
                            </div >

                            <div class="global-cuerpo">
                                <div class="gcuerpoA">
                                    <div class="acuerdo-item">
                                        <h3 class="">¿Quién es ReyRey sports?
                                            <i class="">  </i >
                                        </h3 >
                                        <div class="">
                                            <div class="">
                                                <div class="">  </div >
                                            </div >
                                        </div >
                                    </div >
                                    <div class="acuerdo-item">
                                        <h3 class="">¿Cómo funciona ReyRey sports?
                                            <i class="">  </i >
                                        </h3 >
                                        <div class="">
                                            <div class="">
                                                <div class="">  </div >
                                            </div >
                                        </div >
                                    </div >
                                    <div class="acuerdo-item">
                                        <h3 class="">¿Es ReyRey sports un servicio gratuito?
                                            <i class="">  </i >
                                        </h3 >
                                        <div class="">
                                            <div class="">
                                                <div class="">  </div >
                                            </div >
                                        </div >
                                    </div >
                                </div >
                            </div >
                        </div >
                    </div >
                    <!-- Fin de el intento -->
                    <!-- intento de sección de ayuda-->
                    <div class="Contenido-principal">
                        <h2 class="content-header">Una ayuda de como iniciar sesión </h2>
                        <div class="content-step">
                            <div class="content-stepU">
                                <div class="stepHeader">
                                    <div class="StepHeader-numb">
                                        <div class="numb">1</div>
                                    </div>
                                    <div class="StepHeader-tex">registro</div>
                                </div>
                                <div class="undefined">Da click en el botón register y completa los datos solicitados</div>
                            </div>
                            <div class="content-stepU">
                                <div class="stepHeader">
                                    <div class="StepHeader-numb">
                                        <div class="numb">2</div>
                                    </div>
                                    <div class="StepHeader-tex"> registro verificado</div>
                                </div>
                                <div class="undefined">Después de llenar los datos toca el register y sus datos serán validados si son correctos </div>
                            </div>
                            <div class="content-stepU">
                                <div class="stepHeader">
                                    <div class="StepHeader-numb">
                                        <div class="numb">3</div>
                                    </div>
                                    <div class="StepHeader-tex">inicio de sesión</div>
                                </div>
                                <div class="undefined">Ya con ello se tendrá un usuario dando click al botón login y llenar los datos preveiamente validados iniciara sesión</div>
                            </div>
                        </div>
                        <div class="pie-step"></div>
                    </div >
                    <!-- fin del intento -->
                </div >
            </div >
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
        <script src="../../js/extras/help.js"></script>
    </body>
</html>
