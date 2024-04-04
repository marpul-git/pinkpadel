@extends('frontend.layouts.master')

@section('content')


<!-- Page Content Wrap -->
<div class="page_content_wrap page_paddings_no">
    
     <!-- Contact form  -->
    <div class="content contact_form_custom_1">
        <div class="sc_content content_wrap margin_top_null margin_bottom_null">
            <h3 class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">Contact Us Today</h3>
            <div id="sc_form_1_wrap" class="sc_form_wrap">
                <div id="sc_form_1" class="sc_form sc_form_style_form_1 aligncenter width_66_per">
                    <form id="sc_form_1_form" data-formtype="form_1" method="POST" action="/frontend/include/sendmail.php">
                        <div class="sc_form_info">
                            <div class="sc_form_item sc_form_field label_over">
                                <label class="required" for="sc_form_username">Name</label>
                                <input id="sc_form_username" type="text" name="username" placeholder="Name *">
                            </div>
                            <div class="sc_form_item sc_form_field label_over">
                                <label class="required" for="sc_form_email">E-mail</label>
                                <input id="sc_form_email" type="text" name="email" placeholder="E-mail *">
                            </div>
                            <div class="sc_form_item sc_form_field label_over">
                                <label class="required" for="sc_form_subj">Subject</label>
                                <input id="sc_form_subj" type="text" name="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="sc_form_item sc_form_message label_over">
                            <label class="required" for="sc_form_message">Message</label>
                            <textarea id="sc_form_message" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="sc_form_item sc_form_button">
                            <button>Send Message</button>
                        </div>
                        <div class="result sc_infobox"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact form  -->
   
</div>

@endsection