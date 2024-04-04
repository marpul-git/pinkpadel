@extends('frontend.layouts.master')

@section('content')


<!-- Page Content Wrap -->
<div class="page_content_wrap page_paddings_no">
    
     <!-- Contact form  -->
    <div class="content contact_form_custom_1">
        <div class="sc_content content_wrap margin_top_null margin_bottom_null">
            <h3 class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">Contact Us Today</h3>
            <div id="sc_form_1_wrap" class="sc_form_wrap">
                <div >
                    <form  method="POST" action="{{route('contact')}}" novalidate>
                        @csrf
                        <div >
                            <div>
                                <label for="username">Name</label>
                                <input id="username" type="text" name="username" placeholder="Name *">
                            </div>
                            @error('username')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror
                            <div >
                                <label  for="email">E-mail</label>
                                <input id="email" type="text" name="email" placeholder="E-mail *">
                            </div>
                            @error('email')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                            <div >
                                <label  for="subject">Subject</label>
                                <input id="subject" type="text" name="subject" placeholder="Subject">
                            </div>
                            @error('subject')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                        </div>
                        <div >
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Message"></textarea>
                        </div>
                        @error('message')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror
                        <div >
                            <button type="submit">Send Message</button>
                        </div>
                        <div ></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact form  -->
   
</div>

@endsection