@extends('admin.layouts.app')

@section('admin_css')
    {{-- <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}"> --}}
    {{-- <link href="{{ asset('dashboard_files/assets/css/sleek.css') }}"> --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{-- =========================================================== --}}
            {{-- ====================== Sweet Alert ======================== --}}
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
                        swal("Oops !!!", "{!! Session::get('danger') !!}", "error", {
                            button: "Close",
                        });
                    </script>
                @endif
            </div>

            {{-- ============================================== --}}
            {{-- ================== Header ==================== --}}
            {{-- ============================================== --}}
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Home Layout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> Home Layout
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.home_layouts-edit', $layout->id) }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-playlist-edit"></i> Edit </a>
                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}

            {{-- ============================================================================================================== --}}
            {{-- ====================================================Slider=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Slider Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Home Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_title_en) && $layout->home_title_en ? $layout->home_title_en : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Slider Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Home Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_title_ar) && $layout->home_title_ar ? $layout->home_title_ar : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Slider Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->home_slide_image) }}" alt="">
                    </p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text One EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text One EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text1_en) && $layout->home_slider_text1_en
                            ? $layout->home_slider_text1_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text One AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text One AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text1_ar) && $layout->home_slider_text1_ar
                            ? $layout->home_slider_text1_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text Two EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text Two EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text2_en) && $layout->home_slider_text2_en
                            ? $layout->home_slider_text2_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text Two Ar --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text Two AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text2_ar) && $layout->home_slider_text2_ar
                            ? $layout->home_slider_text2_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text Three EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text Three EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text3_en) && $layout->home_slider_text3_en
                            ? $layout->home_slider_text3_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Slider Text Three AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Slider Text Three AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_slider_text3_ar) && $layout->home_slider_text3_ar
                            ? $layout->home_slider_text3_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- ============================================================================================================== --}}
            {{-- ====================================================Service One=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Slider Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Services One Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_one_title_en) && $layout->service_one_title_en
                            ? $layout->service_one_title_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Services One Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Services One Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_one_title_ar) && $layout->service_one_title_ar
                            ? $layout->service_one_title_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>



            {{-- Services One  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Services One Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->service_one_image) }}" alt="">
                    </p>
                    </hr>
                </div>

            </div>


            {{-- Services One Description EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Services One Description EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->slider_description_en) && $layout->slider_description_en
                            ? $layout->slider_description_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Services One Description AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Services One Description AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->slider_description_ar) && $layout->slider_description_ar
                            ? $layout->slider_description_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
             {{--  Service one URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service one url : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_one_url) && $layout->service_one_url ? $layout->service_one_url : '----------' !!}</p>
                </div>

            </div>

            {{-- ============================================================================================================== --}}
            {{-- ====================================================Service two=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Service two Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service two Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_two_title_en) && $layout->service_two_title_en
                            ? $layout->service_two_title_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Service two Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service two Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_two_title_ar) && $layout->service_two_title_ar
                            ? $layout->service_two_title_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service Two  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service Two Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->service_two_image) }}" alt="">
                    </p>
                    </hr>
                </div>

            </div>


            {{-- Service Two Description EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service Two Description EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_two_description_en) && $layout->service_two_description_en
                            ? $layout->service_two_description_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service Two Description AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service Two Description AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_two_description_ar) && $layout->service_two_description_ar
                            ? $layout->service_two_description_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

             {{--  Service two URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service two url : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_two_url) && $layout->service_two_url ? $layout->service_two_url : '----------' !!}</p>
                </div>

            </div>

            {{-- ============================================================================================================== --}}
            {{-- ====================================================Service Three=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Service three Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service three Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_three_title_en) && $layout->service_three_title_en
                            ? $layout->service_three_title_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Service three Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service three Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_three_title_ar) && $layout->service_three_title_ar
                            ? $layout->service_three_title_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service three  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service three Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->service_three_image) }}" alt="">
                    </p>
                    </hr>
                </div>

            </div>


            {{-- Service three Description EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service three Description EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_three_description_en) && $layout->service_three_description_en
                            ? $layout->service_three_description_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service three Description AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service three Description AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_three_description_ar) && $layout->service_three_description_ar
                            ? $layout->service_three_description_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service three URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service three url : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_three_url) && $layout->service_three_url ? $layout->service_three_url : '----------' !!}</p>
                </div>

            </div>

            {{-- ============================================================================================================== --}}
            {{-- ====================================================Service Four=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Service four Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service four Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_four_title_en) && $layout->service_four_title_en
                            ? $layout->service_four_title_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Service four Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service four Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_four_title_ar) && $layout->service_four_title_ar
                            ? $layout->service_four_title_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service four  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service four Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->service_four_image) }}" alt="">
                        </hr>
                </div>

            </div>


            {{-- Service four Description EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service four Description EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_four_description_en) && $layout->service_four_description_en
                            ? $layout->service_four_description_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Service four Description AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Service four Description AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_four_description_ar) && $layout->service_four_description_ar
                            ? $layout->service_four_description_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Service four URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Service four url : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->service_four_url) && $layout->service_four_url ? $layout->service_four_url : '----------' !!}</p>
                </div>

            </div>

            {{-- ============================================================================================================== --}}
            {{-- ====================================================Home About=============================================== --}}
            {{-- ============================================================================================================== --}}
            {{-- ============================================================================================================== --}}

            {{-- Home About Titel EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Home About Title EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_about_title_en) && $layout->home_about_title_en
                            ? $layout->home_about_title_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
            {{-- Home About Titel AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Home About Title AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_about_title_ar) && $layout->home_about_title_ar
                            ? $layout->home_about_title_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Home About URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Home About url : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_about_url) && $layout->home_about_url ? $layout->home_about_url : '----------' !!}</p>
                </div>

            </div>

            {{-- Home About  Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Home About Image : </h4>
                    <hr>
                    <p style="color: black">
                        <img src="{{ asset($layout->home_about_image) }}" alt=""> </hr>
                </div>

            </div>


            {{-- Home About Description EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Home About Description EN : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_about_description_en) && $layout->home_about_description_en
                            ? $layout->home_about_description_en
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>

            {{-- Home About Description AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> Home About Description AR : </h4>
                    <hr>
                    <p style="color: black">
                        {!! isset($layout->home_about_description_ar) && $layout->home_about_description_ar
                            ? $layout->home_about_description_ar
                            : '----------' !!}</p>
                    </hr>
                </div>

            </div>
        @endsection

        @section('admin_javascript')
            <script>
                jQuery(document).ready(function() {
                    jQuery('#hoverable-data-table').DataTable({
                        "aLengthMenu": [
                            [20, 30, 50, 75, -1],
                            [20, 30, 50, 75, "All"],
                        ],
                        "pageLength": 20,
                        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
                        "order": [
                            [3, "desc"]
                        ]
                    });
                });
            </script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/jquery.datatables.min.js') }}"></script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
        @endsection
