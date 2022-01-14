@extends('dashboard.layout')

@section('title')
    Price Sheet | Upload Data
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Drag-Drop-File-Input-Upload.css') }}">
@endsection

@section('main')
<div class="container">
{{--    <div class="card" style="width: 100%;">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title text-center">Upload Companies</h5>--}}
{{--            <h6 class="card-subtitle mb-2 text-muted">--}}
{{--                Download Example--}}
{{--                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>--}}
{{--            </h6>--}}
{{--            @if(session()->has('companies'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session()->get('companies') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @error('file')--}}
{{--                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--            <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                {{ csrf_field() }}--}}
{{--                <div class="files color form-group mb-3">--}}
{{--                    <input type="file"  name="file">--}}
{{--                </div>--}}
{{--                <p>--}}
{{--                    <input type="submit" class="btn btn-outline-success" value="Upload">--}}
{{--                </p>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload Companies Data</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('excel_sheets.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file">
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>

    <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload Top Shareholders Data</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('shareholders'))
                <div class="alert alert-success">
                    {{ session()->get('shareholders') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('top_shareholders.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file">
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>


    <div class="card mt-5" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center">Upload Historic Data</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Download Example
                <a href="" class="btn btn-outline-info btn-sm mb-2">Download</a>
            </h6>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('historic_price.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="files color form-group mb-3">
                    <input type="file"  name="file">
                </div>
                <p>
                    <input type="submit" class="btn btn-outline-success" value="Upload">
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
