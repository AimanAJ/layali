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
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> Contact Us
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.contact_us-edit', isset($contactUs->id) ? $contactUs->id : -1) }}"
                        class="mb-1 btn btn-primary"><i class="mdi mdi-playlist-edit"></i> Edit </a>
                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}

            {{-- Email --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Email : </h4>
                    <hr>
                    <p style="color: black"> {!! isset($contactUs->email) ? $contactUs->email : '----------' !!}</p>
                </div>

            </div>

            {{-- Phone --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Phone : </h4>
                    <hr>
                    <p style="color: black">{!! isset($contactUs->phone) ? $contactUs->phone : '----------' !!}</p>
                </div>
            </div>

            {{-- MAP URL --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Map URL : </h4>
                    <hr>
                    <p style="color: black">{!! isset($contactUs->map_url) && $contactUs->map_url ? $contactUs->map_url : '----------' !!}</p>
                </div>
            </div>

            {{-- Address EN --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Address EN: </h4>
                    <hr>
                    <p style="color: black">{!! isset($contactUs->address_en) && $contactUs->address_en ? $contactUs->address_en : '----------' !!}</p>
                </div>
            </div>

            {{-- Address AR --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom" style="background-color: #4c84ff"></div>
                <div class="card-body">
                    <h4>Address AR: </h4>
                    <hr>
                    <p style="color: black">{!! isset($contactUs->address_ar) && $contactUs->address_ar ? $contactUs->address_ar : '----------' !!}</p>
                </div>
            </div>
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
