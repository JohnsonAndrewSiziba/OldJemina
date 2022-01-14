@extends('dashboard.layout')

@section('title')
    Listings
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
        <h1 class="text-center">Library</h1>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/Table-With-Search.js') }}"></script>
@endsection
