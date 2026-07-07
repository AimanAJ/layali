@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('resources/dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('resources/dashboard_files/assets/css/sleek.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
            {{-- ============================================== --}}
            {{-- ================== Header ==================== --}}
            {{-- ============================================== --}}

            <h1>Add New Song</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.songs-index') }}">
                            <span class="fa fa-th"></span> Songs
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"> Add New Song </li>
                </ol>
            </nav>
            </div>
            <<div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                    </div>

                                    {{-- Form Section --}}
                                    <div class="card-body">
                                        <form id="createForm" action="{{ route('super_admin.songs-store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Song Title EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Title EN: <strong class="text-danger"> *
                                                            @error('title_en')
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
                                                        <input type="text" name="title_en"
                                                            class="form-control @error('title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Song Title EN"
                                                            value="{!! old('title_en') ? old('title_en') : null !!}">
                                                    </div>
                                                </div>

                                                {{--Song Title AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Title AR: <strong class="text-danger"> *
                                                            @error('title_ar')
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
                                                        <input type="text" name="title_ar"
                                                            class="form-control @error('title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Song Title AR"
                                                            value="{!! old('title_ar') ? old('title_ar') : null !!}">
                                                    </div>
                                                </div>

                                                {{--Song URL --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song URL: <strong class="text-danger"> *
                                                            @error('url')
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
                                                        <input type="text" name="url"
                                                            class="form-control @error('url') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Song URL"
                                                            value="{!! old('url') ? old('url') : null !!}">
                                                    </div>
                                                </div>
                                                   
                                                       {{--  Image  --}}
                                                       <div class="col-md-6 mb-3">
                                                        <label class="text-dark font-weight-medium mb-3"
                                                            for="validationServer01">Song Image : <strong
                                                                class="text-danger">* @error('image')
                                                                    {{ $message }}
                                                                @enderror
                                                            </strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                            </div>
                                                            <input type="file" name="image" class="form-control"
                                                                id="validationServer01">
                                                        </div>
                                                    </div>
                                                {{--Song Duration --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Duration: <strong class="text-danger"> *
                                                            @error('duration')
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
                                                        <input type="text" name="duration"
                                                            class="form-control @error('duration') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Song Duration"
                                                            value="{!! old('duration') ? old('duration') : null !!}">
                                                    </div>
                                                </div>
                                                {{-- Status --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Status : <strong class="text-danger"> *
                                                            @error('status')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="status"
                                                            class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror"
                                                            id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Select Status...</option>
                                                            <option value="1" @if (old('status') == 1) selected @endif @if(old('status') == null) selected @endif>Active </option>
                                                            <option value="2" @if (old('status') == 2) selected @endif> Inactive </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                   
                                                {{-- Button --}}
                                                <div class="col-md-12 mb-3">
                                                    <button class="mdi btn btn-primary" type="submit"><span class="mdi mdi-plus"></span>Add</button>
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
</div>
@endsection
