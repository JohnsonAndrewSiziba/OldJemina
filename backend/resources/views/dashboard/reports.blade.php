@extends('dashboard.layout')

@section('title')
    Reports
@endsection

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Reports</li>
            </ol>
        </nav>
    </div>


    <div class="d-flex flex-row justify-content-center my-3">
        <h2 class="card-title" style="text-align: center;"> Reports </h2>
        <a href="{{ route('reports.create') }}">
            <button  class="btn btn-outline-primary mx-4 btn-sm py-2">
                <i class="fas fa-plus"></i>
                <span class="mx-2">Add New</span>
            </button>
        </a>
    </div>

    <div class="container">
        <table id="reports" class="display" width="100%"></table>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('scripts/reports_index.js') }}"></script>
@endsection
