<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}" />
    <title>PinkPadel</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic"
        type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontello/css/fontello.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/js/vendor/revslider/css/settings.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce-layout.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce-smallscreen.css') }}" type="text/css"
        media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/wp-cloudy/wpcloudy.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/wp-cloudy/wpcloudy-anim.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/core.animation.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/shortcodes.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/plugin.woocommerce.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/skin.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/js/core.messages/core.messages.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/js/magnific/magnific-popup.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/core.portfolio.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/js/swiper/swiper.min.css') }}" type="text/css" media="all" />

    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    
</head>

<body
    class="home page tennisclub_body body_style_wide body_filled article_style_stretch top_panel_show top_panel_above sidebar_hide">
    <div class="body_wrap">

        <div class="page_wrap">
           <!-- Header --><!-- Header Mobile -->
           
           @include('frontend.layouts.header')
            
            <!-- /Header --><!-- Header Mobile -->


            <!-- Contenido de la section -->
               
            @yield('content')
             <!-- /Contenido de la section -->
           

            <!-- Footer -->
            @include('frontend.layouts.footer')
            
            <!-- /Footer -->


            <!-- Copyright -->
            {{--
            <div class="copyright_wrap copyright_style_menu">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <div class="copyright_text">ThemeREX © 2016 All Rights Reserved
                            <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
            --}}
            <!-- /Copyright -->
        </div>
    </div>
    <!-- Side block with weather plugin -->
   {{-- @include('frontend.layouts.weather') --}}
    <!-- /Side block with weather plugin -->
    
    <!-- Boton principio de página -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

    <script type="text/javascript" src="{{ asset('frontend/js/jquery/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/_packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/global.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/vendor/revslider/jquery.themepunch.tools.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/revslider/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('frontend/js/vendor/revslider/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('frontend/js/vendor/revslider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('frontend/js/vendor/revslider/extensions/revolution.extension.navigation.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/vendor/woocommerce/woocommerce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/woocommerce/cart-fragments.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/core.utils.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/core.init.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/theme.init.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/shortcodes.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/core.messages/core.messages.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/swiper/swiper.min.js') }}"></script>
    <!--
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key="></script>
    
    <script type="text/javascript" src="{{ asset('frontend/js/core.googlemap.min.js') }}"></script>
    
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
          key: "AIzaSyD4K_f-443DFVdA2nVkCc4rCTiptSmNuDQ",
          // Add other bootstrap parameters as needed, using camel case.
          // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
        });
      </script>
      - Google Maps JavaScript API has been loaded directly without loading=async. This can result in suboptimal performance. For best-practice loading patterns please see https://goo.gle/js-api-loading
      - As of February 21st, 2024, google.maps.Marker is deprecated. Please use google.maps.marker.AdvancedMarkerElement instead. At this time, google.maps.Marker is not scheduled to be discontinued, but google.maps.marker.AdvancedMarkerElement is recommended over google.maps.Marker. While google.maps.Marker will continue to receive bug fixes for any major regressions, existing bugs in google.maps.Marker will not be addressed. At least 12 months notice will be given before support is discontinued. Please see https://developers.google.com/maps/deprecations for additional details and https://developers.google.com/maps/documentation/javascript/advanced-markers/migration for the migration guide. js:167:149

    -->
</body>

</html>
