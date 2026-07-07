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

            <h1>Add New Series</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.series-index') }}">
                            <span class="fa fa-th"></span> Series
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"> Add New Series </li>
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
                                        <form id="createForm" action="{{ route('super_admin.series-store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Series Title EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Series Title EN: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Series Title EN"
                                                            value="{!! old('title_en') ? old('title_en') : null !!}">
                                                    </div>
                                                </div>

                                                {{--Series Title AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Series Title AR: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Series Title AR"
                                                            value="{!! old('title_ar') ? old('title_ar') : null !!}">
                                                    </div>
                                                </div>

                                                {{--Series URL --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Series URL: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Series URL"
                                                            value="{!! old('url') ? old('url') : null !!}">
                                                    </div>
                                                </div>
                                                   
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
                                                            for="validationServer01">Series Image : <strong
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
                                                    {{-- Playlist --}}
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label class="text-dark font-weight-medium mb-3" for="playlist_id">Playlist</label>
                                                            <select name="playlist_id" id="playlist_id"
                                                                class="playlist_id custom-select" data-live-search="true"
                                                                data-width="88%" data-actions-box="true" style="width: 100%">
                                                                <option value="" selected>Choose Playlist ...</option>
                                                                @if (isset($public_playlists) && $public_playlists->count() > 0)
                                                                    @foreach ($public_playlists as $public_playlist)
                                                                        <option value="{{ $public_playlist->id }}"
                                                                            @if (old('playlist_id') != null) @if (old('playlist_id') == $public_playlist->id) selected @endif
                                                                        @else
                                                                            @if ($public_playlist->playlist_id == $public_playlist->id) selected @endif
                                                                            @endif>
                                                                             {{ isset($public_playlist->title_en) ? $public_playlist->title_en : '------' }}
    
    
                                                                            
    
    
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                {{--Series Duration --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Series Duration: <strong class="text-danger"> *
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
                                                            id="validationServer01" placeholder="Series Duration"
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
