<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/blog/blog.css">
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
            <section class="blog-articles">
                <div class="article-img">
                    <img src="{{ url('/img/blog1.jpg') }}" alt="Imagen">
                </div>

                <article>
                    <h2 class="article-title">TIPS PARA EMPEZAR A PRACTICAR UN DEPORTE</h2>

                    <p><span>1.</span> <b>Elige un deporte que te guste:</b> La motivación es clave para mantener una práctica deportiva constante.</p>
                    <p><span>2.</span> <b>Fija un horario:</b> Es importante establecer una rutina de entrenamiento para que se convierta en un hábito.</p>
                    <p><span>3.</span> <b>Empieza poco a poco:</b> No es recomendable empezar con intensidad máxima, ya que puede provocar lesiones.</p>
                    <p><span>4.</span> <b>Busca un instructor o entrenador:</b> Un buen entrenador puede ayudarte a mejorar tu técnica y prevenir lesiones.</p>
                    <p><span>5.</span> <b>No te saltes el calentamiento:</b> Un buen calentamiento previene lesiones y mejora el rendimiento.</p>
                    <p><span>6.</span> <b>Usa el equipamiento adecuado:</b> Utiliza ropa y calzado deportivo adecuado para prevenir lesiones y mejorar el rendimiento.</p>
                    <p><span>7.</span> <b>Combina diferentes tipos de entrenamiento:</b> La variedad en el entrenamiento ayuda a mejorar el rendimiento y evitar el aburrimiento.</p>
                    <p><span>8.</span> <b>Escucha a tu cuerpo:</b> Si sientes dolor o molestias, detente y descansa.</p>
                    <p><span>9.</span> <b>Establece metas realistas:</b> Fijar metas alcanzables ayuda a mantener la motivación.</p>
                    <p><span>10.</span> <b>Diviértete:</b> Disfruta del deporte y no te centres solo en los resultados. La diversión es la clave para mantener una práctica deportiva constante.</p>
                </article>
            </section>
            <section class="blog-articles">
                <div class="article-img">
                    <img src="{{ url('/img/blog2.jpg') }}" alt="Imagen">
                </div>

                <article>
                    <h2 class="article-title">FÚTBOL, UN SENTIMIENTO QUE CONECTA...</h2>

                    <p>El fútbol es un deporte universal que ha capturado el corazón de millones de personas en todo el mundo. Desde su origen en Inglaterra en el siglo XIX, el fútbol se ha expandido a todos los rincones del planeta, convirtiéndose en el deporte más popular y practicado en la actualidad.</p>
                    <p>En la actualidad, el fútbol es más que un simple deporte, es un fenómeno cultural que trasciende las fronteras nacionales y conecta a personas de diferentes culturas, idiomas y religiones. El fútbol es capaz de crear un sentido de comunidad y unión entre personas de todo el mundo, lo que lo convierte en una poderosa herramienta para la construcción de la paz y la inclusión social.</p>
                    <p>Además de su valor cultural y social, el fútbol es también un deporte que exige un alto nivel de habilidad, estrategia y resistencia física. Los jugadores deben ser capaces de combinar velocidad, agilidad y fuerza para superar a sus oponentes y llevar a su equipo a la victoria.</p>
                    <p>En el fútbol moderno, los equipos se enfrentan en competiciones nacionales e internacionales en busca de la gloria y el reconocimiento. Las ligas de fútbol más importantes del mundo, como la Premier League inglesa, La Liga española y la Serie A italiana, atraen a los mejores jugadores y equipos de todo el mundo, lo que convierte cada partido en un espectáculo emocionante y lleno de adrenalina.</p>
                    <p>Además de las ligas nacionales, los equipos también compiten en torneos internacionales como la Copa del Mundo y la Liga de Campeones de la UEFA. Estos torneos reúnen a los mejores equipos y jugadores del mundo en una competencia épica por el título de campeón mundial.</p>
                    <p>En conclusión, el fútbol es mucho más que un deporte. Es una forma de conectar a las personas de todo el mundo, promover la inclusión social y la construcción de la paz, y un espectáculo emocionante que combina habilidad, estrategia y resistencia física. El fútbol es un fenómeno cultural que seguirá siendo una parte importante de la sociedad durante muchos años más.</p>
                </article>
            </section>
            <section class="blog-articles">
                <div class="article-img">
                    <img src="{{ url('/img/blog3.jpg') }}" alt="Imagen">
                </div>

                <article>
                    <h2 class="article-title">EL IMPACTO FEMENINO EN EL DEPORTE</h2>

                    <p>El impacto de las mujeres en el deporte es cada vez más evidente. A lo largo de los años, las mujeres han demostrado ser capaces de competir al más alto nivel en una variedad de disciplinas deportivas. Sin embargo, todavía hay mucho camino por recorrer en términos de igualdad de género en el deporte.</p>
                    <p>Una de las mayores diferencias entre hombres y mujeres en el deporte es la disparidad en la compensación y el patrocinio. Las mujeres a menudo reciben menos dinero y menos oportunidades de patrocinio que los hombres, incluso cuando compiten a un nivel similar. Esto ha llevado a un aumento en la lucha por la igualdad salarial y la visibilidad de las mujeres en el deporte.</p> 
                    <p>A pesar de estos desafíos, las mujeres han alcanzado grandes logros en el deporte. En los Juegos Olímpicos de 2016, las mujeres ganaron más medallas que los hombres por primera vez en la historia de los Juegos. Además, el número de mujeres en deportes tradicionalmente dominados por hombres, como el fútbol americano y el boxeo, ha aumentado significativamente en las últimas décadas.</p>
                    <p>Además de los logros deportivos, las mujeres en el deporte también han sido líderes en la lucha por la igualdad de género y la justicia social. Muchas atletas han utilizado su plataforma para abogar por cuestiones importantes, como la igualdad salarial y la igualdad de oportunidades para las mujeres en el deporte. Esto ha tenido un impacto significativo en la forma en que se percibe a las mujeres en el deporte y ha ayudado a avanzar en la lucha por la igualdad de género en todo el mundo.</p>
                    <p>Entonces, el impacto de las mujeres en el deporte ha sido significativo y seguirá creciendo en el futuro. A medida que se abren más oportunidades para las mujeres en el deporte y se aborda la desigualdad de género, esperamos ver aún más logros y avances en el mundo del deporte.</p>
                </article>
            </section>
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
        <script src="../js/blog/index.js"></script>
    </body>
</html>
