<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/extras/policies.css">
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
                         <div class="contenido-centro">Política de Privacidad</div>
                        </div>
                        <div class="espacio derch"></div>
                    </div >
                    <!-- contenido <div ></div> <h2></h2> <b></b>  <p></p>-->
                    <div class="Cuerpo">
                        <div >
                            <h2>Política de Privacidad</h2>
                            <p>
                                <b>Fecha de entrada en vigor: 3 de mayo de 2023</b>
                            </p>
                            <p>
                            Esta Política de Privacidad describe cómo ReyRey sports ("ReyRey sports", "nosotros", "nuestro", “nos”) recopila y procesa datos personales sobre usted ("usted" o "su"), cómo usamos y protegemos esos datos, y sus derechos en relación con ellos cuando utiliza el sitio web <b>poner link</b> (o su sucesor) y cualquier servicio relacionado (el/los “Servicio(s)”).
                            </p>
                            <p>El Servicio es un programa de fidelización gratificante que le permite comprar artículos y prendas entre usted y la tienda afiliada que figura en el Servicio.
                            </p>
                            <p>Esta Política de Privacidad se aplica a todos los datos personales que recopilamos o procesamos sobre usted. Los datos personales son cualquier información sobre usted, así como una combinación de información que pueda permitir razonablemente que usted o su hogar sean identificados.</p>
                        </div>
                        <div >
                            <h2>Los Datos que Recogemos</h2>
                            <p>Recogemos y almacenamos ciertos datos como resultado de sus interacciones con nuestro Servicio:</p>
                            <ul>
                                <li>
                                    "Nombre;"
                                </li>
                                <li>
                                    "Su ID de inicio de sesión y contraseña;"
                                </li>
                                <li>
                                    "Su dirección de correo electrónico;"
                                </li>
                                <li>
                                    "Información sobre sus datos de interacción, comunicación y conectividad;"
                                </li>
                                <li>

                                    "La dirección de protocolo de Internet (IP) utilizada para conectar su computadora o dispositivo móvil a Internet;"
                                </li>
                                <li>
                                    "Su computadora o dispositivo móvil e información de conexión, como el tipo y versión de su navegador, su sistema operativo y plataforma;"
                                </li>
                                <li>
                                    "El flujo de clics completo de los Localizadores Uniformes de Recursos (URL) hacia, a través, y desde el Servicio correspondiente (incluida la fecha y la hora)"
                                </li>
                                <li>
                                    "Los parámetros UTM de la campañia;"
                                </li>
                                <li>
                                    "Información sobre su actividad en Internet u otras redes electrónicas, como información sobre su comportamiento de navegación en línea, preferencias e historial de compras. Parte de esta información la recopilamos automáticamente de usted, por ejemplo, los datos recogidos mediante cookies y otras tecnologías de identificación de dispositivos ("Cookies y tecnologías de seguimiento");"
                                </li>
                                <li>
                                    "La segmentación de su usuario para personalizar su experiencia (en boletines y ofertas en el sitio web);"
                                </li>
                                <li>
                                    "Si utiliza la funcionalidad de nuestra barra de herramientas, su UUID de miembro (en una cookie);"
                                </li>
                            </ul>
                            <p>Puede encontrar más información sobre nuestro uso de cookies y tecnologías de seguimiento en nuestra Política de Cookies.</p>
                            <p>Es su responsabilidad actualizar y mantener información de contacto precisa en su cuenta de reyRey sports. Puede realizar cambios visitando la página de su cuenta e introduciendo las correcciones necesarias.</p>
                            <p>Tenga en cuenta que podemos estar obligados, por ley, a recopilar determinados datos personales sobre usted, o como consecuencia de cualquier relación contractual que tengamos con usted. El hecho de no proporcionar esta información puede impedir o retrasar el cumplimiento de estas obligaciones. Le informaremos, en el momento de la recogida de sus datos, de la obligatoriedad de determinados datos y de las consecuencias de no facilitarlos.</p>
                            <p></p>
                        </div>
                        <div >
                            <h2>CÓMO UTILIZAMOS SUS DATOS</h2>
                            <p>Recopilamos y almacenamos estos datos como resultado de sus interacciones con nuestros Servicios, para los siguientes fines:</p>
                            <p><b>Identificación y autenticación: </b> utilizamos sus identificadores para verificar su identidad cuando accede a su cuenta de ReyRey sports ID y para garantizar la seguridad de sus datos personales. El ID de ReyRey sports también le permite utilizar otros servicios proporcionados por otras empresas del Grupo ReyRey sports (como se explica más adelante);</p>
                            <p><b> Prestación del Servicio:</b> analizamos la información sobre cómo usa el Servicio para ofrecer una mejor experiencia a todos los usuarios y mejorar los servicios de Rakuten, y para el desarrollo del negocio;</p>
                            <p><b>Mejora del Servicio: </b> analizamos la información sobre cómo usa el Servicio para ofrecer una mejor experiencia a todos los usuarios y mejorar los servicios de Rakuten, y para el desarrollo del negocio;</p>
                            <p><b>Personalización de su experiencia y recomendaciones:</b>  cuando utiliza el Servicio, podemos utilizar sus datos personales para mejorar su experiencia, por ejemplo, proporcionando elementos interactivos o personalizados y brindándole recomendaciones basadas en sus intereses;</p>
                            <p><b>Comunicarnos con usted:</b> podemos usar sus datos personales para comunicarnos con usted, por ejemplo, si le proporcionamos información sobre cambios en los términos y condiciones o si se pone en contacto con nosotros para hacernos preguntas;</p>
                            <p><b>Marketing:</b> podemos utilizar sus datos personales para crear un perfil sobre usted y ubicarlo en determinados segmentos de marketing, con el fin de comprender mejor sus preferencias y personalizar adecuadamente los mensajes de marketing que le enviamos. También podemos usar sus identificadores para enviarle comunicaciones de marketing sobre el Servicio y otros productos o servicios que puedan ser de su interés;</p>
                            <p><b>Ejercicio de nuestros derechos:</b> podemos usar sus datos personales para ejercer nuestros derechos legales cuando sea necesario, por ejemplo, para detectar, prevenir y responder a reclamaciones por fraude, reclamaciones por infracción de la propiedad intelectual o violaciones de la ley o de nuestros términos y condiciones</p>
                            <p><b> Cumplir con nuestras obligaciones:</b> podemos tratar sus datos personales para cumplir con los requisitos legales o reglamentarios, cuando la ley así lo exija explícitamente, como en respuesta a órdenes judiciales o para cumplir con regulaciones financieras o de privacidad;</p>
                            <p><b>Protección contra daños:</b> Debemos tener una base legal para procesar sus datos personales. En la mayoría de los casos, la base legal será una de las siguientes:</p>
                            <p>Debemos tener una base legal para procesar sus datos personales. En la mayoría de los casos, la base legal será una de las siguientes: </p>
                            <ol>
                            <li>Para cumplir con nuestras obligaciones contractuales con usted, por ejemplo, para prestar los Servicios y para garantizar que el reembolso se otorgue correctamente. No proporcionar esta información puede impedir o retrasar el cumplimiento de estas obligaciones contractuales;</li>
                            <li>Para cumplir con nuestras obligaciones legales;</li>
                            <li>Para satisfacer nuestros intereses legítimos, por ejemplo, para comprender cómo utiliza nuestros productos y servicios y permitirnos obtener conocimiento de ello, lo que a su vez nos permite desarrollar nuevos productos y servicios. Cuando procesamos datos personales para satisfacer nuestros intereses legítimos, establecemos sólidas medidas de seguridad para garantizar la protección de su privacidad y asegurar que nuestros intereses legítimos no se vean anulados por sus intereses o derechos y libertades fundamentales.</li>
                            <li>Podemos obtener su consentimiento para recopilar y utilizar ciertos tipos de datos personales cuando la ley así nos lo exija (por ejemplo, en relación con nuestras actividades de marketing directo). Si le solicitamos su consentimiento para procesar sus datos personales, puede retirarlo en cualquier momento poniéndose en contacto con nosotros en los detalles que se encuentran al final de esta Política de Privacidad.</li>
                            </ol>
                        </div>
                        <div >
                            <h2>TRANSFERENCIAS DE SUS DATOS</h2>
                            <p>Sus datos personales pueden ser transferidos a países que pueden no tener una protección de sus datos equivalente a la de su país de residencia, en particular a los países en los que se encuentran las empresas del Grupo ReyRey sports. Nos aseguramos de que sus derechos y libertades con respecto al tratamiento de sus datos personales estén protegidos de manera adecuada y apropiada, y para cumplir con todos los requisitos legales.</p>
                            <p>Como parte del Grupo ReyRey sports, confiamos en las Normas corporativas vinculantes del Grupo ReyRey sports para legitimar las transferencias internacionales de datos dentro del Grupo. Para las transferencias fuera del Grupo ReyRey sports, nos basamos en las Cláusulas contractuales Estándar.</p>
                        </div>
                        <div >
                            <h2>SUS DERECHOS RELACIONADOS CON SUS DATOS PERSONALES</h2>
                            <p></p>
                            <ul>
                                <li>acceder a sus datos personales</li>
                                <li>rectificar la información que tenemos sobre usted</li>
                                <li>borrar sus datos personales</li>
                                <li> restringir el uso de sus datos personales</li>
                                <li>oponerse a que utilicemos sus datos personales</li>
                                <li>recibir sus datos personales en un formato electrónico utilizable y transmitirlos a un tercero (derecho a la portabilidad de datos)</li>
                                <li>presentar una queja ante la Autoridad local de Protección de Datos.</li>
                            </ul>
                            <p>Le animamos a que se ponga en contacto con nosotros para actualizar o corregir su información si ésta cambia o si los datos personales que tenemos sobre usted son inexactos.</p>
                            <p>Puede enviarnos su consulta utilizando el formulario de contacto en <p>poner link</p> </p>
                        </div>
                        <div >
                            <h2>CAMBIOS EN NUESTRA POLÍTICA DE PRIVACIDAD</h2>
                            <p>Ocasionalmente, podemos modificar esta Política de Privacidad para dar cuenta de los cambios en nuestros Servicios y la forma en que manejamos sus datos. Si se modifica esta Política de Privacidad, se lo notificaremos con una antelación razonable. Los cambios se aplicarán a partir del momento en que éstos se le notifiquen.</p>
                        </div>
                        <div >
                            <h2>Fecha de entrada en vigor: 3 de Mayo de 2023</h2>
                            <p>Esta política de privacidad describe cómo en ReyRey Sports ("nosotros", "nuestro", "nos") recogemos y procesamos datos personales sobre usted, cómo utilizamos y protegemos esos datos, y sus derechos en relación con ellos, cuando utiliza el sitio web <b>poner link</b>   (o su sucesor) y cualquier servicio relacionado, (los «servicios»).  </p>
                            <p>Esta Política de Privacidad se aplica a todos los datos personales que recogemos o procesamos sobre usted. Los datos personales son cualquier información sobre usted, así como una combinación de elementos de información que podrían permitir razonablemente su identificación o la de su familia.</p>
                        </div>
                        <div >
                            <h2>SEGURIDAD Y CONSERVACIÓN DE DATOS</h2>
                            <p>Aplicamos medidas técnicas y organizativas para garantizar un nivel de seguridad adecuado al riesgo de la información personal que procesamos.  Estas medidas tienen por objeto garantizar la integridad y confidencialidad permanentes de la información personal. Evaluamos estas medidas periódicamente para garantizar la seguridad del tratamiento.</p>
                            <p>Conservaremos sus datos personales durante el tiempo necesario para los fines descritos anteriormente. Sólo conservaremos su información personal después de este tiempo si estamos obligados a hacerlo para cumplir con las leyes locales aplicables al servicio de <b>poner link</b></p>
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
        <script src="../../js/extras/policies.js"></script>
    </body>
</html>
