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
                    <h1>Edit Movie</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.movies-index') }}">
                                    <i class="fas fa-users-cog"></i> Movies
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Movie</li>
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
                                        <form id="createForm" action="{{ route('super_admin.movies-update', isset($movie->id) ? $movie->id : -1) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Movie Title EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Movie Title EN: <strong
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
                                                            id="validationServer01" placeholder="Movie Title EN"
                                                            value="{!! isset($movie->title_en) ? $movie->title_en : null !!}">
                                                    </div>
                                                </div>

                                                {{-- Movie Title AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Movie Title AR: <strong
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
                                                            id="validationServer01" placeholder="Movie Title AR"
                                                            value="{!! isset($movie->title_ar) ? $movie->title_ar : null !!}">
                                                    </div>
                                                </div>
                                                   {{-- Movie URL --}}
                                                   <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Movie URL: <strong
                                                            class="text-danger">
                                                            *
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
                                                            id="validationServer01" placeholder="Movie URL"
                                                            value="{!! isset($movie->url) ? $movie->url : null !!}">
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
                                                            {!! isset($movie->description_en) ? $movie->description_en : null !!}
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
                                                            {!! isset($movie->description_ar) ? $movie->description_ar : null !!}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                {{--  Image --}}
                                                <div class="col-md-6 mb-3">
                                                    <label  class="text-dark font-weight-medium mb-3" for="validationServer01"> Image<strong class="text-danger">
                                                        * @error('image')
                                                            {{ $message }}
                                                        @enderror
                                                    </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="image" class="form-control" id="validationServer01" placeholder="image">
                                                    </div>

                                                    @if (isset($movie->image) && $movie->getRawOriginal('image') && file_exists($movie->getRawOriginal('image')))
                                                        <img src="{{ asset($movie->image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @endif

                                                  
                                                </div>
                                                  
                                                {{-- Playlist --}}
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="playlist_id" class="text-dark font-weight-medium mb-3">Playlist Name  <strong class="text-danger">
                                                            * @error('playlist_id')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text mdi mdi-account-check"></span>
                                                            </div>
                                                        <select name="playlist_id" id="playlist_id"
                                                            class="categories_id custom-select" data-live-search="true"
                                                            data-width="88%" data-actions-box="true" style="width: 100%">
                                                            <option value="" selected>Choose Playlist ...</option>
                                                            @if (isset($public_playlists) && $public_playlists->count() > 0)
                                                                @foreach ($public_playlists as $public_playlist)
                                                                    <option value="{{ $public_playlist->id }}"
                                                                        @if ($movie->playlist_id != null) @if ($movie->playlist_id == $public_playlist->id) selected @endif
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
                                                </div>
                                                 {{-- Movie Duration --}}
                                                 <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Movie Duration: <strong
                                                            class="text-danger">
                                                            *
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
                                                            id="validationServer01" placeholder="Movie Duration"
                                                            value="{!! isset($movie->duration) ? $movie->duration : null !!}">
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
                                                            <option value="1" @if (isset($movie->status) && $movie->status == 'Active') selected @endif>Active</option>
                                                            <option value="2" @if (isset($movie->status) && $movie->status == 'Inactive') selected @endif>Inactive</option>
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
