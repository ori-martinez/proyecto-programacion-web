<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/terms.css">
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

        <!-- Body -->
        <main>
           <!--mini cabecera  -->
           <div class="privacy-policy">
                <div class="common-policy contenido">
                    <div class="cont-encabezado">
                        <div class="espacio izq"></div>
                        <div class="centro">
                         <div class="contenido-centro">Términos y condiciones</div>
                        </div>
                        <div class="espacio derch"></div>
                    </div >
                    <!-- contenido <div ></div> <h2></h2> <b></b>  <p></p>-->
                    <div class="Cuerpo">
                        <div >
                            <h2>TÉRMINOS DEL SERVICIO DE USUARIO</h2>
                            <p>
                                <b>Fecha de entrada en vigor: 3 de mayo de 2023</b>
                            </p>
                            <p>
                            Por favor, lea lo siguiente detenidamente. Los términos siguientes forman un contrato vinculante entre usuarios de este servicio (“usuario” o “usted”) y ReyRey sports, que rige el uso de los servicios de ReyRey sports. Empezaremos a prestarle los Servicios de inmediato contra su aceptación del presente Acuerdo. Usted de forma expresa certifica y pacta que no podrá retirarse de este Acuerdo de un modo distinto al especificado a continuación una vez se hayan iniciado los Servicios.
                            </p>
                        </div>
                        <div >
                            <h2>CON QUIÉN TIENE EL CONTRATO</h2>
                            <p>Este contrato (el "Acuerdo") se suscribe entre usted y ReyRey sports ("REYREY SPORTS"), inscrita en el Registro Mercantil y Societario de venezuela con el número B136664 y con RIF número j22375408. Puede ponerse en contacto con ReyRey sports en:</p>
                            <ul>
                                <li>
                                    "Dirección: "
                                </li>
                                <li>
                                Contacto: ""LINK de contactanos """
                                </li>

                            </ul>
                            <p>Salvo que se indique de forma expresa, ningún tercero ostenta ningún derecho en virtud del presente Acuerdo.</p>

                        </div>
                        <div >
                            <h2>PROPIEDAD INTELECTUAL Y OTROS DERECHOS</h2>
                            <p>Tenga en cuenta que todo el contenido, incluyendo, entre otros, gráficos, logos, iconos, texto, imágenes, clips de audio, descargas digitales, compilaciones de datos y software publicado por ReyRey sports en o a través de los Servicios es propiedad del Grupo de Rey Rey sports o sus cedentes de licencias. ReyRey sports u otras marcas comerciales registradas y no registradas y las marcas utilizadas en relación con los Servicios son propiedad del Grupo de ReyRey sports y no podrán utilizarse sin disponer del permiso previo.</p>
                            <p>Nosotros le otorgamos una licencia limitada, personal, no exclusiva, no transferible y revocable para acceder y realizar un uso personal y no comercial de los Servicios. Cualquier derecho no expresamente otorgado queda expresamente reservado. Sin limitación de esta reserva de derechos, esta licencia excluye de forma expresa la modificación, distribución, copiado, reproducción, nueva publicación, venta, obtención de cualquier obra derivada, extracción o utilización de partes de los Servicios; un enlace profundo a los Servicios sin contar con nuestro consentimiento expreso por escrito; cualquier trama o técnicas similares de los Servicios; el uso de cualesquiera metaetiquetas u otras etiquetas; o cualquier extracción o depuración de datos. Esta licencia queda automáticamente rescindida si usted incumple este Acuerdo.</p>
                            <p>Se prohíbe expresamente el uso de depuración de datos, robots, rastreadores o cualquier software o herramienta similar de recopilación y extracción de datos para extraer datos de los servicios sin contar con el correspondiente consentimiento previo. </p>
                        </div>
                        <div >
                            <h2>CERTIFICACIONES DE REYREY SPORTS</h2>
                            <p>Nos comprometemos a destinar la competencia y diligencia razonables a la hora de prestarle los Servicios.</p>
                            <p>Luchamos por garantizar que la información sobre nuestros servicios sea exacta y no escatimaremos esfuerzos para corregir los errores y omisiones tan rápidamente como sea viable después de recibir la correspondiente notificación.</p>
                            <p>Aparte, no emitimos ninguna promesa, expresa o implícita, sobre los Servicios, que le serán prestados "tal cual". En concreto, no prometemos nada con respecto a (a) los productos que usted compre en la Tienda; (b) la exactitud de cualquier información facilitada por la Tienda o ReyRey sports a través de los Servicios; o que (c) los Servicios cumplan sus requisitos, estén siempre disponibles o carezcan de errores.</p>
                        </div>
                        <div >
                            <h2>SU CUENTA</h2>
                            <p>Al objeto de utilizar los Servicios, necesita abrir una cuenta con nosotros (su "Cuenta"). <b>Aquí poner link de registro</b> encontrará los detalles sobre cómo abrir y gestionar su Cuenta. Solamente puede tener una Cuenta con ReyRey sports.  Puede encontrar más detalles sobre ReyRey sports ID en nuestra <b> Política de Privacidad..poner link</b> </p>

                            <p>Por favor, asegúrese de que la información que nos proporcione en su Cuenta sea exacta, completa y esté actualizada. Es su responsabilidad..</p>
                            <p>También es responsable de adoptar todas las medidas razonables para salvaguardar la seguridad de su Cuenta, incluyendo la conservación de la confidencialidad de su contraseña..</p>
                            <p>Nos comunicaremos principalmente con usted por correo electrónico. Usted acepta que se comunicará electrónicamente con nosotros. Usted está conforme con recibir cualquier comunicación nuestra electrónicamente y con que todos los acuerdos, notificaciones, publicaciones y demás comunicaciones cursadas entre nosotros electrónicamente satisfagan cualquier requisito legal y que dichas notificaciones consten por escrito. Usted asume la responsabilidad de asegurarnos que pueda recibir correos electrónicos nuestros. Cualquier comunicación nuestra estará sujeta a nuestra<b> Política de Privacidad..poner link</b> </p>
                            <p>Nos reservamos el derecho a suspender o finalizar su Cuenta de inmediato si usted incumple el presente Acuerdo.</p>
                            <p>Usted puede cancelar su Cuenta escribiéndonos a nuestro domicilio social o, de manera alternativa, puede contactarnos:LINK de ayuda  Atendiendo a su solicitud, nosotros cerraremos su cuenta tan pronto como sea razonablemente posible, sujeto al estado de su Cuenta.</p>
                            <p>También nos reservamos el derecho a cancelar Cuentas que hayan permanecido inactivas durante más de doce (12) meses.</p>
                        </div>
                        <div >
                            <h2>PRIVACIDAD</h2>
                            <p>Por favor, revise nuestra "Política de Privacidad" para obtener información sobre cómo utilizamos sus datos personales. Por favor, revise nuestro Aviso sobre cookies para obtener información sobre cómo utilizamos los cookies.</p>
                        </div>
                        <div >
                            <h2>CAMBIOS EN LOS SERVICIOS O DE ESTE ACUERDO</h2>
                            <p>Al objeto de ofrecerle una experiencia y unos servicios óptimos, nuestros servicios son objeto de una constante evolución. Le informaremos con un preaviso razonable de cualquier modificación esencial de nuestros servicios. Dichos cambios no afectarán al uso previo del Servicio. Si usted está descontento con cualquier cambio que introduzcamos, es libre de suspender el uso de los Servicios. </p>
                            <p>Ocasionalmente también tendremos la necesidad de introducir modificaciones en este Acuerdo. Le informaremos con el preaviso razonable de cualquier modificación de este Acuerdo. Dichos cambios no afectarán al uso previo de los Servicios. Si usted está descontento con los cambios que introduzcamos, es libre de poner fin a este Acuerdo.</p>
                        </div>
                        <div >
                            <h2>COMUNICACIONES</h2>
                            <p>Le enviaremos avisos y otras comunicaciones a la dirección de correo electrónico que nos haya proporcionado. También le proporcionaremos de vez en cuando información mediante un aviso en los Servicios. Cualquier comunicación nuestra estará sujeta a nuestra Política de Privacidad .</p>
                            <p>Debe enviarnos todas las notificaciones y otras comunicaciones utilizando los datos de contacto indicados anteriormente.</p>
                            <p>Cualquier notificación que nos envíe a través del formulario de contacto en "LINK de AYUDA y contactanos" se considerará recibida 24 horas después de la hora de envío por el remitente. Cualquier notificación enviada por correo a nosotros o a usted en la dirección que figura en su cuenta se considerará recibida al siguiente día laborable (siendo un día que no sea sábado, domingo o festivo en España, Luxemburgo o su lugar de residencia habitual). Se considerará que ha recibido las notificaciones de los Servicios la siguiente vez que utilice los Servicios y se le presente la notificación.</p>
                        </div>
                        <!-- fin del contenido <div ></div> <h2></h2> <b></b>  <p></p>-->
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
        <script src="../../js/extras/terms.js"></script>
    </body>
</html>
