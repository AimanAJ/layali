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

            <h1>Add New PLaylist</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.playlist-index') }}">
                            <span class="fa fa-th"></span> PLaylists
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"> Add New Playlist </li>
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
                                        <form id="createForm" action="{{ route('super_admin.playlist-store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Playlist Name EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Playlist Name EN: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Playlist Title EN"
                                                            value="{!! old('title_en') ? old('title_en') : null !!}">
                                                    </div>
                                                </div>

                                                {{--Playlist Name AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Playlist Name AR: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Playlist Name AR"
                                                            value="{!! old('title_ar') ? old('title_ar') : null !!}">
                                                    </div>
                                                </div>
                                                {{--Record Order --}}
                                                
                                                <input type="hidden" name="record_order" class="form-control">
                                                   
                                                {{-- Desciption EN --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Description EN: <strong
                                                            class="text-danger"> *
                                                            @error('description_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="description_en" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">
                                                            {{ old('description_en') ? old('description_en') : null }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                {{-- Desciption AR --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Description AR: <strong
                                                            class="text-danger"> *
                                                            @error('description_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="description_ar" maxlength="1600" class="form-control ckeditor"
                                                            rows="20">
                                                            {{ old('description_ar') ? old('description_ar') : null }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                    {{--  Image  --}}
                                                    <div class="col-md-6 mb-3">
                                                        <label class="text-dark font-weight-medium mb-3"
                                                            for="validationServer01">Playlist Image : <strong
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
                                                    {{-- Playlist Type --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Playlist Type : <strong class="text-danger"> *
                                                            @error('playlist_type')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="playlist_type"
                                                            class="custom-select my-1 mr-sm-2 @error('playlist_type') is-invalid @enderror"
                                                            id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Select Playlist Type...</option>
                                                            <option value="1" @if (old('status') == 1) selected @endif @if(old('status') == null) selected @endif>Movies </option>
                                                            <option value="2" @if (old('status') == 2) selected @endif> Series </option>
                                                            <option value="3" @if (old('status') == 3) selected @endif> Programs </option>
                                                            <option value="4" @if (old('status') == 4) selected @endif> Kids </option>

                                                        </select>
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
                                                     {{-- categorys --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="text-dark font-weight-medium mb-3"
                                            for="validationServer01">Category : <strong class="text-danger"> *
                                                @error('categories_id')
                                                    {{ $message }}
                                                @enderror
                                            </strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text mdi mdi-account-check"></span>
                                            </div>
                                            <select name="categories_id[]" class="selectpicker"
                                                data-live-search="true" data-width="88%" multiple
                                                data-actions-box="true" style="width: 100%" multiple>
                                                @if (isset($categories) && $categories->count() > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (is_array(old('categories_id')) && in_array($category->id, old('categories_id'))) selected @endif>
                                                            {{ isset($category->name_en) ? $category->name_en : '------' }}(
                                                            {{ isset($category->name_ar) ? $category->name_ar: '------' }})
                                                        </option>
                                                    @endforeach
                                                @endif
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
