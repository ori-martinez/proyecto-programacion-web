<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/Favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/login-register.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>Register | ReyRey Sports</title>
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
                            <img src="./img/logo-main-without-bg.svg" alt="Logo de ReyRey Sports">
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
                        <a href="#">AYUDA</a>
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
                                        <span class="icon-shopping-cart"></span>
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
                        <img id="open" src="./img/menu-open-icon.svg" alt="Menú">
                    </li>
                </ul>                   
            </nav>
        </header>
        <!-- Header (End) -->

        <!-- Body (Start) -->
        <main>
            <div class="div-form">
                <!-- Error Message -->
                <div id="div-error">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            @if ($error === "The email has already been taken.")
                                <p class="error-message">El correo electrónico ya esta registrado</p>
                            @else
                                <p class="error-message">{{ $error }}</p>
                            @endif
                        @endforeach
                    @endif
                </div>
                
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <!-- Login Form -->
                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="rol_id" value=2>

                    <input id="input-name" type="text" name="name" placeholder="Nombre">
                    <input id="input-lastname" type="text" name="last_name" placeholder="Apellido">
                    
                    <input id="input-birthdate" type="date" name="birthdate">

                    <select id="input-gender" name="gender">
                        <option value="0">Género...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                    
                    <input id="input-address" type="text" name="address" placeholder="Dirección">
                    <input id="input-email" type="text" name="email" placeholder="Correo Electrónico">

                    <div class="password">
                        <input id="input-password" type="password" name="password" placeholder="Contraseña">

                        <button type="button" id="toggle-password">
                            <span class="icon-eye"></span>
                        </button>
                    </div>
                    <div class="password">
                        <input id="input-password-confirmation" type="password" name="password" placeholder="Confirmación">

                        <button type="button" id="toggle-password-confirmation">
                            <span class="icon-eye"></span>
                        </button>
                    </div>
                    
                    <button id="form-button">Register</button>

                    <p id="text">¿Ya tienes cuenta? <a href="{{ route('login') }}">Logueate</a> </p>
                </form>
            </div>   
        </main>

        <!-- Footer (Start) -->
        <footer>
            <!-- Social Media -->
            <div id="footer-social-media">
                <a class="footer-social-media-icon" href="https://www.facebook.com/" target="_blank">
                    <span class="icon-facebook2"></span>
                </a>
                <a class="footer-social-media-icon" href="https://www.instagram.com/" target="_blank">
                    <span class="icon-instagram"></span>
                </a>
                <a class="footer-social-media-icon" href="https://twitter.com/?lang=es" target="_blank">
                    <span class="icon-twitter"></span>
                </a>
            </div>

            <div id="footer-texts">
                <!-- Links -->
                <ul id="footer-links">
                    <li class="footer-link">
                        <a href="#">Términos de Uso</a>
                    </li>
                    <li class="footer-link">
                        <a href="#">Políticas de Privacidad</a>
                    </li>
                    <li class="footer-link">
                        <a href="#">Contáctanos</a>
                    </li>
                </ul>

                <p id="footer-copyright">Copyright &#169; 2023, ReyRey Sports</p>
            </div>

            <!-- Logo -->
            <img id="footer-logo" src="./img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="./js/register.js"></script>
    </body>
</html>