@extends('dashboard.layout')

@section('title')
    Listings
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/Bootstrap-4---Tabs-with-Arrows.css') }}">
@endsection

@section('main')

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listings</li>
            </ol>
        </nav>
    </div>

    <div class="mx-2">
        <div class="d-flex flex-row">
            buton
        </div>
        <div class="p-5 bg-white rounded shadow mb-5">
            <!-- Bordered tabs-->
            <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                <li class="nav-item flex-sm-fill">
                    <a id="home1-tab" data-bs-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">ZSE</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile1-tab" data-bs-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">VFEX</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact1-tab" data-bs-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false" class="nav-link  font-weight-bold rounded-0 border">ZSE EFTs</a>
                </li>
            </ul>

            <div id="myTab1Content" class="tab-content">

                <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-0 py-1 show active">
                    <div class="text-center">
                        <h3 class="mt-5">ZSE Listed Companies</h3>
                    </div>
                    <div class="d-flex flex-row justify-content-between my-2">
                        <a href="{{ route('companies.create') }}">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-plus-circle" style="font-size: 15px;"></i>
                                Add New
                            </button>
                        </a>
                        <div class="form-group pull-right col-lg-4">
                            <input type="text" class="search form-control" placeholder="Search by typing here..">
                        </div>
                    </div>
                    <span class="counter pull-right"></span>

                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd-1" class="col-lg-1">Symbol</th>
                                <th id="trs-hd-2" class="col-lg-2">Name</th>
                                <th id="trs-hd-3" class="col-lg-3">Sector</th>
                                <th id="trs-hd-6" class="col-lg-2">Status</th>
                                <th id="trs-hd-6" class="col-lg-2">ISIN#</th>
                                <th id="trs-hd-6" class="col-lg-2">Year End</th>
                                <th id="trs-hd-6" class="col-lg-2">Founded</th>
                                <th id="trs-hd-6" class="col-lg-2">Listed</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($zseCompanies as $company)
                                <tr>
                                    <td>{{ $company->symbol}}</td>
                                    <td>
                                        <a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a>
                                    </td>
                                    <td>{{ $company->sector }}</td>
                                    <td>{{ $company->status  == 1 ? "Active" : "Suspended"}}</td>
                                    <td>{{ $company->isin_no }}</td>
                                    <td>{{ $company->year_end }}</td>
                                    <td>{{ $company->founded }}</td>
                                    <td>{{ $company->listed }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade  py-1">
                    <div class="text-center">
                        <h3 class="mt-5">VFEX Listed Companies</h3>
                    </div>
                    <div class="d-flex flex-row justify-content-between my-2">
                        <a href="{{ route('companies.create') }}">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-plus-circle" style="font-size: 15px;"></i>
                                Add New
                            </button>
                        </a>
                        <div class="form-group pull-right col-lg-4">
                            <input type="text" class="search form-control" placeholder="Search by typing here..">
                        </div>
                    </div>
                    <span class="counter pull-right"></span>

                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd-2" class="col-lg-2">Symbol</th>
                                <th id="trs-hd-2" class="col-lg-2">Name</th>
                                <th id="trs-hd-3" class="col-lg-3">Sector</th>
                                <th id="trs-hd-6" class="col-lg-2">Status</th>
                                <th id="trs-hd-6" class="col-lg-2">Year End</th>
                                <th id="trs-hd-6" class="col-lg-2">Founded</th>
                                <th id="trs-hd-6" class="col-lg-2">Listed</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="warning no-result">
                                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                            </tr>

                            @foreach($vfexCompanies as $company)
                                <tr>
                                    <td>{{ $company->symbol }}</td>
                                    <td>
                                        <a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a>
                                    </td>
                                    <td>{{ $company->sector }}</td>
                                    <td>{{ $company->status  == 1 ? "Active" : "Suspended"}}</td>
                                    <td>{{ $company->year_end }}</td>
                                    <td>{{ $company->founded }}</td>
                                    <td>{{ $company->listed }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade  py-1">
                    <div class="text-center">
                        <h3 class="mt-5">ZSE EFTs</h3>
                    </div>
                    <div class="d-flex flex-row justify-content-between my-2">
                        <a href="{{ route('companies.create') }}">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-plus-circle" style="font-size: 15px;"></i>
                                Add New
                            </button>
                        </a>
                        <div class="form-group pull-right col-lg-4">
                            <input type="text" class="search form-control" placeholder="Search by typing here..">
                        </div>
                    </div>
                    <span class="counter pull-right"></span>

                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                            <thead class="bill-header cs">
                            <tr>
                                <th id="trs-hd-1" class="col-lg-1">Symbol</th>
                                <th id="trs-hd-2" class="col-lg-2">Name</th>
                                <th id="trs-hd-3" class="col-lg-3">Sector</th>
                                <th id="trs-hd-6" class="col-lg-2">Status</th>
                                <th id="trs-hd-6" class="col-lg-2">ISIN#</th>
                                <th id="trs-hd-6" class="col-lg-2">Year End</th>
                                <th id="trs-hd-6" class="col-lg-2">Founded</th>
                                <th id="trs-hd-6" class="col-lg-2">Listed</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($etfs as $company)
                                <tr>
                                    <td>{{ $company->symbol }}</td>
                                    <td>
                                        <a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a>
                                    </td>
                                    <td>{{ $company->sector }}</td>
                                    <td>{{ $company->status  == 1 ? "Active" : "Suspended"}}</td>
                                    <td>{{ $company->isin_no }}</td>
                                    <td>{{ $company->year_end }}</td>
                                    <td>{{ $company->founded }}</td>
                                    <td>{{ $company->listed }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End bordered tabs -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/Table-With-Search.js') }}"></script>
@endsection
