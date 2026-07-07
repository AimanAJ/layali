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
                    <h1>Edit Playlist</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.playlist-index') }}">
                                    <i class="fas fa-users-cog"></i> Playlists
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Playlist</li>
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
                                        <form id="createForm" action="{{ route('super_admin.playlist-update', isset($playlist->id) ? $playlist->id : -1) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Playlist Title EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Playlist Title EN: <strong
                                                            class="text-danger">
                                                            *
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
                                                            value="{!! isset($playlist->title_en) ? $playlist->title_en : null !!}">
                                                    </div>
                                                </div>

                                                {{-- PLaylist Title AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Playlist Title AR: <strong
                                                            class="text-danger">
                                                            *
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
                                                            id="validationServer01" placeholder="Playlist Title AR"
                                                            value="{!! isset($playlist->title_ar) ? $playlist->title_ar : null !!}">
                                                    </div>
                                                </div>
                                                {{-- Description EN --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Description EN: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('description_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="description_en" maxlength="1600" class="form-control ckeditor" rows="20">
                                                            {!! isset($playlist->description_en) ? $playlist->description_en : null !!}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                {{-- Description AR --}}
                                                <div class="col-md-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Description AR: <strong
                                                            class="text-danger">
                                                            *
                                                            @error('description_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <textarea style="width: 90% !important" name="description_ar" maxlength="1600" class="form-control ckeditor" rows="20">
                                                            {!! isset($playlist->description_ar) ? $playlist->description_ar : null !!}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                {{--  Image --}}
                                                <div class="col-md-6 mb-3">
                                                    <h3 class="mb-3" for="validationServer01"> Image :</h3>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="image" class="form-control" id="validationServer01" placeholder="image">
                                                    </div>

                                                    @if (isset($playlist->image) && $playlist->getRawOriginal('image') && file_exists($playlist->getRawOriginal('image')))
                                                        <img src="{{ asset($playlist->image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @endif

                                                    @error('image')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                {{-- Playlist Type --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Playlist Type : <strong class="text-danger">
                                                            * @error('playlist_type')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="playlist_type" class="custom-select my-1 mr-sm-2 @error('playlist_type') is-invalid @enderror" id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Select Playlist Type...</option>
                                                            <option value="1" @if (isset($playlist->playlist_type) && $playlist->playlist_type == 'Movie') selected @endif>Movies</option>
                                                            <option value="2" @if (isset($playlist->playlist_type) && $playlist->playlist_type == 'Series') selected @endif>Series</option>
                                                            <option value="2" @if (isset($playlist->playlist_type) && $playlist->playlist_type == 'Program') selected @endif>Programs</option>
                                                            <option value="2" @if (isset($playlist->playlist_type) && $playlist->playlist_type == 'Kids') selected @endif>Kids</option>
                                                        </select>
                                                    </div>
                                                </div>
                                              
                                                {{-- Status --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Status : <strong class="text-danger">
                                                            * @error('status')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="status" class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror" id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Select Status...</option>
                                                            <option value="1" @if (isset($playlist->status) && $playlist->status == 'Active') selected @endif>Active</option>
                                                            <option value="2" @if (isset($playlist->status) && $playlist->status == 'Inactive') selected @endif>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                 {{-- Ctegory --}}

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
                                                            data-actions-box="true" style="width: 100%">
                                                            @if (isset($public_categories) && $public_categories->count() > 0)
                                                                @foreach ($public_categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        @if (is_array($categoriesArray) && in_array($category->id, $categoriesArray)) selected @endif>
                                                                        {{-- <option value="{{ $category->id }}"  > --}}
                                                                        {{ isset($category->name_en) ? $category->name_en : '------' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- Button --}}
                                            <div class="col-md-12 mb-3">
                                                <button class="btn btn-primary" type="submit">Save Updates</button>
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
