@extends('dashboard.layout')

@section('title')
    Reports | Edit
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
                <h2 class="card-title mb-3" style="text-align: center;"> Edit Report Details </h2>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div>
                    <form enctype="multipart/form-data" method="post" action="{{route('reports.update', $report->id)}}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Report Title</label>
                                        <input type="text" required name="title" value="{{ $report->title }}" class="form-control" id="title" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">The title of the report</div>
                                        @if($errors->has('title'))
                                            <div class="error">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Report Type</label>
                                    <select required class="form-select" aria-label="Default select example" name="type" id="type">
                                        @foreach( \App\Models\ReportTypes::all() as $type )
                                            <option {{ $report->report_type->id == $type->id ? "selected" : "" }} value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                    <div id="emailHelp" class="form-text">Select report type</div>
                                    @if($errors->has('type'))
                                        <div class="error">{{ $errors->first('type') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="companies" class="form-label">Companies in report</label>
                                    <select name="companies[]" id="companies" class="form-select" multiple="multiple" aria-label="Default select example">
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="emailHelp" class="form-text">Select the companies associated with the report</div>
                                    @if($errors->has('companies'))
                                        <div class="error">{{ $errors->first('companies') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">From Date</label>
                                            <input value="{{ $report->from_date }}" required class="form-control" type="date" id="from_date" name="from_date"  />
                                            @if($errors->has('date'))
                                                <div class="error">{{ $errors->first('date') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">To Date</label>
                                            <input value="{{ $report->to_date }}" required class="form-control" type="date" id="to_date" name="to_date" />
                                            @if($errors->has('date'))
                                                <div class="error">{{ $errors->first('date') }}</div>
                                            @endif
                                        </div>
                                        <div id="emailHelp" class="form-text">Select the dates of the report</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="mb-3">

                            <label for="extract" class="form-label">
                                <h3> Section 1 </h3>
                            </label>
                            <p>
                                <input value="{{ $report->section_1_title }}"  name="section_1_title" required type="text" placeholder="Section Title" class="form-control">
                            </p>
                            <textarea class="ckeditor form-control" id="section_1" name="section_1" required>{{ $report->section_1 }}</textarea>
                            @if($errors->has('section_1'))
                                <div class="error">{{ $errors->first('section_1') }}</div>
                            @endif
                        </div>


                        <br>
                        <hr>
                        <div class="mb-3">
                            <label for="extract" class="form-label">
                                <h3> Section 2 </h3>
                            </label>
                            <p>
                                <input value="{{ $report->section_2_title }}" name="section_2_title" type="text" placeholder="Section Title" class="form-control">
                            </p>
                            <textarea class="ckeditor form-control" id="section_2" name="section_2" required>{{ $report->section_2 }}</textarea>
                            @if($errors->has('section_2'))
                                <div class="error">{{ $errors->first('section_2') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
