@extends('dashboard.layout')

@section('title')
    Listings
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">ZSE Listed Companies</li>
            </ol>
        </nav>
    </div>
<div class="container">
    <div class="d-flex flex-row justify-content-between my-2">
        <a href="{{ route('listings.create') }}">
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
{{--            <tr class="warning no-result">--}}
{{--                <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>--}}
{{--            </tr>--}}

            @foreach($listings as $company)
                <tr>
                    <td>{{ $company->symbol }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->sector }}</td>
                    <td>{{ $company->status  == 1 ? "Active" : "Suspended"}}</td>
                    <td>{{ $company->isin_no }}</td>
                    <td>{{ $company->year_end }}</td>
                    <td>{{ $company->founded }}</td>
                    <td>{{ $company->listed }}</td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $company->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $company->id }}" aria-hidden="true">
                    <div class="modal-dialog bg-white">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">
                                    <i class="fa fa-warning" style="font-size: 15px;"></i>
                                    Warning
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>This action cannot be reversed. Are you sure you want to proceed?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
{{--                                <button type="button" class="btn btn-primary" >Proceed</button>--}}
{{--                                <a href="{{ route('listings.destroy',  $company->id) }}" class="btn btn-primary">Proceed</a>--}}
                                <form action="{{ route('listings.destroy',  $company) }}" method="post">
                                    <input type="submit" class="btn btn-primary" value="Proceed" />
                                    {{ csrf_field() }}
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/Table-With-Search.js') }}"></script>
@endsection
