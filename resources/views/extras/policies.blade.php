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
                <div class="common-policy contenido">
                    <!-- Heading Content -->
                    <div class="heading-content">
                        <div class="space left"></div>
                        <div class="center">
                            <div class="content-center">Políticas de Privacidad</div>
                        </div>
                        <div class="space right"></div>
                    </div>
                    
                    <!-- Body Content (Start) -->
                    <div class="body-content">
                        <div >
                            <h2>DESCRIPCIÓN</h2>

                            <p><b>Fecha de entrada en vigor: 3 de mayo de 2023</b></p>
                            <p>Estas políticas de privacidad describen cómo <span>ReyRey Sports</span> recopila y procesa datos personales sobre Usted ("Usuario" o "Usted"), cómo usam y protege los mismos, y sus derechos en relación con ellos cuando utiliza el sitio web <a href="{{ route('welcome') }}">ReyRey Sports</a> y cualquier servicio relacionado.
                            </p>
                            <p>El servicio es un programa de fidelización gratificante que le permite comprar artículos y prendas entre usted y la tienda afiliada que figura en el servicio. Esta política de privacidad se aplica a todos los datos personales que <span>ReyRey Sports</span> recopila o procesa sobre usted. Los datos personales son cualquier información sobre usted, así como una combinación de información que pueda permitir razonablemente que usted o su hogar sean identificados.</p>
                        </div>
                        <div >
                            <h2>DATOS RECOPILADOS</h2>

                            <p><span>ReyRey Sports</span> recopila y almacena ciertos datos como resultado de sus interacciones con nuestro servicio, los cuales son:</p>

                            <ul>
                                <li>Nombre Completo</li>
                                <li>Su ID de inicio de sesión y contraseña</li>
                                <li>Dirección de correo electrónico</li>
                                <li>Información sobre sus datos de interacción, comunicación y conectividad</li>
                                <li>La dirección de protocolo de Internet (IP) utilizada para conectar su computadora o dispositivo móvil a Internet</li>
                                <li>Su computadora o dispositivo móvil e información de conexión, como el tipo y versión de su navegador, su sistema operativo y plataforma</li>
                                <li>El flujo de clics completo de los Localizadores Uniformes de Recursos (URL) hacia, a través, y desde el servicio correspondiente (Incluida la fecha y la hora)</li>
                                <li>Parámetros UTM de la campañia</li>
                                <li>Información sobre su actividad en Internet u otras redes electrónicas, como información sobre su comportamiento de navegación en línea, preferencias e historial de compras. Parte de esta información, <span>ReyRey Sports</span> la recopila automáticamente de usted, por ejemplo, los datos recogidos mediante cookies y otras tecnologías de identificación de dispositivos</li>
                                <li>La segmentación de su usuario para personalizar su experiencia (En boletines y ofertas en el sitio web)</li>
                                <li>Si utiliza la funcionalidad de nuestra barra de herramientas, su UUID de miembro (En una cookie)</li>
                            </ul>

                            <p>Puede encontrar más información sobre el uso de cookies y tecnologías de seguimiento de <span>ReyRey Sports</span> en la sección de Política de Cookies.</p>
                            <p>Es su responsabilidad actualizar y mantener información de contacto precisa en su cuenta de <span>ReyRey Sports</span>. Puede realizar cambios visitando el módulo de <a href="{{ route('profile.edit') }}">Edición de Perfil</a> su cuenta e introduciendo las correcciones necesarias.</p>
                            <p>Tenga en cuenta que <span>ReyRey Sports</span> puede estar obligado, por ley, a recopilar determinados datos personales sobre usted, o como consecuencia de cualquier relación contractual que se tenga con usted. El hecho de no proporcionar esta información puede impedir o retrasar el cumplimiento de estas obligaciones. Por lo que, <span>ReyRey Sports</span> le informará, en el momento de la recogida de sus datos, de la obligatoriedad de determinados datos y de las consecuencias de no facilitarlos.</p>
                        </div>
                        <div >
                            <h2>UTILIZACIÓN DE SUS DATOS</h2>

                            <p><span>ReyRey Sports</span> recopila y almacena estos datos como resultado de sus interacciones con nuestros servicios para los siguientes fines:</p>
                            <p><b>Identificación y Autenticación: </b> Se utilizan sus identificadores para verificar su identidad cuando accede a su cuenta de <span>ReyRey Sports ID</span> y para garantizar la seguridad de sus datos personales. El ID de <span>ReyRey Sports</span> también le permite utilizar otros servicios proporcionados por otras empresas del <span>Grupo de ReyRey & CO.</span> (Explicados más adelante).</p>
                            <p><b> Prestación y Mejora del Servicio:</b> Se analiza la información sobre cómo usa el servicio para ofrecer una mejor experiencia a todos los usuarios y mejorar los servicios de <span>ReyRey Sports</span> y para el desarrollo del negocio.</p>
                            <p><b>Personalización de su Experiencia y Recomendaciones:</b> Cuando utiliza el servicio, se pueden utilizar sus datos personales para mejorar su experiencia. Por ejemplo, proporcionando elementos interactivos o personalizados y brindándole recomendaciones basadas en sus intereses.</p>
                            <p><b>Comunicación con Usted:</b> Se pueden usar sus datos personales para que <span>ReyRey Sports</span> se comunique con usted. Por ejemplo, si se le proporciona información sobre cambios en los términos y condiciones o si se pone en contacto con <span>ReyRey Sports</span> para responder alguna pregunta o consulta que usted efectuó.</p>
                            <p><b>Marketing:</b> Se puede utilizar sus datos personales para crear un perfil sobre usted y ubicarlo en determinados segmentos de marketing, con el fin de comprender mejor sus preferencias y personalizar adecuadamente los mensajes de marketing que <span>ReyRey Sports</span> le envié. También, se puede usar sus identificadores para enviarle comunicaciones de marketing sobre el servicio y otros productos o servicios que puedan ser de su interés.</p>
                            <p><b>Ejercicio de Derechos:</b> Se pueden usar sus datos personales para que <span>ReyRey Sports</span> ejerzas sus derechos legales cuando sea necesario. Por ejemplo, para detectar, prevenir y responder a reclamaciones por fraude, reclamaciones por infracción de la propiedad intelectual o violaciones de la ley o de los términos y condiciones.</p>
                            <p><b> Cumplimiento de las Obligaciones:</b> <span>ReyRey Sports</span> puede tratar sus datos personales para cumplir con los requisitos legales o reglamentarios, cuando la ley así lo exija explícitamente, como en respuesta a órdenes judiciales o para cumplir con regulaciones financieras o de privacidad.</p>
                            <p><b>Protección contra Daños:</b> <span>ReyRey Sports</span> debe tener una base legal para procesar sus datos personales. En la mayoría de los casos, <span>ReyRey Sports</span> tendra como base legal una de las siguientes: </p>
                            
                            <ol>
                                <li>Para cumplir con las obligaciones legales de <span>ReyRey Sports</span> y con las obligaciones contractuales con usted. Por ejemplo, para este último caso, para prestar los servicios y para garantizar que el reembolso se otorgue correctamente. No proporcionar esta información puede impedir o retrasar el cumplimiento de estas obligaciones contractuales.</li>
                                <li>Para satisfacer intereses legítimos. Por ejemplo, para comprender cómo utiliza se utilizan productos y servicios de <span>ReyRey Sports</span>, y obtener conocimiento sobre lo anterior, lo que a su vez permite desarrollar nuevos productos y servicios. Cuando <span>ReyRey Sports</span> procesa datos personales para satisfacer intereses legítimos, esete establece sólidas medidas de seguridad para garantizar la protección de su privacidad y asegurar que los intereses legítimos no se vean anulados por sus intereses o derechos y libertades fundamentales.</li>
                                <li>Para obtener su consentimiento para recopilar y utilizar ciertos tipos de datos personales cuando la ley así lo exija. Por ejemplo, en relación con las actividades de marketing directo de <span>ReyRey Sports</span>. Si se le solicita su consentimiento para procesar sus datos personales, puede retirarlo en cualquier momento poniéndose en contacto con <span>ReyRey Sports</span> mediante los medios que se encuentran al final de estas políticas de privacidad.</li>
                            </ol>
                        </div>
                        <div >
                            <h2>TRANSFERENCIAS DE SUS DATOS</h2>

                            <p>Sus datos personales pueden ser transferidos a países que pueden no tener una protección de sus datos equivalente a la de su país de residencia, en particular a los países en los que se encuentran las empresas del <span>Grupo ReyRey & CO.</span>. <span>ReyRey Sports</span> se asegura de que sus derechos y libertades con respecto al tratamiento de sus datos personales estén protegidos de manera adecuada y apropiada, y para cumplir con todos los requisitos legales.</p>
                            <p>Como parte del <span>Grupo de ReyRey & CO.</span>, <span>ReyRey Sports</span> confía en las normas corporativas vinculantes del grupo para legitimar las transferencias internacionales de datos dentro del mismo. Para las transferencias fuera del <span>Grupo de ReyRey & CO.</span>, <span>ReyRey Sports</span> se basa en las cláusulas contractuales estándar.</p>
                        </div>
                        <div >
                            <h2>SUS DERECHOS RELACIONADOS CON RESPECTO A SUS DATOS PERSONALES</h2>

                            <ul>
                                <li>Acceder a sus datos personales</li>
                                <li>Rectificar la información que posee <span>ReyRey Sports</span> sobre usted</li>
                                <li>Borrar sus datos personales</li>
                                <li>Restringir el uso de sus datos personales</li>
                                <li>Oponerse a que <span>ReyRey Sports</span> utilice sus datos personales</li>
                                <li>Recibir sus datos personales en un formato electrónico utilizable y transmitirlos a un tercero (Derecho a la portabilidad de datos)</li>
                                <li>Presentar una queja ante la Autoridad Local de Protección de Datos</li>
                            </ul>
                            <p><span>ReyRey Sports</span> le proporciona un módulo de <a href="{{ route('profile.edit') }}">Edición de Perfil</a> y le anima a que se ponga en contacto para cualquier duda con respecto a sus derechos mediante el siguiente <a href="{{ route('extras.contact') }}">Formulario</a>.</p>
                        </div>
                        <div >
                            <h2>CAMBIOS EN ESTAS POLÍTICAS DE PRIVACIDAD</h2>

                            <p>Ocasionalmente, <span>ReyRey Sports</span> puede modificar estas políticas de privacidad para dar cuenta de los cambios en los servicios y la forma en que <span>ReyRey Sports</span> maneja sus datos. Si se modifican estas políticas de privacidad, <span>ReyRey Sports</span> se lo notificará con una antelación razonable. Los cambios se aplicarán a partir del momento en que éstos se le notifiquen.</p>
                        </div>
                        <div >
                            <h2>SEGURIDAD Y CONSERVACIÓN DE DATOS</h2>

                            <p><span>ReyRey Sports</span> aplica medidas técnicas y organizativas para garantizar un nivel de seguridad adecuado al riesgo de la información personal que se procesa. Estas medidas tienen por objeto garantizar la integridad y confidencialidad permanentes de la información personal. <span>ReyRey Sports</span> evalúa dichas medidas periódicamente para garantizar la seguridad del tratamiento.</p>
                            <p><span>ReyRey Sports</span> conserva sus datos personales durante el tiempo necesario para los fines descritos anteriormente. Sólo se conserva su información personal después de este tiempo.</p>
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
