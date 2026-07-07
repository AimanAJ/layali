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
                    <h1><i class="mdi mdi-account-multiple"></i> All Sliders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}"> <i class="mdi  mdi-home"></i> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><i class="mdi  mdi-account-multiple"></i> All
                                Sliders</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.slider-create') }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-playlist-plus"></i> Add New </a>
                    <a href="{{ route('super_admin.slider-showSoftDelete') }}" class=" mb-1 btn btn-danger"><i
                            class=" mdi mdi-delete"></i> Archive </a>
                </div>
            </div>

            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}
            <div class="card card-default">
                <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                    {{-- <h2 style="color:white;"><i class="mdi mdi-star mdi-spin"></i> طلبات سحب الرصيد : </h2> --}}
                </div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="mdi mdi-account"></i> Name Ar</th>
                                <th><i class="mdi mdi-account"></i> Name EN</th>
                         
                                <th><i class="mdi mdi-account-switch"></i> Status</th>
                                <th><i class="mdi mdi-settings mdi-spin"></i> Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Super Admin --}}
                            @if (isset($slides))
                                @if ($slides->count() > 0)
                                    @foreach ($slides as $index => $slide)
                                        <tr>
                                            <td>{!! isset($slide->id) ? $slide->id : "<span style='color:red;'>Undefined</span>" !!}</td>
                                            <td>{!! isset($slide->name_ar) ? $slide->name_ar : "<span style='color:red;'>Undefined</span>" !!}</td>
                                            <td>{!! isset($slide->name_en) ? $slide->name_en : "<span style='color:red;'>Undefined</span>" !!}</td>

                                            <td>
                                                @if (isset($slide->status))
                                                    @if ($slide->status == 'Active')
                                                        <span
                                                            style="color: green;">{{ isset($slide->status) ? $slide->status : "<span style='color:red;'>Undefined</span>" }}</span>
                                                    @else
                                                        <span
                                                            style="color: red;">{{ isset($slide->status) ? $slide->status : "<span style='color:red;'>Undefined</span>" }}</span>
                                                    @endif
                                                @else
                                                    <span style='color:red;'>Undefined</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('super_admin.slider-show', [$slide->id]) }}" title="Show" class="mb-1 btn btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                <a href="{{ route('super_admin.slider-edit', [$slide->id]) }}" title="Edit"
                                                    class="mb-1 btn btn-sm btn-primary"><i
                                                        class="mdi mdi-playlist-edit"></i></a>
                                                <a href="{{ route('super_admin.slider-activeInactiveSingle', [$slide->id]) }}"
                                                    title="Active / Inactive" class="process mb-1 btn btn-sm btn-warning"><i
                                                        class="mdi mdi-stop"></i></a>
                                                <a href="{{ route('super_admin.slider-softDelete', [$slide->id]) }}"
                                                    title="Archive" class="confirm mb-1 btn btn-sm btn-danger"><i
                                                        class="mdi mdi-close"></i></a>
                                                {{-- <a href="{{ route('super_admin.slider-destroy', [$slide->id]) }}"
                                                    title="Permanently Delete" class="confirm mb-1 btn btn-sm btn-danger"><i
                                                        class="mdi mdi-delete"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                        </tbody>
                    </table>
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
                    [20, 30, 50, 75, "All"]
                ],
                "pageLength": 20,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
            });
        });
    </script>
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
@endsection
