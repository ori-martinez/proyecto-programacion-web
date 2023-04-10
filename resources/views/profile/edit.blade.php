<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/Favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/profile/edit.css">
        <link rel="stylesheet" href="./css/styles.css" />

        <title>ReyRey Sports</title>
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

                    <!-- Separators -->
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    
                    @if (Route::has('login'))
                        <!-- Actions Buttons -->
                        <li id="navbar-buttons">
                            @auth
                                <a href="{{ url('/dashboard') }}">
                                    <button class="navbar-button-icon">
                                        @if (Auth::user()->rol_id === 1)
                                            <span class="icon-dashboard"></span>
                                        @else            
                                            <span class="icon-shopping-cart"></span>
                                        @endif
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
            <!-- Update Info Profile -->
            <section id="update-profile">
                <div class="header-section">
                    <h2> INFORMACIÓN DEL PERFIL</h2>

                    <p>Actualiza tu información personal y correo electrónico</p>
                </div>

                <!-- Error Message -->
                <div id="div-error-profile">
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

                <form id="update-profile-form" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div id="div-update-profile-form">
                        <x-text-input id="input-name" name="name" type="text" :value="old('name', $user->name)" placeholder="Nombre" />
                        <x-text-input id="input-lastname" name="last_name" type="text" :value="old('last_name', $user->last_name)" placeholder="Apellido" />
                        <x-text-input id="input-address" name="address" type="text" :value="old('address', $user->address)" placeholder="Dirección" />
                        <x-text-input id="input-email" name="email" type="text" :value="old('email', $user->email)" placeholder="Correo Electrónico" />
                    </div>
                    
                    <x-primary-button id="update-profile-button">{{ __('Actualizar') }}</x-primary-button>
                </form>

                <!-- Success Message -->
                <div id="div-success-profile">
                    @if (session('status') === 'profile-updated')
                        <span class="success-message">
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                                {{ __('Datos Actualizados con Éxito') }}
                            </p>
                        </span>
                    @endif
                </div>
            </section>

            <!-- Update Password Profile -->
            <section id="update-password">
                <div class="header-section">
                    <h2>GESTIÓN DE CONTRASEÑA</h2>

                    <p>Actualiza tu contraseña para una mayor seguridad</p>
                </div>

                <!-- Error Message -->
                <div id="div-error-password">
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                <form id="update-password-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    
                    <div id="div-update-password-form">
                        <x-text-input id="input-current-password" name="current_password" type="password" placeholder="Contraseña Actual" />
                        
                        <div class="password">
                            <x-text-input id="input-password" name="password" type="password"  placeholder="Nueva Contraseña" />

                            <button type="button" id="toggle-password">
                                <span class="icon-eye"></span>
                            </button>
                        </div>
                        <div class="password">
                            <x-text-input id="input-password-confirmation" name="password_confirmation" type="password" placeholder="Confirmación"  />
                            
                            <button type="button" id="toggle-password-confirmation">
                                <span class="icon-eye"></span>
                            </button>
                        </div>
                    </div>

                    <x-primary-button id="update-password-button">{{ __('Actualizar') }}</x-primary-button>
                </form>

                <!-- Success Message -->

                <div id="div-success-password">
                    @if (session('status') === 'password-updated')
                        <span class="success-message">
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                                {{ __('Contraseña Actualizada con Éxito') }}
                            </p>
                        </span>
                    @endif
                </div>
            </section>
        </main>
        <!-- Body (End) -->

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
        <script src="./js/profile/edit.js"></script>
    </body>
</html>
