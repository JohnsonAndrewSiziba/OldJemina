@extends('dashboard.layout')

@section('title')
    Reports | Create
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Drag-Drop-File-Input-Upload.css') }}">
    <link rel="stylesheet" href="{{ asset('multiselect/dist/multi-select.css') }}">

@endsection

@section('main')

{{--    <div class="container m-10">--}}

{{--        <select id="multiselect">--}}
{{--            <option>Option 1</option>--}}
{{--            <option>Option 2</option>--}}
{{--            <option>Option 3</option>--}}
{{--            ...--}}
{{--        </select>--}}

{{--    </div>--}}

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New</li>
            </ol>
        </nav>
    </div>



    <div class="container">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-3" style="text-align: center;"> Add New Report </h2>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div>
                    <form enctype="multipart/form-data" method="post" action="{{route('reports.store')}}">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Report Title</label>
                                        <input type="text" required name="title" class="form-control" id="title" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">The title of the report</div>
                                        @if($errors->has('title'))
                                            <div class="error">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Report Type</label>
                                    <select required class="form-select" aria-label="Default select example" name="type" id="type">
                                        <option selected>Open this select menu</option>
                                        @foreach( \App\Models\ReportTypes::all() as $type )
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
{{--                                        <option value="Daily Report">Daily Report</option>--}}
{{--                                        <option value="Weekly Report">Weekly Report</option>--}}
{{--                                        <option value="Company Report">Company Report</option>--}}
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
                                            <input required class="form-control" type="date" id="from_date" name="from_date"  />
                                            @if($errors->has('date'))
                                                <div class="error">{{ $errors->first('date') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date" class="form-label">To Date</label>
                                            <input required class="form-control" type="date" id="to_date" name="to_date" />
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
                                <input name="section_1_title" required type="text" placeholder="Section Title" class="form-control">
                            </p>
                            <textarea class="ckeditor form-control" id="section_1" name="section_1" required></textarea>
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
                                <input name="section_2_title" type="text" placeholder="Section Title" class="form-control">
                            </p>
                            <textarea class="ckeditor form-control" id="section_2" name="section_2" required></textarea>
                            @if($errors->has('section_2'))
                                <div class="error">{{ $errors->first('section_2') }}</div>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Upload Report</label>
                            <div class="files color form-group mb-3">
                                <input type="file" id="report" name="report" required >
                            </div>
                            @if($errors->has('report'))
                                <div class="error">{{ $errors->first('report') }}</div>
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
