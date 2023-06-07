<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/help.css">
        <link rel="stylesheet" href="../css/extras/estilos.css">
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
                                <h2 class="content-header">Acerca de ReyRey sports  </h2 >
                            </div >

                            <div class="global-cuerpo">
                                <div class="gcuerpoA">
                                    <div class="acuerdo-item">
                                        <h3 class="acuerdo-coco">¿Quién es ReyRey sports? <img src="../img/suma.svg" alt="abrir respuesta" >
                                            <i class="menu-icon">  </i >
                                        </h3 >
                                        <div class="acuerdo-cuerpo">
                                            <div class="cuerpo-item">
                                                <div class=""> ReyRey sports es una empresa Venezolana con sede en La Guaira y ofrece una amplia gama de servicios en muchas áreas diferentes. ReyRey sports es una plataforma , que te permite comprar online una gama de artículos deportivos. </div >
                                            </div >
                                        </div >
                                    </div >
                                    <div class="acuerdo-item">
                                        <h3 class="acuerdo-coco" >¿Cómo funciona ReyRey sports? <img src="../img/suma.svg" alt="abrir respuesta" >
                                            <i class="menu-icon">  </i >
                                        </h3 >
                                        <div class="acuerdo-cuerpo">
                                            <div class="cuerpo-item">
                                                <div class=""> Por cada compra que realices a través de Rakuten.es en una de nuestras tiendas asociadas, recibimos una comisión de la tienda. Te pasamos parte de la comisión en forma de cashback - ¡así es como recuperas el dinero de tus compras con Rakuten! </div >
                                            </div >
                                        </div >
                                    </div >
                                    <div class="acuerdo-item">
                                        <h3 class="acuerdo-coco">¿Es ReyRey sports un servicio gratuito? <img src="../img/suma.svg" alt="abrir respuesta" >
                                            <i class="menu-icon">  </i >
                                        </h3 >
                                        <div class="acuerdo-cuerpo">
                                            <div class="cuerpo-item">
                                                <div class=""> Sí, ReyRey es un servicio completamente gratuito. </div >
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
               <!--  intento de adaptación-->

               <h1 class="titulo">Preguntas Frecuentes</h1>
		<div class="categorias" id="categorias">
			<div class="categoria activa" data-categoria="metodos-pago">
				<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z"/></svg>
				<p>Métodos de pago</p>
			</div>
			<div class="categoria" data-categoria="entregas">
				<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M7 24h-5v-9h5v1.735c.638-.198 1.322-.495 1.765-.689.642-.28 1.259-.417 1.887-.417 1.214 0 2.205.499 4.303 1.205.64.214 1.076.716 1.175 1.306 1.124-.863 2.92-2.257 2.937-2.27.357-.284.773-.434 1.2-.434.952 0 1.751.763 1.751 1.708 0 .49-.219.977-.627 1.356-1.378 1.28-2.445 2.233-3.387 3.074-.56.501-1.066.952-1.548 1.393-.749.687-1.518 1.006-2.421 1.006-.405 0-.832-.065-1.308-.2-2.773-.783-4.484-1.036-5.727-1.105v1.332zm-1-8h-3v7h3v-7zm1 5.664c2.092.118 4.405.696 5.999 1.147.817.231 1.761.354 2.782-.581 1.279-1.172 2.722-2.413 4.929-4.463.824-.765-.178-1.783-1.022-1.113 0 0-2.961 2.299-3.689 2.843-.379.285-.695.519-1.148.519-.107 0-.223-.013-.349-.042-.655-.151-1.883-.425-2.755-.701-.575-.183-.371-.993.268-.858.447.093 1.594.35 2.201.52 1.017.281 1.276-.867.422-1.152-.562-.19-.537-.198-1.889-.665-1.301-.451-2.214-.753-3.585-.156-.639.278-1.432.616-2.164.814v3.888zm3.79-19.913l3.21-1.751 7 3.86v7.677l-7 3.735-7-3.735v-7.719l3.784-2.064.002-.005.004.002zm2.71 6.015l-5.5-2.864v6.035l5.5 2.935v-6.106zm1 .001v6.105l5.5-2.935v-6l-5.5 2.83zm1.77-2.035l-5.47-2.848-2.202 1.202 5.404 2.813 2.268-1.167zm-4.412-3.425l5.501 2.864 2.042-1.051-5.404-2.979-2.139 1.166z"/></svg>
				<p>Entregas</p>
			</div>
			<div class="categoria" data-categoria="seguridad">
				<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3zm0 1.292c2.942 2.31 5.12 2.655 8 2.701v10.542c0 3.891-2.638 4.943-8 8.284-5.375-3.35-8-4.414-8-8.284v-10.542c2.88-.046 5.058-.391 8-2.701zm5 7.739l-5.992 6.623-3.672-3.931.701-.683 3.008 3.184 5.227-5.878.728.685z"/></svg>
				<p>Seguridad</p>
			</div>
			<div class="categoria" data-categoria="cuenta">
				<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z"/></svg>
				<p>Cuenta</p>
			</div>
		</div>

		<div class="preguntas">

			<!-- Preguntas Metodos de pago -->
			<div class="contenedor-preguntas activo" data-categoria="metodos-pago">
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Que metodos de pago disponibles tienen? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit.</p>
				</div>
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Tienen plazo de pago? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
			</div>

			<!-- Preguntas Entregas -->
			<div class="contenedor-preguntas" data-categoria="entregas">
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Tienen entregas a domicilio? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
				<div class="contenedor-pregunta">
					<p class="pregunta">¿En cuanto sale el envio a mi país? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
			</div>

			<!-- Preguntas Seguridad -->
			<div class="contenedor-preguntas" data-categoria="seguridad">
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Como puedo saber si son confiables? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Que pasa con mis datos personales? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
			</div>

			<!-- Preguntas Cuenta -->
			<div class="contenedor-preguntas" data-categoria="cuenta">
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Como puedo acceder a mis pedidos? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
				<div class="contenedor-pregunta">
					<p class="pregunta">¿Como puedo cambiar mi contraseña? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
					<p class="respuesta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.adipisicing elit. Voluptatum laborum porro voluptates, sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates soluta adipisci, perferendis voluptatibus eligendi vel saepe harum. Consectetur, doloribus.</p>
				</div>
			</div>




		</div>
                    <!-- fin del intento de adaptaciónc -->
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
        <script src="../../js/extras/pregutasFrecuentes.js"></script>
        <script src="../../js/extras/categorias.js"></script>
    </body>
</html>
