@extends('dashboard.layout')

@section('title')
    Listings
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Price Sheet</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-center my-3">
            <h2 class="card-title" style="text-align: center;"> Price Sheet </h2>
            <a href="{{ route('price_sheet_import.import') }}">
                <button  class="btn btn-outline-primary mx-4 btn-sm py-2">
                    <i class="fas fa-upload"></i>
                    <span class="mx-2">Upload New</span>
                </button>
            </a>
        </div>

        <table id="sheet_dates" class="display my-5" width="100%"></table>

{{--            <h4>Select Date</h4>--}}
{{--        <div class="row">--}}
{{--            @foreach($dates as $date)--}}
{{--                <div class="col-md-2">--}}
{{--                    <a href="{{ route('price_sheet.show', $date->date) }}" class="info">--}}
{{--                        {{ $date->date }}--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="table-responsive table table-hover table-bordered results">--}}
{{--            <table class="table table-hover table-bordered">--}}
{{--                <thead class="bill-header cs">--}}
{{--                <tr>--}}
{{--                    <th id="trs-hd-1" class="col-lg-1">Symbol</th>--}}
{{--                    <th id="trs-hd-2" class="col-lg-2">Name</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Previous Close</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Open</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Low</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">High</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Average</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Close</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Change</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Trades</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">% Change</th>--}}
{{--                    <th id="trs-hd-3" class="col-lg-3">Volume</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Value</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Turnover</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Market Cap</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Weight</th>--}}
{{--                    <th id="trs-hd-6" class="col-lg-2">Date</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}

{{--                @foreach($data as $entry)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $entry->company->name}}</td>--}}

{{--                        <td>{{ $entry->previous_close }}</td>--}}
{{--                        <td>{{ $entry->open }}</td>--}}
{{--                        <td>{{ $entry->low }}</td>--}}
{{--                        <td>{{ $entry->high }}</td>--}}
{{--                        <td>{{ $entry->average }}</td>--}}
{{--                        <td>{{ $entry->close }}</td>--}}
{{--                        <td>{{ number_format((float)$entry->change , 2, '.', '') }}</td>--}}
{{--                        <td>{{ $entry->trades }}</td>--}}
{{--                        @if ($entry->percentage_change > 0)--}}
{{--                            <td class="text-success">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>--}}
{{--                        @endif--}}
{{--                        @if ($entry->percentage_change < 0)--}}
{{--                            <td class="text-danger">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>--}}
{{--                        @endif--}}
{{--                        @if ($entry->percentage_change == 0)--}}
{{--                            <td>{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>--}}
{{--                        @endif--}}

{{--                        <td>{{ $entry->volume }}</td>--}}
{{--                        <td>{{ $entry->value }}</td>--}}
{{--                        <td>{{ $entry->turnover }}</td>--}}
{{--                        <td>{{ $entry->market_cap }}</td>--}}
{{--                        <td>{{ number_format((float)$entry->weight , 2, '.', '') }}</td>--}}
{{--                        <td>{{ $entry->date }}</td>--}}

{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                <tr>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td>Trade Volume</td>--}}
{{--                    <td>Trade Value</td>--}}
{{--                    <td>Market Cap</td>--}}
{{--                    <td>Weight</td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('scripts/sheetDates.js') }}"></script>
@endsection
