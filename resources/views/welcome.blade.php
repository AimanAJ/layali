@extends('layouts.app')
@section('content')
    {{-- =========================================================== --}}
    {{-- ================== Sweet Alert Section ==================== --}}
    {{-- =========================================================== --}}
    <div>
        @if (session()->has('success'))
            <script>
                swal("Great Job !!!", "{!! Session::get('success') !!}", "success", {
                    button: "OK",
                });
            </script>
        @endif
        @if (session()->has('danger'))
            <script>
                swal("oops !!!", "{!! Session::get('danger') !!}", "error", {
                    button: "Close",
                });
            </script>
        @endif
    </div>

    {{-- =========================================================== --}}
    {{-- ======================= gsap overlay ====================== --}}
    {{-- =========================================================== --}}
    <div class="overlay">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3">
            <div class="image">
                <img src="{{ asset('style_files/frontend/img/logoT.png') }}" class="img-fluid first" alt="img">
                <img src="{{ asset('style_files/frontend/img/logoText.png') }}" class="img-fluid second" alt="img">
            </div>
        </div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
    </div>

    {{-- =========================================================== --}}
    {{-- ========================= Page Body ======================= --}}
    {{-- =========================================================== --}}
    <div class="page_content">
       
        {{-- ============================================================================ --}}
        {{-- ============================== Slider Section ============================== --}}
        {{-- ============================================================================ --}}
        <section class="hero vh-100">
            @if (isset($homeLayout))
                <div class="leftImage">
                    <img src="{{ asset('style_files/frontend/img/sector1.png') }}" class="img-fluid" alt="img">
                </div>
                <div class="container">
                    <div class="row">

                        {{-- Slider Header --}}
                        <div class="col-12">
                            <div class="header">
                                <h2>{!! isset($homeLayout->home_title_en) && $homeLayout->home_title_ar ? $homeLayout->home_title_en : 'Munich for Telecom Services Delivers Sustainable Smart City Solutions' !!}</h2>
                            </div>
                        </div>

                        {{-- Slider Body --}}
                        <div class="col-12 myBg">
                            <ul class="links">
                                <li>
                                    <a href="#">{!! isset($homeLayout->home_slider_text2_en) && $homeLayout->home_slider_text2_ar ? $homeLayout->home_slider_text2_en : 'Tracking' !!}</a>
                                </li>
                                <li>
                                    <a href="#">{!! isset($homeLayout->home_slider_text1_en) && $homeLayout->home_slider_text1_ar ? $homeLayout->home_slider_text1_en : 'Intelligent System' !!}</a>
                                </li>
                                <li>
                                    <a href="#">{!! isset($homeLayout->home_slider_text3_en) && $homeLayout->home_slider_text3_ar ? $homeLayout->home_slider_text3_en : 'Suitable Method' !!}</a>
                                </li>
                            </ul>
                            <div class="wave"></div>
                        </div>

                        {{-- Slider Footer --}}
                        <div class="col-12">
                            <div class="downloadBtns">
                                <p>Our Mobile Application provides passengers with a wide range of user-friendly solutions: from smart route planning to a variety of payment options.</p>
                                <ul class="downloadLis">
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('style_files/frontend/img/google-play.png') }}" class="img-fluid" alt="img">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('style_files/frontend/img/google-play.png') }}" class="img-fluid" alt="img">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="leftImage">
                    <img src="{{ asset('style_files/frontend/img/sector1.png') }}" class="img-fluid" alt="img">
                </div>
                <div class="container">
                    <div class="row">
                        
                        {{-- Slider Header --}}
                        <div class="col-12">
                            <div class="header">
                                <h2>Munich® for Telecom Services <br> Delivers Sustainable Smart City Solutions</h2>
                            </div>
                        </div>

                        {{-- Slider Body --}}
                        <div class="col-12 myBg">
                            <ul class="links">
                                <li>
                                    <a href="#">Intelligent System</a>
                                </li>
                                <li>
                                    <a href="#">Tracking</a>
                                </li>
                                <li>
                                    <a href="#">Suitable Method</a>
                                </li>
                            </ul>
                            <div class="wave"></div>
                        </div>

                        {{-- Slider Footer --}}
                        <div class="col-12">
                            <div class="downloadBtns">
                                <p>Our Mobile Application provides passengers with a wide range of user-friendly solutions: from
                                    smart route planning to a variety of payment options.
                                </p>
                                <ul class="downloadLis">
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('style_files/frontend/img/google-play.png') }}" class="img-fluid"
                                                alt="img">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('style_files/frontend/img/google-play.png') }}" class="img-fluid"
                                                alt="img">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        </section>


        {{-- ============================================================================ --}}
        {{-- ================================ About Section ============================= --}}
        {{-- ============================================================================ --}}
        <section class="aboutSection" id="my_section">
            <div class="container">
                @if(isset($about))
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aboutSectionText">
                                {{-- Title --}}
                                <h2 data-aos="fade-right" data-aos-delay="300">{!! isset($about->about_us_title_en) && $about->about_us_title_ar ? $about->about_us_title_en : 'About Us' !!}</h2>
                                
                                {{-- Description --}}
                                <p data-aos="fade-right" data-aos-delay="500">{!! isset($about->about_us_description_en) && $about->about_us_description_ar ? $about->about_us_description_en : 'Established in 2008 as part of Abu Khader Group, Munich for telecom services delivers sustainable smart city solutions that are in-line with the best practices in world cities today.' !!}</p>
                                
                                {{-- Description Sub --}}
                                <p data-aos="fade-right" data-aos-delay="600">{!! isset($about->about_us_description_sub_en) && $about->about_us_description_sub_ar ? $about->about_us_description_sub_en : 'Our longstanding years in the “Intelligent Transportation System” and the deep understanding we have gained for the industry’s specific requirements & challenges enabled us to cover all operational cycles inside a completely incorporated ITS framework designing and executing state of the art solutions for our clients.' !!}</p>

                                {{-- Image --}}
                                @if (isset($about->about_us_image) && $about->about_us_image && file_exists($about->about_us_image))
                                    <img src="{{ asset($about->about_us_image) }}" class="img-fluid" alt="img">
                                @else
                                    <img src="{{ asset('style_files/frontend/img/Munich.png') }}" class="img-fluid" alt="img">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 rightText" data-aos="fade-up">
                            <img src="{{ asset('style_files/frontend/img/arrowB.png') }}" class="img-fluid" alt="img">
                            <p>Intelligent Transportation System</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aboutSectionText">
                                {{-- Title --}}
                                <h2 data-aos="fade-right" data-aos-delay="300">Intelligent Transportation System</h2>
                                
                                {{-- Description --}}
                                <p data-aos="fade-right" data-aos-delay="500">Established in 2008 as part of Abu Khader Group, Munich for telecom services delivers sustainable smart city solutions that are in-line with the best practices in world cities today.</p>
                                
                                {{-- Description Sub --}}
                                <p data-aos="fade-right" data-aos-delay="600">Established in 2008 as part of Abu Khader Group, Munich for telecom services delivers sustainable smart city solutions that are in-line with the best practices in world cities today.</p>
                                    
                                {{-- Image --}}
                                <img src="{{ asset('style_files/frontend/img/Munich.png') }}" class="img-fluid" alt="img">
                            </div>
                        </div>

                        <div class="col-md-6 rightText" data-aos="fade-up">
                            <img src="{{ asset('style_files/frontend/img/arrowB.png') }}" class="img-fluid" alt="img">
                            <p>Intelligent Transportation System</p>
                        </div>
                    </div>
                @endif
            </div>
            
            {{-- Background Image --}}
            <div class="floatingImage">
                <img src="{{ asset('style_files/frontend/img/space.png') }}" class="img-fluid" alt="img">
            </div>
        </section>
    </div>
@endsection
