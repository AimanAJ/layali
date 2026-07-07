@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{-- ============================================== --}}
            {{-- ================== Header ==================== --}}
            {{-- ============================================== --}}
            <div class="breadcrumb-wrapper breadcrumb-layouts">
                <div class="col-md-12">
                    <h1>Edit Home Layout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.home_layouts-index') }}">
                                    <i class="fas fa-users-cog"></i> List Home Layout
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>




                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.home_layouts-update', $layout->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">

                                                {{-- ============================================================================================================== --}}
                                                {{-- ====================================================Slider =============================================== --}}
                                                {{-- ============================================================================================================== --}}
                                                {{-- ============================================================================================================== --}}


                                                {{-- Slider Title AR --}}
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        Home Title AR: <strong class="text-danger"> *
                                                            @error('home_title_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input type="home_title_ar" name="home_title_ar" step="0.01"
                                                            class="form-control @error('home_title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Plan Amount"
                                                            value="{!! $layout->home_title_ar ? $layout->home_title_ar : null !!}">
                                                    </div>
                                                </div>
                                                {{-- Slider Title EN --}}
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        Home Title EN : <strong class="text-danger"> *
                                                            @error('home_title_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input type="home_title_en" name="home_title_en" step="0.01"
                                                            class="form-control @error('home_title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Plan Amount"
                                                            value="{!! $layout->home_title_en ? $layout->home_title_en : null !!}">
                                                    </div>
                                                </div>


                                                {{-- Slider Text One EN --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text One EN: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text1_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text1_en" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text1_en ? $layout->home_slider_text1_en : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Text One AR --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text One AR: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text1_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text1_ar" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text1_ar ? $layout->home_slider_text1_ar : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Text Two EN --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text One EN: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text2_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text2_en" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text2_en ? $layout->home_slider_text2_en : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Text Two AR --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text One AR: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text2_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text2_ar" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text2_ar ? $layout->home_slider_text2_ar : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Text Three EN --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text Three EN: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text3_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text3_en" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text3_en ? $layout->home_slider_text3_en : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Text Three AR --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Slider Text Three AR: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('home_slider_text3_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="home_slider_text3_ar" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">{{ $layout->home_slider_text3_ar ? $layout->home_slider_text3_ar : null }}</textarea>

                                                    </div>
                                                </div>

                                                {{-- Slider Image --}}
                                                <div class="col-md-6">
                                                    <h3 class="mb-3" for="validationServer01">Slider Image :</h3>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="home_slide_image" class="form-control"
                                                            id="validationServer01" placeholder="slider_image">
                                                    </div>

                                                    @if (isset($about->home_slide_image) && $about->getRawOriginal('home_slide_image') && file_exists($about->getRawOriginal('home_slide_image')))
                                                        <img src="{{ asset($about->home_slide_image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('front_end_style/images/default.png') }}"
                                                            width="100" height="100"
                                                            style="border-radius: 10px; border:solid 1px black;">
                                                    @endif


                                                    @error('home_slide_image')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                
                                                



                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Updates</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
