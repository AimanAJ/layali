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
                    <h1>Edit Song</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.songs-index') }}">
                                    <i class="fas fa-users-cog"></i> Songs
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Song</li>
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
                                        <form id="createForm" action="{{ route('super_admin.songs-update', isset($song->id) ? $song->id : -1) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- Song Title EN --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Title EN: <strong
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
                                                            id="validationServer01" placeholder="Song Title EN"
                                                            value="{!! isset($song->title_en) ? $song->title_en : null !!}">
                                                    </div>
                                                </div>

                                                {{-- song Title AR --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Title AR: <strong
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
                                                            id="validationServer01" placeholder="Song Title AR"
                                                            value="{!! isset($song->title_ar) ? $song->title_ar : null !!}">
                                                    </div>
                                                </div>
                                                   {{-- song URL --}}
                                                   <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">song URL: <strong
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
                                                            id="validationServer01" placeholder="Song URL"
                                                            value="{!! isset($song->url) ? $song->url : null !!}">
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

                                                    @if (isset($song->image) && $song->getRawOriginal('image') && file_exists($song->getRawOriginal('image')))
                                                        <img src="{{ asset($song->image) }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('images_default/default.png') }}" width="100" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                    @endif

                                                  
                                                </div>
                                              
                                                 {{-- Song Duration --}}
                                                 <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Song Duration: <strong
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
                                                            id="validationServer01" placeholder="Song Duration"
                                                            value="{!! isset($song->duration) ? $song->duration : null !!}">
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
                                                            <option value="1" @if (isset($song->status) && $song->status == 'Active') selected @endif>Active</option>
                                                            <option value="2" @if (isset($song->status) && $song->status == 'Inactive') selected @endif>Inactive</option>
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
