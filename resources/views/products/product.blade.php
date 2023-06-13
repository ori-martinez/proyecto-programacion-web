<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="../img/favicon.ico" />
        <link rel="stylesheet" href="../css/index.css" />
        <link rel="stylesheet" href="../css/products/product.css">
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
            <!-- Product Section -->
            <section id="product-section">
                <div id="div-product-section">
                    <div class="product-img">
                        <img src="../img/{{ $product->img }}" alt="Imagen de {{ $product->name }}">
                    </div>
                    
                    <div class="product-info">
                        <h2>{{ $product->name }}</h2>

                        <!-- Grid Info -->
                        <div class="grid-info">
                            <p>
                                <span>Deporte:</span> 
                                
                                @if ($product->sport_id === 2) Fútbol 
                                @elseif ($product->sport_id === 3) Básquetbol 
                                @elseif ($product->sport_id === 4) Béisbol 
                                @else Fútbol / Básquetbol / Béisbol 
                                @endif 
                            </p>
                            <p>
                                <span>Precio:</span> {{ $product->price }} $
                            </p>
                        </div>

                        <!-- Error Message -->
                        <div id="div-error-shop"></div>

                        <!-- Shop Form -->
                        <form id="shop-form" method="POST" action="{{ route('shop') }}">
                            @csrf

                            @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                            
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div id="form-grid">
                                <div class="form-select">
                                    <label for="quantity-input">Cantidad</label>

                                    <input type="number" id="quantity-input" name="quantity" placeholder="Número...">
                                </div>
                                <div class="form-select">
                                    @if ($product->category_id === 3)
                                        <label for="select-size">Tamaño:</label>

                                        <select id="select-size" name="size" disabled>
                                            <option value="U" selected>Único</option>
                                        </select>
                                    @else
                                        <label for="select-size">Talla:</label>
                                    
                                        <select id="select-size" name="size">
                                            @if (str_contains($product->name, 'Zapatos'))
                                                <option value="0">Seleccione...</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                            @else
                                                <option value="0">Seleccione...</option>
                                                <option value="XS">XS</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>                
                                            @endif
                                        </select>  
                                    @endif
                                </div>
                                <div class="form-select">
                                    <label for="select-delivery">Días de Entrega:</label>
                                    
                                    <select id="select-delivery" name="delivery">
                                        <option value="0">Seleccione...</option>
                                        <option value="2">2 días</option>
                                        <option value="5">5 días</option>
                                        <option value="7">7 días</option>
                                    </select>
                                </div>
                            </div>
                            
                            @auth
                                <button id="shop-form-button" type="submit">
                                    Agregar al <span class="icon-shopping-cart"></span>
                                </button>
                            @else
                                <a href="{{ route('login') }}">
                                    <button type="button">
                                        Agregar al <span class="icon-shopping-cart"></span>
                                    </button>
                                </a>
                            @endauth
                        </form>
                    </div>
                </div>
            </section>

            <!-- Commentary Section -->
            <section id="commentaries-section">
                <!-- Error Message -->
                <div id="div-error"></div>

                <form  method="POST" action="{{ route('commentary') }}">
                    @csrf

                    @auth
                        <input id="input-user" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input id="input-product" type="hidden" name="product_id" value="{{ $product->id }}">
                    @endauth
                    
                    <input id="input-commentary" type="text" name="description" placeholder="Escribe un comentario...">
                    
                    @auth
                        <button id="commentary-button" type="submit">Comentar</button>
                    @else
                        <a href="{{ route('login') }}">Comentar</a>
                    @endauth
                </form>

                <!-- Commentaries -->
                <div id="commentaries">
                    <h2> Opiniones de Otros Usuarios</h2>

                    <ul id="commentaries-list">
                        @if ($commentaries === null) 
                            <li class="commentaries-message">Aún no hay comentarios, sé el primero en hacer uno</li>
                        @else
                            @foreach ($commentaries as $commentary)
                                <li>
                                    <span>{{ $commentary->name }} {{ $commentary->last_name }} dice:</span> {{ $commentary->description }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </section>
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
        <script src="../../js/products/product.js"></script>
        <script type="text/javascript">
            <?php
                echo "let price = $product->price"
            ?>
            
            const buttonShop = d.querySelector('#shop-form-button');
            
            const submitShop = (e) => {
                e.preventDefault();

                if (
                    inputQty.value.length === 0 || Number(inputQty.value) <= 0 ||
                    selectSize.value === '0' || selectDelivery === '0'
                ) {
                    errorDivShop.innerHTML = '<span class="error-message">Completa correctamente todos los campos para la compra</span>';
                }
                else {
                    let products = price * Number(inputQty.value);
                    let total = 1;

                    if (selectDelivery.value === '2') total = products + (products * 0.5)
                    else if (selectDelivery.value === '5') total = products + (products * 0.3)
                    else if (selectDelivery.value === '7') total = products + (products * 0.1)
                    
                    if (confirm(`Tome en cuenta que menos días de entrega aumentan el precio. \n Entonces, el total a pagar es ${total}$. Desea realizar la compra?`)) {
                        shopForm.submit();
                        alert('Compra realizada con éxito');
                    }
                }
            }

            buttonShop.addEventListener('click', (e) => submitShop(e), false);
        </script>
    </body>
</html>
