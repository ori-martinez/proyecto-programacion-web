<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="./img/favicon.ico" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/profile/edit.css">
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
                    <a href="/">
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

                <!-- Update Info Form -->
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

                <!-- Update Password Form -->
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

            <!-- Delete Profile -->
            <section  id="delete-profile">
                <div class="header-section">
                    <h2>ELIMINACIÓN DEL PERFIL</h2>

                    <p>Una vez que se elimine su cuenta, todos sus datos se eliminarán de forma permanente</p>
                </div>

                <!-- Delete Button -->
                <button id="open-modal" class="delete-profile-button">Eliminar Perfil</button>

                <div id="delete-modal">
                    <!-- Delete Modal -->
                    <div id="content-delete-modal">
                        <h3>¿ESTÁ SEGURO DE ELIMINAR SU PERFIL?</h3>

                        <p>Una vez que se elimine su cuenta, todos sus datos se eliminarán de forma permanente. Ingrese su contraseña para confirmar que desea eliminar su cuenta de forma permanente</p>

                        <!-- Delete Form -->
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')

                            <div class="password">
                                <x-text-input id="input-password-delete" name="password" type="password"  placeholder="Contraseña" />

                                <button type="button" id="toggle-password-delete">
                                    <span class="icon-eye"></span>
                                </button>
                            </div>

                            <div id="modal-buttons">
                                <button type="button" id="cancel-modal">Cancelar</button>

                                <button type="submit" id="submit-modal" class="delete-profile-button">Eliminar Perfil</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <img id="footer-logo" src="./img/logo-second-without-bg.svg" alt="Logo Simple de ReyRey Sports">
        </footer>
        <!-- Footer (End) -->

        <!-- Scripts -->
        <script src="./js/profile/edit.js"></script>
    </body>
</html>
