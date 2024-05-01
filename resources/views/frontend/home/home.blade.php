@extends('frontend.layouts.master')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <h3
                class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center font_size_3_571em">
                {{ session('success') }}</h3>
        </div>
    @endif
    <!-- Revolution Slider section -->
    @include('frontend.layouts.slider')
    <!-- /Revolution Slider section -->
    <!-- Page Content Wrap -->

  
    <!-- /Page Content Wrap -->
@endsection
