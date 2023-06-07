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
                                        <div id="" class="u-1-texto">
                                        <h1>CONTACTO</h1>
                                        <p>Puede encontrar nuestro número de centralita a continuación. Desplácese hacia abajo para ponerse en contacto con el equipo responsable para preguntas más específicas.</p>
                                        <ul>
                                            <li> <p>Nuestro equipo de atención al cliente está haciendo lo mejor que puede para ayudarlo.</p></li>
                                            <li> <p>Le pedimos que espere de 7 a 10 días después de haber enviado su pregunta para recibir una respuesta</p></li>
                                            <li> <p>Ponte en contacto con nuestro dedicado equipo de atención al cliente social en nuestras redes sociales </p></li>
                                        </ul>
                                        <p>¡Esperamos conectarnos!</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="" class="u-2 bloque bloque-separador">
                                    <div class="separador-u2">
                                        <hr>
                                    </div>
                                </div>
                                <div id="" class="u-3 bloque bloque-texto">
                                    <div class="separador-u3">
                                        <div class="datos-u3">
                                            <p>
                                                Envíenos un correo electrónico a
                                                <strong _istranslate="1">reyrey.sports.web@gmail.com
                                                <br _istranslate="1">
                                                </strong>
                                                 O llámenos al
                                                 <strong _istranslate="1">+58 (414) 260-3391
                                                <br _istranslate="1">
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="col sesion-2">
                                <div id="" class="bloque bloque-space">
                                    <div id="" class="bloque-space-content">kdlsladjkl</div>
                            </div>
                            </div>
                            <div id="" class="col sesion-3">
                                <div id="" class="bloque bloque-formulario">
                                    <div>
                                        <div>
                                            <div class="content-content">
                                            </div>
                                            <div class="content-form">
                                                <form class="form-contents">
                                                    <div class="field-list">
                                                        <fieldset class="item-form fields ">
                                                            <legend class="titulo">
                                                                <div class="ZZZ">
                                                                    <span>Nombre</span>
                                                                    <span class="descripcion">(requerido)</span>
                                                                </div>
                                                            </legend>
                                                            <div class="field name">
                                                                <label class="caption divisor">
                                                                    <div class="title-sub">
                                                                        <div class="sub">
                                                                            <span class="caption-text">Nombre</span>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="nombre" aria-invalid="false" aria-required="true" autocomplete="given-name">
                                                                </label>
                                                            </div>
                                                            <div class="field apellido">
                                                                <label class="caption divisor">
                                                                    <div class="title-sub">
                                                                        <div class="sub">
                                                                            <span class="caption-text">Apellido</span>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="nombre" aria-invalid="false" aria-required="true" autocomplete="family-name">
                                                                </label>
                                                            </div>
                                                        </fieldset>
                                                        <div class="item-form field emails">
                                                            <label class="title direcciones" aria-label="Correo electrónico">
                                                                <div class="sub-direccion">
                                                                    <div class="direccion">
                                                                        <span>Correo electrónico</span>
                                                                        <span class="descripcion">(requerido)</span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <input type="email" class="nombre" aria-invalid="false" aria-label="Correo electrónico" aria-required="true" autocomplete="false">
                                                        </div>
                                                        <div class="item-form field textareas">
                                                            <label class="title direcciones" aria-label="Área de texto">
                                                                <div class="sub-direccion">
                                                                    <div class="direccion">
                                                                        <span>Motivo de contacto</span>
                                                                        <span class="descripcion">(requerido)</span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <textarea aria-invalid="false" classP="mensaje" placeholder></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-boton boton-form">
                                                        <input type="submit" class="boton sistema-boton" value="enviar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Pagina de Contacto</h2>
            <!-- completado de reedirección hacia ayuda -->
            <div class="contenido-principal principal">
                <div class="divisores-principales principales">
                    <div class="contenedor-exterior exterior">
                        <div class="contenedor-interior interior">
                            <img src="" alt="" />
                            <div class="interior-contenido contedino">
                                <h2 class="texto-contenido indicador">SERVICIO AL CLIENTE</h2>
                                <h2 class="texto-contenido definicion">Tiene preguntas sobre nuestros servicios? Nuestra línea directa al cliente puede ayudar.</h2>
                                <a class="enlace" href="#"></a>
                            </div>

                        </div>
                    </div>
                </div>
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
