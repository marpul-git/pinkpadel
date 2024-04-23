<!-- Page Content Wrap -->
<div class="page_content_wrap page_paddings_no">
    <!-- Content  Welcome-->
    @include('frontend.layouts.welcome')
    <!-- /Content -->
    <!-- Content Matchs-->
    @include('frontend.layouts.match')
    <!-- /Content -->
    <!-- Content Latest photos-->
    @include('frontend.layouts.latest_photo')
    <!-- /Content -->



    <div class="content">
        <div class="post_item post_item_single page type-page">
            <section class="post_content">
                <!-- Advertisement section -->
                {{-- @include('frontend.layouts.advert') --}}
                <!-- /Advertisement section -->
                <!-- Featured products -->
                {{-- @include('frontend.layouts.products') --}}
                <!-- /Featured products -->
                <!-- Club coaches section -->
                @include('frontend.layouts.coaches')
                <!-- /Club coaches section -->
                <!-- Testimonials section -->
                @include('frontend.layouts.testimonial')
                <!-- /Testimonials section -->
                <!-- Club membership -->
                {{-- @include('frontend.layouts.membership') --}}
                <!-- /Club membership -->
                <!-- Google Map -->
                <div class="sc_section">
                    <div class="sc_section_inner">
                        <div id="sc_googlemap_1_wrap" class="sc_googlemap_wrap">
                            <div id="sc_googlemap_1" class="sc_googlemap width_100_per height_590" data-zoom="10"
                                data-style="custom">
                                <div id="sc_googlemap_1_1" class="sc_googlemap_marker" data-title="Sevilla"
                                    data-description="&lt;p&gt;&lt;strong&gt;Sevilla, España&lt;/strong&gt;&lt;br /&gt;Código Postal 41927&lt;/p&gt;"
                                    data-latlng="37.388630, -5.982170" data-point="images/marker.png">
                                </div>

                            </div>
                            <div class="sc_googlemap_content">
                                <div id="sc_form_1_wrap" class="sc_form_wrap">
                                    <div id="sc_form_1" class=" sc_form_style_form_1">
                                        <h2 class="sc_form_title sc_item_title">Contactar</h2>

                                        <div class="sc_form_descr sc_item_descr">Rellene el formulario
                                            y nos pondremos en contacto contigo.
                                        </div>
                                        <form id="sc_form_1_form" method="post" action="{{ route('contact') }}"
                                            novalidate>
                                            @csrf
                                            <div class="sc_form_info">
                                                <div class="sc_form_item sc_form_field label_over mt-4">
                                                    <label class="required" for="sc_form_username"></label>
                                                    <input id="sc_form_username" type="text" name="username"
                                                        placeholder="Nombre">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over mt-4">
                                                    <label class="required" for="sc_form_email"></label>
                                                    <input id="sc_form_email" type="text" name="email"
                                                        placeholder="E-mail ">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over mt-4 ">
                                                    <label class="required" for="sc_form_subj"></label>
                                                    <input id="sc_form_subj" type="text" name="subject"
                                                        placeholder="Asunto">
                                                </div>
                                            </div>
                                            <div class="sc_form_item sc_form_message label_over mt-4 ">
                                                <label class="required" for="sc_form_message"></label>
                                                <textarea id="sc_form_message" name="message" placeholder="Escribe aquí tu consulta..."></textarea>
                                            </div>
                                            <div class="mt-3">
                                            <div class="sc_form_item sc_form_button mt-5  text-lg text-center">
                                                <button class="rounded px-2 mt-3" type="submit">Enviar mensaje</button>
                                            </div>
                                        </div>
                                            <div class="result sc_infobox"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Google Map -->
            </section>
        </div>
    </div>
</div>
<!-- /Page Content Wrap -->