@extends('dashboard.layout')

@section('title')
    {{ $company->name }} Details
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('all_listings.index') }}">Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $company->name }} Details</li>
            </ol>
        </nav>
    </div>


    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-center">
                    <h2 class="card-title" style="text-align: center;">{{ $company->name }}</h2>
                </div>
                <div class="m-3 mb-5">
                    @if(is_null($company->company_logo))
                        <p class="text-center"><img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/corporate-company-logo-design-template-2402e0689677112e3b2b6e0f399d7dc3_screen.jpg" alt="Logo" style="width: 200px"></p>
                    @else
                        <p class="text-center"><img src="{{ asset('storage/'. $company->company_logo->file_path) }}" alt="Logo" style="width: 200px"></p>
                    @endif
                        @if(session()->has('logo'))
                            <div class="alert alert-success">
                                {{ session()->get('logo') }}
                            </div>
                        @endif
                    <p class="text-center">
                        <a href="{{ route('company_logo.create', $company->id) }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-edit"></i>
                            Change Logo
                        </a>
                    </p>
                    <hr>
                    <div class="my-5"  style="width: 80%; margin: auto">
                        @if(session()->has('summary'))
                            <div class="alert alert-success">
                                {{ session()->get('summary') }}
                            </div>
                        @endif
                        <form action="{{ route('summary.update', $company->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold mb-2 h2  text-center" for="companySummary">Company Summary</label>
{{--                                <textarea class="form-control " name="summary" id="summary" rows="4">--}}
{{--                                    --}}
{{--                                </textarea>--}}
                                <textarea class="ckeditor form-control" id="summary" name="summary">
                                    {{ $company->summary }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-info my-2">Update</button>
                        </form>
                    </div>
                </div>
                <hr>
{{--                <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>--}}
{{--                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>--}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <th>Symbol</th>
                            <td>{{ $company->symbol }}</td>
                        </tr>
                        <tr>
                            <th>Sector</th>
                            <td>{{ $company->sector }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $company->status ? "Active" : "Suspended" }}</td>
                        </tr>
                        <tr>
                            <th>ISIN #</th>
                            <td>{{ $company->isin_no }}</td>
                        </tr>
                        <tr>
                            <th>Year End</th>
                            <td>{{ $company->year_end }}</td>
                        </tr>
                        <tr>
                            <th>Founded</th>
                            <td>{{ $company->founded }}</td>
                        </tr>
                        <tr>
                            <th>Listed</th>
                            <td>{{ $company->listed }}</td>
                        </tr>
                        <tr>
                            <th>Balance Sheet</th>
                            <td>{{ $company->balance_sheet == null ? "-" :  $company->balance_sheet->balance_sheet}}</td>
                        </tr>
                        <tr>
                            <th>Shares outstanding</th>
                            <td>{{ $company->outstanding_shares == null ? "-" : $company->outstanding_shares->outstanding_shares }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{ route('companies.edit', $company->id) }}">
                                    <button  class="btn btn-outline-info mx-4 btn-sm py-2">
                                        <i class="fas fa-edit"></i>
                                        <span class="mx-2">Edit</span>
                                    </button>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-hover table-bordered">
                        <thead>
                        <h3 class="text-center mt-5">Top Shareholders</h3>
                            <th>Name</th>
                            <th>Shares (%)</th>
                        </thead>
                        <tbody>
                            @foreach($company->top_shareholders as $shareholder)
                                <tr>
                                    <td>{{ $shareholder->name }}</td>
                                    <td>{{ $shareholder->shares }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="{{ asset('adapters/jquery.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

        // document.getElementById('date').valueAsDate = new Date();

    </script>
@endsection
