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
                    <h1>Programs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> All Programs
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.programs-create') }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-programs-plus"></i> Add New </a>
                    <a href="{{ route('super_admin.programs-showSoftDelete') }}" class="mb-1 btn btn-danger"><i
                            class="mdi mdi-delete"></i> Archive </a>
                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}
            <div class="card card-default">
                <div class="card-header justify-content-between " style="background-color: #4c84ff;"></div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center">  Title EN </th>
                                <th style="text-align: center">  Title AR </th>
                                <th style="text-align: center">  Playlist </th>
                                <th style="text-align: center"> Status </th>
                                <th style="text-align: center"><i class="mdi mdi-clock-outline mdi-spin"></i> Date/Time</th>
                                <th style="text-align: center"><i class="mdi mdi-settings mdi-spin"></i> Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($programs) && $programs->count() > 0)
                              @foreach ($programs as $program)
                                    <tr>
                                        <td style="text-align: center">{!! isset($program->title_en) ? $program->title_en : "<span style='color:blue;'>----------</span>" !!} </td>
                                        <td style="text-align: center">{!! isset($program->title_ar) ? $program->title_ar : "<span style='color:blue;'>----------</span>" !!} </td>
                                        <td style="text-align: center">{!! isset($program->playlist->title_en) ?$program->playlist->title_en: "<span style='color:red;'>Undefined</span>" !!} </td>
                                        <td style="text-align: center">{!! isset($program->status) ? $program->status : "<span style='color:red;'>Undefined</span>" !!} </td>
                                        <td style="text-align: center">
                                            {!! isset($program->created_at) ? $program->created_at : "<span style='color:red;'>Undefined</span>" !!}
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('super_admin.programs-show', $program->id) }}" class="mb-1 btn btn-sm btn-primary"><i class="mdi mdi-eye"></i></a>
                                            <a href="{{ route('super_admin.programs-edit', $program->id) }}"
                                                class="mb-1 btn btn-sm btn-success"><i
                                                class="mdi mdi-playlist-edit"></i></a>
                                            <a href="{{ route('super_admin.programs-softDelete', [isset($program->id) ? $program->id : '----------']) }}"
                                                class="confirm mb-1 btn btn-sm btn-danger" title="Delete"><i
                                                    class="mdi mdi-delete"></i></a>
                                                    <a href="{{ route('super_admin.programs-activeInactiveSingle', [isset($program->id) ? $program->id : '----------']) }}" class="process mb-1 btn btn-sm btn-warning" title="Active / Inactive"><i class="mdi mdi-stop"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
