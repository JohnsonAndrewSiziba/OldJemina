@extends('dashboard.layout')

@section('title')
    Listings
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Drag-Drop-File-Input-Upload.css') }}">
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h1 class="text-center">Update Logo</h1>

        @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ route('company_logo.store', $company->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="files color form-group mb-3">
                <input type="file"  name="image" required accept="image/*">
            </div>
            <p>
                <input type="submit" class="btn btn-outline-success" value="Upload">
            </p>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/Table-With-Search.js') }}"></script>
@endsection
