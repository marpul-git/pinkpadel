  <!-- Header -->
  <header class="top_panel_wrap top_panel_style_3 scheme_original">
    <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
        
            <!-- User panel -->

            @guest
                
            
            <div class="top_panel_top" >
                <div class="content_wrap clearfix">
                {{--
                    <div class="top_panel_top_contact_area icon-smartphone">+44 (0) 1234 56789</div>
                    <div class="top_panel_top_open_hours icon-mail-2">info@sitename.com</div>
                    --}}
                    <div class="top_panel_top_user_area">
                        <ul id="menu_user" class="menu_user_nav">
                            {{--
                            <li class="top_panel_top_search">
                                <div class="search_wrap search_style_regular search_state_fixed">
                                    <div class="search_form_wrap">
                                        <form role="search" method="get" class="search_form" action="#">
                                            <button type="submit" class="search_submit icon-magnifier" title="Start search"></button>
                                            <input type="text" class="search_field" placeholder="Search" value="" name="s" />
                                        </form>
                                    </div>
                                    <div class="search_results widget_area scheme_original">
                                        <a class="search_results_close icon-cancel"></a>
                                        <div class="search_results_content"></div>
                                    </div>
                                </div>
                            </li>
                            --}}
                            <li class="top_panel_link">
                                <a {{-- href="court-reservation.html" --}} href="{{route('register')}}">INICIA SESIÓN Ó REGÍSTRATE PARA VER HORARIO Y RESERVAR PISTA</a>
                            </li>
                            <li class="menu_user_register">
                                <a {{-- href="#popup_registration" --}} href="{{ route('register') }}" class="popup_link popup_register_link icon-pencil">Regístrate</a>
                                
                            </li>
                            <li class="menu_user_login">
                                <a {{-- href="#popup_login" --}} href="{{ route('login') }}" class="popup_link popup_login_link icon-user">Inicia Sesión</a>
                            </li>
                            
                            
                            {{--
                            <li class="menu_user_cart">
                                <a href="#" class="top_panel_cart_button">
                                    <span class="contact_icon icon-shopping-cart-2"></span>
                                    <span class="contact_label contact_cart_label">cart:</span>
                                    <span class="contact_cart_totals">
                                        <span class="cart_items">2 Items</span>
                                    </span>
                                </a>
                                <ul class="widget_area sidebar_cart sidebar">
                                    <li>
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="hide_cart_widget_if_empty">
                                                <div class="widget_shopping_cart_content">
                                                    <ul class="cart_list product_list_widget ">
                                                        <li class="mini_cart_item">
                                                            <a class="remove" title="Remove this item" href="#">×</a>
                                                            <a href="shop-product-page.html">
                                                                <img class="attachment-shop_thumbnail size-shop_thumbnail" alt="product" src="http://placehold.it/75x75">
                                                                HEAD Instinct Junior 25 Prestrung Tennis Racquet
                                                            </a>
                                                            <span class="quantity">
                                                                1 ×
                                                                <span class="amount">£148.00</span>
                                                            </span>
                                                        </li>
                                                        <li class="mini_cart_item">
                                                            <a class="remove" title="Remove this item" href="#">×</a>
                                                            <a href="shop-product-page.html">
                                                                <img class="attachment-shop_thumbnail size-shop_thumbnail" alt="product" src="http://placehold.it/75x75">
                                                                Penn Championship Extra Tennis Duty Balls
                                                            </a>
                                                            <span class="quantity">
                                                                1 ×
                                                                <span class="amount">£87.00</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <p class="total">
                                                        <strong>Subtotal:</strong>
                                                        <span class="amount">£235.00</span>
                                                    </p>
                                                    <p class="buttons">
                                                        <a class="button wc-forward" href="cart.html">View Cart</a>
                                                        <a class="button checkout wc-forward" href="checkout.html">Checkout</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            --}}
                        </ul>

                    </div>
                </div>
            </div>
            <!-- /User panel -->
            @endguest
        <!-- Top Menu -->
        <div class="top_panel_middle">
            <div class="content_wrap">
                <div class="contact_logo">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('frontend/images/logo_pink.png') }}" class="logo_main"
                                alt="">
                            <img src="{{ asset('frontend/images/logo_pink.png') }}" class="logo_fixed"
                                alt=""></a>
                    </div>
                </div>
                <div class="menu_main_social_wrap">

                    
                    <div class="menu_main_wrap">
                        <a href="#" class="menu_main_responsive_button icon-menu"></a>
                        <nav class="menu_main_nav_area">
                            <ul id="menu_main" class="menu_main_nav">
                                <li
                                    class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                                    <a href="{{route('home')}}">Inicio</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item current-menu-item current_page_item">
                                            <a href="{{route('home')}}" >Inicio </a>
                                        </li>
                                        @can('admin.home')
                                        <li class="menu-item">
                                            <a href="{{route('admin.home')}}">Inicio Administración</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                                <!--
                                <li class="menu-item menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="typography.html">Typography</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="shortcodes.html">Shortcodes</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="page-404.html">404</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="our-team.html">Our Team</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="player-profile.html">Player&#8217;s Profile</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="reservation.html">Reservation</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="events-calendar.html">Tournaments</a>
                                        </li>
                                    </ul>
                                </li>
                            -->
                                @auth
                                                              
                                <li class="menu-item">
                                    <a href="{{route('dashboard')}}">Reserva tu pista</a>
                                </li>
                                @endauth
                                <!--
                                <li class="menu-item">
                                    <a href="tennis-lessons.html">Lessons</a>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="#">News</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="blog-classic.html">Classic</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog-colored-excerpt.html">Colored Excerpt</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog-masonry.html">Masonry</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog-portfolio.html">Portfolio</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="post-formats.html">Post Formats</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="shop.html">Pro Shop</a>
                                </li>
                            -->
                            <!--
                            <li class="menu-item">
                                <a href={{route('academy')}}>E
                                    scuela</a>
                            </li>
                        
                            <li class="menu-item">
                                <a href={{route('installations')}}>Instalaciones</a>
                            </li>
                            -->
                                <li class="menu-item">
                                    <a href={{route('contact')}}>Contactar</a>
                                </li>
                                

                                @auth                           
                                
                                <li class="menu-item menu-item-has-children">
                                    <a href="{{route('profile.edit')}}" class="icon-user">{{ Auth::user()->name }}</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            {{--
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Tu perfil') }}
                                            </x-dropdown-link>
                                            --}}
                                            <a href="{{route('profile.edit')}}" class="icon-user">Tu perfil</a>
                                        </li>
                                        <li class="menu-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                {{--
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Cerrar Sesión') }}
                                                </x-dropdown-link>
                                                --}}
                                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Cerrar Sesión</a>
                                            </form>
                                        </li>
                                        
                                    </ul>
                                </li>

                                @endauth
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Top Menu -->
    </div>
</header>
<!-- /Header -->
<!-- Header Mobile -->
<div class="header_mobile">
    <div class="content_wrap">
        <div class="menu_button icon-menu"></div>
        <div class="logo">
            <a href="index.html">
                <img src="http://placehold.it/290x50" class="logo_main" alt="">
            </a>
        </div>
    </div>
    <div class="side_wrap">
        <div class="close">Close</div>
        <div class="panel_top">
            <nav class="menu_main_nav_area">
                <ul id="menu_main_mobile" class="menu_main_nav">
                    <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                        <a href="#">Home</a>
                        <ul class="sub-menu">
                            <li class="menu-item current-menu-item current_page_item">
                                <a href="index.html">Home 1</a>
                            </li>
                            <li class="menu-item">
                                <a href="homepage-2.html">Home 2</a>
                            </li>
                        </ul>
                    </li>
                    @auth
                                                              
                    <li class="menu-item">
                        <a href="{{route('dashboard')}}">Reserva tu pista</a>
                    </li>
                    @endauth
                    {{--
                    <li class="menu-item menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="typography.html">Typography</a>
                            </li>
                            <li class="menu-item">
                                <a href="shortcodes.html">Shortcodes</a>
                            </li>
                            <li class="menu-item">
                                <a href="page-404.html">404</a>
                            </li>
                            <li class="menu-item">
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="our-team.html">Our Team</a>
                            </li>
                            <li class="menu-item">
                                <a href="player-profile.html">Player&#8217;s Profile</a>
                            </li>
                            <li class="menu-item">
                                <a href="reservation.html">Reservation</a>
                            </li>
                            <li class="menu-item">
                                <a href="events-calendar.html">Tournaments</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu-item">
                        <a href="membership.html">Membership</a>
                    </li>
                    <li class="menu-item">
                        <a href="tennis-lessons.html">Lessons</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="#">News</a>
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="blog-classic.html">Classic</a>
                            </li>
                            <li class="menu-item">
                                <a href="blog-colored-excerpt.html">Colored Excerpt</a>
                            </li>
                            <li class="menu-item">
                                <a href="blog-masonry.html">Masonry</a>
                            </li>
                            <li class="menu-item">
                                <a href="blog-portfolio.html">Portfolio</a>
                            </li>
                            <li class="menu-item">
                                <a href="post-formats.html">Post Formats</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="shop.html">Pro Shop</a>
                    </li>
                    --}}
                    <li class="menu-item">
                        <a href="{{route('contact')}}">Contacts</a>
                    </li>
                </ul>
            </nav>
            {{--
            <div class="search_wrap search_style_regular search_state_fixed">
                <div class="search_form_wrap">
                    <form method="get" class="search_form" action="#">
                        <button type="submit" class="search_submit icon-magnifier"
                            title="Start search"></button>
                        <input type="text" class="search_field" placeholder="Search" value=""
                            name="s" />
                    </form>
                </div>
                <div class="search_results widget_area scheme_original">
                    <a class="search_results_close icon-cancel"></a>
                    <div class="search_results_content"></div>
                </div>
            </div>
            --}}
            <div class="login">
                <a href="{{route('login')}}" class="popup_link popup_login_link">Inicia sesión</a>
            </div>
            <div class="login">
                <a href="{{route('register')}}" class="popup_link popup_login_link">Registrate</a>
            </div>
        </div>
        <div class="panel_bottom">
            <div class="contact_socials">
                <div
                    class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_twitter">
                            <span class="icon-twitter"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_facebook">
                            <span class="icon-facebook"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_gplus">
                            <span class="icon-gplus"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @guest
               
        <div class="top_panel_link">
            <a {{-- href="court-reservation.html" --}} href="{{route('register')}}">INICIA SESIÓN Ó REGÍSTRATE PARA VER HORARIOS Y RESERVAR PISTAS</a>
        </div>
        @endguest
    </div>
    <div class="mask"></div>
</div>
<!-- /Header Mobile -->