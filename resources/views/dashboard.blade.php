<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>ReyRey Sports</title>
    </head>

    <body>
        <!-- Header (Start) -->
        <header>
            <span class="navbar-toggle">
                <!-- Toggle Button -->
                <button class="toggle-button">
                    <img src="./img/menu-icon.svg" alt="Menú">
                </button>
            </span>

            <!-- Navbar -->
            <nav class="navbar">
                <!-- Logo -->
                <div id="navbar-logo">
                    <a href="{{ route('welcome') }}">
                        <img src="./img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
                    </a>
                </div>
                <div id="navbar-space"></div>

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

        <!-- Body (Start) -->
        <main>
            <!-- Greeting -->
            <div class="div-greeting">
                <h3> <span class="greeting"></span>, @if (Auth::user()->rol_id === 1) Admin @endif {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
            </div>

            <!-- Dashboard -->
            <div class="dashboard">
                @if (Auth::user()->rol_id === 1)
                    <div class="heading-dashboard">
                        <h2>PRODUCTOS</h2>
                        
                        <button class="heading-button">Nuevo</button>
                    </div>
                    
                    <!-- Admin Table -->
                    <div class="table-dashboard">
                        @if ($products !== null)
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Categoría</th>
                                        <th>Deporte</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <b>{{ $product->id }}</b>
                                            </td>
                                            <td class="name-cell">{{ $product->name }}</td>
                                            <td>{{ $product->price }}$</td>
                                            <td>
                                                @if ($product->category_id === 1)
                                                    Hombres
                                                @elseif ($product->category_id === 2)
                                                    Mujeres
                                                @else
                                                    Artículos
                                                @endif 
                                            </td>
                                            <td>
                                                @if ($product->sport_id === 1)
                                                    Todos
                                                @elseif ($product->sport_id === 2)
                                                    Fútbol
                                                @elseif ($product->sport_id === 3)
                                                    Básquetbol
                                                @else
                                                    Béisbol
                                                @endif
                                            </td>
                                            <td>
                                                <button>
                                                    <span class="icon-edit"></span>
                                                </button>
                                                <button>
                                                    <span class="icon-delete"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>
                        @else
                            <p class="table-message">No hay productos, sé el primero en agregar uno a la tienda</p>
                        @endif
                    </div>
                @else
                    <div class="heading-dashboard">
                        <h2>CARRITO DE COMPRAS</h2>
                    </div>


                @endif
            </div>
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
            <img id="footer-logo" src="./img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="./js/dashboard.js"></script>
    </body>
</html>
