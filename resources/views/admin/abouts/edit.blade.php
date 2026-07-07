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
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div class="col-md-12">
                    <h1>Edit About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.abouts-index') }}">
                                    <i class="fas fa-users-cog"></i> About Us
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
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;"></div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.abouts-update', isset($about->id) ? $about->id : '-1') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">

                                                {{-- About Us Title EN --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3" for="validationServer01">
                                                        About Us Title EN :
                                                        <strong class="text-danger"> * @error('about_us_title_en') - {{ $message }} @enderror </strong>
                                                    </label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="about_us_title_en" class="form-control @error('about_us_title_en') is-invalid @enderror" id="validationServer01" placeholder="About Us Title EN" value="{{ $about->about_us_title_en ? $about->about_us_title_en : null }}">
                                                    </div>
                                                </div>

                                                {{-- About Us Title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3" for="validationServer01">
                                                        About Us Title AR :
                                                        <strong class="text-danger"> * @error('about_us_title_ar') - {{ $message }} @enderror </strong>
                                                    </label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="about_us_title_ar" class="form-control @error('about_us_title_ar') is-invalid @enderror" id="validationServer01" placeholder="About Us Title AR" value="{{ $about->about_us_title_ar ? $about->about_us_title_ar : null }}">
                                                    </div>
                                                </div>

                                                {{-- About Us Description EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        About Us Description EN : <strong class="text-danger"> *
                                                            @error('about_us_description_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="about_us_description_en" maxlength="1600" class="form-control ckeditor" rows="20">{{ isset($about->about_us_description_en) ? $about->about_us_description_en : null }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- About Us Description AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3" for="validationServer01">
                                                        About Us Description AR :
                                                        <strong class="text-danger"> * @error('about_us_description_ar') - {{ $message }} @enderror </strong>
                                                    </label>

                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="about_us_description_ar" maxlength="1600" class="form-control ckeditor" rows="20">{{ isset($about->about_us_description_ar) ? $about->about_us_description_ar : null }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- About Us Sub Description EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        About Us Sub Description EN : <strong class="text-danger"> *
                                                            @error('about_us_description_sub_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="about_us_description_sub_en" maxlength="1600" class="form-control ckeditor" rows="20">{{ isset($about->about_us_description_sub_en) ? $about->about_us_description_sub_en : null }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- About Us Sub Description AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        About Us Sub Description AR : <strong class="text-danger"> *
                                                            @error('about_us_description_sub_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="about_us_description_sub_ar" maxlength="1600" class="form-control ckeditor" rows="20">{{ isset($about->about_us_description_sub_ar) ? $about->about_us_description_sub_ar : null }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- About Us Image Field --}}
                                                <div class="col-md-6 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">About Us Image :</h3>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="about_us_image" class="form-control" id="validationServer01">
                                                    </div>

                                                    @error('about_us_image')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>

                                                {{-- About Us Image Display --}}
                                                <div class="col-md-6 mb-3">
                                                    @if (isset($about->about_us_image) && $about->getRawOriginal('about_us_image') && file_exists($about->getRawOriginal('about_us_image')))
                                                        <img src="{{ asset($about->about_us_image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @endif

                                                    @error('about_us_image')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>   

                                                {{-- Button --}}
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">Save Updates</button>
                                                </div>
                                            </div>
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
