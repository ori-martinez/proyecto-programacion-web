<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/policies-terms.css">
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
                        <a href="{{ route('blog.blog') }}">BLOG</a>
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
                <div class="common-policy content">
                    <!-- Heading Content -->
                    <div class="heading-content">
                        <div class="space left"></div>
                        <div class="center">
                            <div class="content-center">Términos y Condiciones</div>
                        </div>
                        <div class="space right"></div>
                    </div>

                    <!-- Body Content (Start) -->
                    <div class="body-content">
                        <div>
                            <h2>TÉRMINOS DEL SERVICIO DE USUARIO</h2>

                            <p><b>Fecha de entrada en vigor: 3 de mayo de 2023</b></p>
                            <p>Por favor, lea lo siguiente detenidamente. Los términos siguientes forman un contrato vinculante entre usuarios de este servicio (“Usuario” o “Usted”) y <span>ReyRey Sports</span>, que rige el uso de los servicios de este último. Se empezará a prestarle servicios de inmediato contra su aceptación del presente acuerdo. Usted de forma expresa certifica y pacta que no podrá retirarse de este acuerdo de un modo distinto al especificado a continuación una vez se hayan iniciado los servicios.</p>
                        </div>

                        <div>
                            <h2>CON QUIÉN TIENE EL CONTRATO</h2>

                            <p>Este contrato, el acuerdo, se suscribe entre usted y <span>ReyRey Sports</span>, inscrita en el Registro Mercantil y Societario de Venezuela con el número B136664 y con RIF número J-22375408-5. Puede ponerse en contacto con <span>ReyRey Sports</span> en:</p>

                            <ul>
                                <li>"DIRECCIÓN"</li>
                                <li>Puede redactar un correo en el módulo de <a href="{{ route('extras.contact') }}">Contacto</a> de <span>ReyRey Sports</span></li>
                            </ul>

                            <p>Salvo que se indique de forma expresa, ningún tercero ostenta ningún derecho en virtud del presente acuerdo.</p>
                        </div>

                        <div>
                            <h2>PROPIEDAD INTELECTUAL Y OTROS DERECHOS</h2>

                            <p>Tenga en cuenta que todo el contenido, incluyendo, entre otros, gráficos, logos, iconos, texto, imágenes, clips de audio, descargas digitales, compilaciones de datos y software publicado por <span>ReyRey Sports</span> en o a través de los servicios es propiedad del <span>Grupo de ReyRey & CO.</span> o sus cedentes de licencias. <span>ReyRey Sports</span> u otras marcas comerciales registradas y no registradas y las marcas utilizadas en relación con los servicios son propiedad del <span>Grupo de ReyRey & CO.</span> y no podrán utilizarse sin disponer del permiso previo.</p>
                            <p><span>ReyRey Sports</span> otorga una licencia limitada, personal, no exclusiva, no transferible y revocable para acceder y realizar un uso personal y no comercial de los servicios. Cualquier derecho no expresamente otorgado queda expresamente reservado. Sin limitación de esta reserva de derechos, esta licencia excluye de forma expresa la modificación, distribución, copiado, reproducción, nueva publicación, venta, obtención de cualquier obra derivada, extracción o utilización de partes de los servicios; un enlace profundo a los wervicios sin contar con el consentimiento expreso por escrito de <span>ReyRey Sports</span>, cualquier trama o técnicas similares de los servicios. El uso de cualesquiera metaetiquetas u otras etiquetas; o cualquier extracción o depuración de datos. Esta licencia queda automáticamente rescindida si usted incumple este acuerdo.</p>
                            <p>Se prohíbe expresamente el uso de depuración de datos, robots, rastreadores, cualquier software o herramienta similar de recopilación y extracción de datos para obtener datos de los servicios sin contar con el correspondiente consentimiento previo.</p>
                        </div>
                        
                        <div>
                            <h2>CERTIFICACIONES DE REYREY SPORTS</h2>

                            <p><span>ReyRey Sports</span> se compromete a destinar la competencia y diligencia razonables a la hora de prestar los servicios.</p>
                            <p><span>ReyRey Sports</span> trabaja para garantizar que la información sobre nuestros servicios sea exacta y no escatima esfuerzos para corregir los errores y omisiones tan rápidamente como sea viable después de recibir la correspondiente notificación.</p>
                            <p>Aparte, <span>ReyRey Sports</span> no emite ninguna promesa, expresa o implícita, sobre los servicios, que le serán prestados tal cual. En concreto, <span>ReyRey Sports</span> no promete nada con respecto a: <b>(a)</b> Los productos que usted compre en la tienda; <b>(b)</b> La exactitud de cualquier información facilitada por la tienda o <span>ReyRey Sports</span> a través de los servicios; o <b>(c)</b> Que los servicios cumplan sus requisitos, estén siempre disponibles o carezcan de errores.</p>
                        </div>

                        <div>
                            <h2>SU CUENTA</h2>

                            <p>Al objeto de utilizar los servicios, necesita abrir una cuenta con <span>ReyRey Sports</span>. En el <a href="{{ route('register') }}">Registro</a> encontrará los detalles sobre cómo abrir y gestionar su cuenta. Solamente puede tener una cuenta con <span>ReyRey Sports</span>. Puede encontrar más detalles sobre <span>ReyRey Sports ID</span> en la página de <a href="{{ route('extras.policies') }}">Políticas de Privacidad</a>. </p>
                            <p>Por favor, asegúrese de que la información que proporcioné en su cuenta sea exacta, completa y esté actualizada. Es su responsabilidad. También, es su responsable de adoptar todas las medidas razonables para salvaguardar la seguridad de su cuenta, incluyendo la conservación de la confidencialidad de su contraseña.</p>
                            <p><span>ReyRey Sports</span> se comunicará principalmente con usted por correo electrónico, lo cual usted acepta que pasará. Usted está conforme con recibir cualquier comunicación electrónicamente y con que todos los acuerdos, notificaciones, publicaciones y demás comunicaciones cursadas entre <span>ReyRey Sports</span> y usted electrónicamente satisfagan cualquier requisito legal y que dichas notificaciones consten por escrito. Usted asume la responsabilidad de asegurar a <span>ReyRey Sports</span> que pueda recibir correos electrónicos. Cualquier comunicación estará sujeta a las <a href="{{ route('extras.policies') }}">Políticas de Privacidad</a>.</p>
                            <p>
                                <span>ReyRey Sports</span> se reserva el derecho a suspender o finalizar su cuenta de inmediato si usted incumple el presente acuerdo. Usted puede cancelar su cuenta en el módulo de <a href="{{ route('profile.edit') }}">Edición de Perfil
                                </a>, habilitado para cualquier cuenta registrada. De requerir asistencia extra, siempre puede redactar un correo en el módulo de <a href="{{ route('extras.contact') }}">Contacto</a> de <span>ReyRey Sports</span>. Igualmente, este último se reserva el derecho de cancelar cuentas que hayan permanecido inactivas durante más de doce (12) meses
                            </p>
                        </div>
                        <div>
                            <h2>PRIVACIDAD</h2>

                            <p>Por favor, revise las <a href="{{ route('extras.policies') }}">Políticas de Privacidad</a> para obtener información sobre cómo son utilizados sus datos personales. Además, por favor, revise también el aviso sobre cookies y como son utilizadas para obtener información.</p>
                        </div>
                        <div>
                            <h2>CAMBIOS EN LOS SERVICIOS O DE ESTE ACUERDO</h2>

                            <p>Al objeto de ofrecerle una experiencia y unos servicios óptimos, los servicios de <span>ReyRey Sports</span> son objeto de una constante evolución. <span>ReyRey Sports</span> le informará con un preaviso razonable de cualquier modificación esencial de los servicios, teniendo que dichos cambios no afectarán al uso previo del servicio. Si usted está descontento con cualquier cambio que <span>ReyRey Sports</span> efectué, es libre de suspender el uso de los servicios.</p>
                            <p>También, ocasionalmente <span>ReyRey Sports</span> se verá en la necesidad de introducir modificaciones en este acuerdo. <span>ReyRey Sports</span> le informará con el preaviso razonable de cualquier modificación de este acuerdo, teniendo que dichos cambios no afectarán al uso previo de los servicios. Si usted está descontento con los cambios que <span>ReyRey Sports</span> efectué, es libre de poner fin a este acuerdo.</p>
                        </div>
                        <div>
                            <h2>COMUNICACIONES</h2>

                            <p><span>ReyRey Sports</span> enviará avisos y otras comunicaciones a la dirección de correo electrónico que haya proporcionado al momento de registrarse. También, se le proporcionará de vez en cuando información mediante un aviso en los servicios. Cualquier comunicación de <span>ReyRey Sports</span> estará sujeta a las <a href="{{ route('extras.policies') }}">Políticas de Privacidad</a>. Así, debe enviar a <span>ReyRey Sports</span> todas las notificaciones y otras comunicaciones utilizando los medios de contacto indicados anteriormente.</p>
                            <p>Cualquier notificación que envíe a través del formulario de <a href="{{ route('extras.contact') }}">Contacto</a> se considerará recibida 24 horas después de la hora de envío por el remitente. Cualquier notificación enviada por correo a <span>ReyRey Sports</span> o a usted en la dirección que figura en su cuenta se considerará recibida al siguiente día laborable (Siendo un día que no sea sábado, domingo o festivo en Venezuela). Se considerará que ha recibido las notificaciones de los servicios la siguiente vez que utilice los servicios y se le presente la notificación.</p>
                        </div>
                    </div>
                    <!-- Body Content (End) -->
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
        <script src="../../js/extras/policies-terms.js"></script>
    </body>
</html>
