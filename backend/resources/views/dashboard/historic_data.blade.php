@extends('dashboard.layout')

@section('title')
    Historic Data
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        .table-font {
            font-size: 14px;
        }
    </style>
@endsection



@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Historic Data</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <table id="historic" class="display table-font compact" width="100%"></table>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('scripts/historic_data.js') }}"></script>
@endsection
