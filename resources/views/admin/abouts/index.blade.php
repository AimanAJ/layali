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
                    <h1>About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> About Us
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.abouts-edit', $about->id) }}" class="mb-1 btn btn-primary"><i class="mdi mdi-playlist-edit"></i> Edit </a>
                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}

            {{-- About Us Title --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                
                {{-- About Us Title EN --}}
                <div class="card-body">
                    <h4>About Us Title EN : </h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_title_en) ? $about->about_us_title_en : '----------' !!}</p>
                </div>
                
                {{-- About Us Title AR --}}
                <div class="card-body">
                    <h4>About Us Title AR : </h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_title_ar) ? $about->about_us_title_ar : '----------' !!}</p>
                </div>
            </div>

            {{-- About Us Description --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>About Us Description EN :</h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_description_en) ? $about->about_us_description_en : '----------' !!}</p>
                </div>
                <div class="card-body">
                    <h4>About Us Description AR :</h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_description_ar) ? $about->about_us_description_ar : '----------' !!}</p>
                </div>
            </div>

            {{-- About Us Sub Description --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>

                {{-- About Us Sub Description EN --}}
                <div class="card-body">
                    <h4>About Us Sub Description EN :</h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_description_sub_en) ? $about->about_us_description_sub_en : '----------' !!}</p>
                </div>

                {{-- About Us Sub Description AR --}}
                <div class="card-body">
                    <h4>About Us Sub Description AR :</h4>
                    <hr>
                    <p style="color: black">{!! isset($about->about_us_description_sub_ar) ? $about->about_us_description_sub_ar : '----------' !!}</p>
                </div>
            </div>

            {{-- About Image --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4> About Us Image : </h4><hr>
                    @if (isset($about->about_us_image) && $about->getRawOriginal('about_us_image') && file_exists($about->getRawOriginal('about_us_image')))
                        <img src="{{ asset($about->about_us_image) }}" alt=""><hr>    
                    @else
                        <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                    @endif
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
