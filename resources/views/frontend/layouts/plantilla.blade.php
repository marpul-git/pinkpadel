<div class="content_wrap">
    <!-- Content -->
    <div class="content">
        <div class="post_item post_item_single page">
            <div class="post_content">
                <div class="sc_content content_wrap padding_top_17_imp padding_bottom_3_imp">
                    <div class="sc_services_wrap">
                        <div class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_huge margin_bottom_large">
                            <div class="sc_columns columns_wrap">
                                <div class="column-1_3 column_padding_bottom">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    
                                        <form method="POST" action="{{ route('check_date') }}" novalidate>
                                            @csrf
                                            <x-date-input value="{{now()->format('Y-m-d')}}" >
                                                {{ __('') }}
                                            </x-date-input>
                                            @error('date_input')
                                            <span class="text-danger text-red-600">{{ $message }}</span>
                                        @enderror
                                            
                                            <x-primary-button class="w-full mt-4 justify-center" style="background-color: #6c397d">
                                                {{ __('Ver disponibilidad') }}
                                            </x-primary-button>
                                        </form>
                                    </div>
                            
                                </div>
                                
                                <div class="column-1_3 column_padding_bottom">
                                    <div class="sc_services_item sc_services_item_2 even">
                                        <span class="sc_icon icon-map-2"></span>
                                        <div class="sc_services_item_content">
                                            <div class="sc_services_item_description">
                                                <p>
                                                    +1(800)123-4567
                                                    <br /> +1(800)123-4566
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
</div>