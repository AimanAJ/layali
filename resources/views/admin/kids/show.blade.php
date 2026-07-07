@extends('admin.layouts.app')

{{-- @section('admin_css')
    <link href="{{ asset('resources/dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('resources/dashboard_files/assets/css/sleek.min.css') }}">
@endsection --}}

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
            <h1><i class="mdi mdi-information"></i> Kids Program Information</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <i class="mdi mdi-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.kids-index') }}">
                            <i class="mdi mdi-format-list-bulleted"></i> All Kids Programs
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"><i class="mdi mdi-information"></i> Kids Program Information
                    </li>
                </ol>
            </nav>
        </div>
        <div>








        </div>
    </div>

    <div class="bg-white border rounded">
        <div class="row no-gutters">
            <div class="col-lg-12 col-xl-12">
                <div class="profile-content-right py-5">
                    {{-- ================================================================================================= --}}
                    {{-- ================================ Tabs Titles (Headers) Section ================================== --}}
                    {{-- ================================================================================================= --}}
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        {{-- Tab 1 --}}
                        <li class="nav-item">
                            <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true"><i class="mdi mdi-information"></i> Main Info</a>
                        </li>
                    </ul>

                    {{-- ================================================================================================= --}}
                    {{-- ================================= Tabs Details (Bodies) Section ================================= --}}
                    {{-- ================================================================================================= --}}
                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                        {{-- ============================================================================== --}}
                        {{-- ================================= Tab 1 Body ================================= --}}
                        {{-- ============================================================================== --}}
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel"
                            aria-labelledby="timeline-tab">
                            {{-- ============================================== --}}
                            {{-- ============= All Error Messages ============= --}}
                            {{-- ============================================== --}}
                            <div class="mt-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <h3>Please correct the following errors : </h3>
                                        <hr>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>- {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            {{-- ============================================== --}}
                            {{-- ============== Main Information ============== --}}
                            {{-- ============================================== --}}
                            <div class="media mt-3 profile-timeline-media">
                                <div class="media-body">
                                    <h3 class="py-3 text-dark"><i class="mdi mdi-information"></i> Main Information :</h3>
                                    <table id="hoverable-data-table" class="table table-hover table-striped">
                                        <thead>
                                            {{-- kid Titles --}}
                                            <tr>
                                                <th>Kids Program Title EN : <span style="color:blue;">{{ isset($kid->title_en) ? $kid->title_en : '------' }}</span></th>
                                                <th>Kids Program Title AR : <span style="color:blue;">{{ isset($kid->title_ar) ? $kid->title_ar: '------' }}</span></th>
                                            </tr>

                                               {{-- Description --}}
                                               <tr>
                                                <th>Description EN: <span style="color:blue;">{!! isset($kid->description_en) ? $kid->description_en : '------' !!}</span></th>
                                                <th>Description AR: <span style="color:blue;">{!! isset($kid->description_ar) ? $kid->description_ar : '------' !!}</span></th>
                                             

                                            </tr>
                                            
                                            {{-- Image & Playlist --}}
                                       
                                            <tr>
                                      
                                                <th>Kids Program Image: <span style="color:blue;">@if (isset($kid->image) && $kid->getRawOriginal('image') && file_exists($kid->getRawOriginal('image')))
                                                    <img src="{{ asset($kid->image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                @else
                                                    <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                @endif</span>
                                            </th>
                                                <th>Playlist: 
                                                    <span style="color:blue;">{!! isset($kid->playlist_id)  ?$kid->playlist->title_en : '------' !!}</span>
                                                    </th>
                                             

                                            </tr>

                                            {{-- Duration & Status --}}
                                            <tr>
                                                <th>Kids Duration: <span style="color:blue;">{!! isset($kid->duration) ? $kid->duration : '------' !!}</span></th>
                                                <th>Status: <span style="color:blue;">{!! isset($kid->status) ? $kid->status : '------' !!}</span></th>
                                             

                                            </tr>
                                            {{-- URL --}}
                                            <tr>
                                                <th>Kids url: <span style="color:blue;">{!! isset($kid->url) ? $kid->url : '------' !!}</span></th>
                                             

                                            </tr>

                                            {{-- Addition Time/Date --}}
                                            <tr>
                                                <th><i class="mdi mdi-clock-outline mdi-spin"></i> Addition Time : <span style="color:blue;">{!! (isset($kid->created_at) ?  date('h:i A', strtotime($kid->created_at)) : '<span style="color:blue;">----------</span>') !!}</span></th>
                                                <th><i class="mdi mdi-clock-outline mdi-spin"></i> Addition Date : <span style="color:blue;">{!! (isset($kid->created_at) ?  date('Y / F (m) / d', strtotime($kid->created_at)) : '<span style="color:blue;">----------</span>') !!}</span></th>
                                            </tr>
                                            <tr>
                                                
                                            
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin_javascript')
    <script src="{{ asset('style_files/backend/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
@endsection
