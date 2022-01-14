@extends('dashboard.layout')

@section('title')
    Reports | Show
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Drag-Drop-File-Input-Upload.css') }}">
    <link rel="stylesheet" href="{{ asset('multiselect/dist/multi-select.css') }}">

@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
            </ol>
        </nav>
    </div>



    <div class="container">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-3" style="text-align: center;"> Report Details </h2>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div>
                    <h3>{{ $report->title }}</h3>

                    <div class="d-flex flex-row justify-content-center">
                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-outline-info" style="margin-right: 10px">EDIT</a>
                        <a href="" class="btn btn-outline-info">DELETE</a>
                    </div>

                    <p>Dates: {{ $report->from_date }} to {{ $report->to_date }}</p>
                    <h4 class="heading-sm-lead color-secondary with-line type section_1_title">
                        {{ $report->section_1_title }}
                    </h4>
                    <div class="section_1">
                        {!! $report->section_1 !!}
                    </div>
                    <br>
                    <h4 class="heading-sm-lead color-secondary with-line section_2_title">
                        {{ $report->section_2_title }}
                    </h4>
                    <div class="section_2">
                        {!! $report->section_2 !!}
                    </div>
                    <hr>

                    <div>
                        <h4 class="heading-sm-lead color-secondary with-line"> PDF </h4>

                        <div class="wgs-content">
                            <p>Download the report as a PDF</p>
                            <p><a href="" target="_blank" class="btn btn-alt btn-sm download_link">Download</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{--    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>--}}

    <!-- With IE 11 Polyfills -->
    {{--<script src="multi-select-ie11-polyfills.min.js"></script>--}}
    <!-- Without IE 11 Polyfills -->
    <script src="{{ asset('multiselect/dist/multi-select-min.js') }}"></script>
    <script src="{{ asset('scripts/multi_select.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="{{ asset('adapters/jquery.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

        // document.getElementById('date').valueAsDate = new Date();

    </script>
@endsection
