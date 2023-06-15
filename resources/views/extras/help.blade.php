<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/index.css">
        <link rel="stylesheet" href="../css/extras/help.css">
        <link rel="stylesheet" href="../css/extras/styles.css">
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

        <!-- Body (Start) -->
        <main>
            <div class="privacy-policy">
                <div class="common-policy content">
                    <!-- Heading Content -->
                    <div class="heading-content">
                        <div class="space left"></div>
                        <div class="center">
                            <div class="content-center">Ayuda</div>
                        </div>
                        <div class="space right"></div>
                    </div>

                    <!-- Login Help (Start) -->
                    <div class="main-content-steps">
                        <h2 class="content-steps-title">Iniciar Sesión</h2>
                        
                        <div class="content-steps">
                            <div class="step">
                                <div class="step-header">
                                    <div class="step-header-numb">
                                        <div class="numb">1</div>
                                    </div>
                                    <div class="step-header-title">Registro</div>
                                </div>
                                <div>Dentro de la página de registro, completa los datos solicitados y hace click en el botón Register.</div>
                            </div>
                            <div class="step">
                                <div class="step-header">
                                    <div class="step-header-numb">
                                        <div class="numb">2</div>
                                    </div>
                                    <div class="step-header-title">Registro Verificado</div>
                                </div>
                                <div>Después de clickear el bóton, sus datos serán validados. De ser correcto, su registro será procesado.</div>
                            </div>
                            <div class="step">
                                <div class="step-header">
                                    <div class="step-header-numb">
                                        <div class="numb">3</div>
                                    </div>
                                    <div class="step-header-title">Inicio de Sesión</div>
                                </div>
                                <div>Al procesar el registro, será redirigido al panel de usuario. Al hacer login, debe ingresar el correo y contraseña de su registro.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Login Help (End) -->
                </div >
            </div >

            <!-- FQA (Start) -->
                <h1 class="titulo">Preguntas Frecuentes</h1>

                <!-- Categories -->
                <div class="categorias" id="categorias">
                    <div class="categoria activa" data-categoria="metodos-pago">
                        <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z"/></svg>
                        <p>Métodos de Pago</p>
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

                <!-- Questions & Answers -->
                <div class="preguntas">
                    <!-- Payment Method -->
                    <div class="contenedor-preguntas activo" data-categoria="metodos-pago">
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Qué metodos de pago están disponibles? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">
                                En <span>ReyRey Sports</span> se aceptan diferentes medios de pagos, para que tu compra sea aún más fácil: Efectivo, Zelle, Venmo, Paypal, Tranferencia Bancaria y Pago Móvil. <br>
                                Pagos en efectivo únicamente en La Guaira. <br>
                                Transferencia Bancaria o Pago Móvil: Si selecciona uno de estos dos métodos de pago, en los próximos minutos el departamento de atención al cliente se comunicará con el cliente, para indicarle los datos bancarios y el monto para que proceda a realizar la transferencia. <br>
                                La selección del método de pago, es la última fase del proceso para concretar la compra.
                            </p>
                        </div>
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Tienen plazo de pago? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">Por los momentos, la opción de plazo de pago no se encuentra habilitada.</p>
                        </div>
                    </div>

                    <!-- Delivery -->
                    <div class="contenedor-preguntas" data-categoria="entregas">
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Tienen entregas a domicilio? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">
                                ¡Ahora <span>ReyRey Sports</span> llega a todos los rincones de Venezuela! Para realizar compras con envíos fuera de La Guaira. Haz tu pedido por esta web y retiralo en tu agencia de MRW o Zoom más cercana. Los pedidos como mínimo tardan entre 48 y 72 horas. (Aplican excepciones). <br>
                                Para pedidos hechos dentro del estado La Guaira, se cuenta con delivery y le será entregado en un punto céntrico de la vía principal. 
                            </p>
                        </div>
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿En cuánto sale el envío a mi país? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">Por los momentos, <span>ReyRey Sports</span> no cuenta con servicios de envio internacionales. Más si vives en Venezuela, los envíos seran a través de las agencias de MRW o Zoom.</p>
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="contenedor-preguntas" data-categoria="seguridad">
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Cómo puedo saber si son confiables? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta"><span>ReyRey Sports</span> es una compañía líder en la industria deportiva del Estado La Guaira, contando con el mejor surtido de implementos deportivos, de la más alta calidad y un excelente servicio, apoyado en el asesoramiento asertivo para cada deporte que practiquen los clientes. Por eso, <span>ReyRey Sports</span> está comprometido para que cada una de las personas alcancen su más alto rendimiento y viva la mejor experiencia al momento de desempeñarse en su respectiva actividad. Además, se puede verificar la información con otras fuentes confiables como al revisar las credenciales de la empresa.</p>
                        </div>
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Qué pasa con mis datos personales? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">El tratamiento de datos personales se adopta en base a la ley de la siguente manera, se garantizan los derechos de la privacidad, intimidad y el buen nombre, en el tratamiento de datos personales; y en consecuencia todas las actuaciones serán regidas por los principios de legalidad, finalidad, libertad, veracidad o calidad, transparencia, acceso y circulación restringida, seguridad y confidencialidad.</p>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="contenedor-preguntas" data-categoria="cuenta">
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Cómo puedo acceder a mis pedidos? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">En la barra de navegación, haga click al icono de carrito de compras. Así, será redirigido al panel de usuario, donde se desplegarán en una tabla las compras realizadas.</p>
                        </div>
                        <div class="contenedor-pregunta">
                            <p class="pregunta">
                                ¿Cómo puedo cambiar mi contraseña? <img src="./img/suma.svg" alt="Abrir Respuesta" />
                            </p>
                            <p class="respuesta">Para cambiar la contraseña de usuario ingresada en el registro, haga click a la opción de <b>Editar Perfil</b> del menú de usuario. En ella, busque la sección de <b>Gestión de Contraseña</b> y complete el formulario. Guarde los cambios y su contraseña ya estará cambiada.</p>
                        </div>
                    </div>
                </div>
            <!-- FQA (End) -->
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
                <a class="footer-social-media-icon" href="https://twitter.com/reyreysports" target="_blank">
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
        <script src="../../js/extras/help.js"></script>
        <script src="../../js/extras/pregutasFrecuentes.js"></script>
        <script src="../../js/extras/categorias.js"></script>
    </body>
</html>
