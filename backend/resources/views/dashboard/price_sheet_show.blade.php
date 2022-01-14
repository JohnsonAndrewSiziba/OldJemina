@extends('dashboard.layout')

@section('title')
    Listings
@endsection

@section('main')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('price_sheet.index') }}">Price Sheet</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $date }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid overflow-scroll">
        <div class="d-flex flex-row justify-content-center my-3">
            <h2 class="card-title" style="text-align: center;"> Price Sheet for <span class="font-weight-bolder"> {{ $date }}</span> </h2>

            <button  class="btn btn-outline-danger mx-4 btn-sm py-2">
                <i class="fas fa-trash"></i>
                <span class="mx-2">Delete</span>
            </button>

            <a href="{{ route('price_sheet_import.import') }}">
                <button  class="btn btn-outline-primary mx-4 btn-sm py-2">
                    <i class="fas fa-upload"></i>
                    <span class="mx-2">Upload New</span>
                </button>
            </a>
        </div>



        <div class="table-responsive table table-hover table-bordered results">
            <h3 class="text-center mt-3">ZSE</h3>
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd-2" class="col-lg-2">Name</th>
                    <th id="trs-hd-6" class="col-lg-2">Previous Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Open</th>
                    <th id="trs-hd-6" class="col-lg-2">Low</th>
                    <th id="trs-hd-6" class="col-lg-2">High</th>
                    <th id="trs-hd-6" class="col-lg-2">Average</th>
                    <th id="trs-hd-6" class="col-lg-2">Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Change</th>
                    <th id="trs-hd-6" class="col-lg-2">Trades</th>
                    <th id="trs-hd-6" class="col-lg-2">% Change</th>
                    <th id="trs-hd-3" class="col-lg-3">Volume</th>
                    <th id="trs-hd-6" class="col-lg-2">Value</th>
                    <th id="trs-hd-6" class="col-lg-2">Turnover</th>
                    <th id="trs-hd-6" class="col-lg-2">Market Cap</th>
                    <th id="trs-hd-6" class="col-lg-2">Weight</th>
{{--                    <th id="trs-hd-6" class="col-lg-2">Date</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($data as $entry)
                    <tr>
                        <td>{{ $entry->company->name}}</td>

                        <td>{{ $entry->previous_close }}</td>
                        <td>{{ $entry->open }}</td>
                        <td>{{ $entry->low == null ? "Inactive" : $entry->low }}</td>
                        <td>{{ $entry->high == null ? "Inactive" : $entry->high  }}</td>
                        <td>{{ $entry->average == null ? "Inactive" : $entry->average }}</td>
                        <td>{{ $entry->close }}</td>
                        <td>{{ number_format((float)$entry->change , 2, '.', '') }}</td>
                        <td>{{ $entry->trades }}</td>
                        @if ($entry->percentage_change > 0)
                            <td class="text-success">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change < 0)
                            <td class="text-danger">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change == 0)
                            <td>{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif

                        <td>{{ $entry->volume }}</td>
                        <td>{{ $entry->value }}</td>
                        <td>{{ $entry->turnover }}</td>
                        <td>{{ $entry->market_cap }}</td>
                        <td>{{ number_format((float)$entry->weight , 2, '.', '') }}</td>
{{--                        <td>{{ $entry->date }}</td>--}}

                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>{{ number_format($tradeVolume, 2) }}</th>
                    <th>{{ number_format($tradeValue, 2) }}</th>
                    <th>{{ number_format($marketCapSum, 2) }}</th>
                    <th>{{ number_format($weightSum, 2) }}</th>
{{--                    <td></td>--}}
                </tr>
                </tbody>
            </table>
        </div>


        <div class="table-responsive table table-hover table-bordered results">
            <h3 class="text-center mt-3">ZSE Market Summary</h3>

            <div class="row">
                <div class="col-md-4">
                    <table class="table table-hover table-bordered">
                        <thead class="bill-header cs">
                            <tr>
                                <th>Indices</th>
                                <th>Open</th>
                                <th>Close</th>
                                <th>% Change</th>
                            </tr>
                        </thead>
                        @isset($indices->all_share_open)
                            <tbody>
                            <tr>
                                <td>ZSE All Share</td>
                                <td>{{ $indices->all_share_open }}</td>
                                <td>{{ $indices->all_share_close }}</td>
                                @if ($indices->all_share_change > 0)
                                    <td class="text-success">{{ number_format((float)$indices->all_share_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->all_share_change < 0)
                                    <td class="text-danger">{{ number_format((float)$indices->all_share_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->all_share_change == 0)
                                    <td>{{ number_format((float)$indices->all_share_change , 2, '.', '') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>ZSE Top 10</td>
                                <td>{{ $indices->top_ten_open }}</td>
                                <td>{{ $indices->top_ten_close }}</td>
                                @if ($indices->top_ten_change > 0)
                                    <td class="text-success">{{ number_format((float)$indices->top_ten_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->top_ten_change < 0)
                                    <td class="text-danger">{{ number_format((float)$indices->top_ten_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->top_ten_change == 0)
                                    <td>{{ number_format((float)$indices->top_ten_change , 2, '.', '') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>ZSE Top 15</td>
                                <td>{{ $indices->top_15_open }}</td>
                                <td>{{ $indices->top_15_close }}</td>
                                @if ($indices->top_15_change > 0)
                                    <td class="text-success">{{ number_format((float)$indices->top_15_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->top_15_change < 0)
                                    <td class="text-danger">{{ number_format((float)$indices->top_15_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->top_15_change == 0)
                                    <td>{{ number_format((float)$indices->top_15_change , 2, '.', '') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>Medium Cap</td>
                                <td>{{ $indices->medium_cap_open }}</td>
                                <td>{{ $indices->medium_cap_close }}</td>
                                @if ($indices->medium_cap_change > 0)
                                    <td class="text-success">{{ number_format((float)$indices->medium_cap_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->medium_cap_change < 0)
                                    <td class="text-danger">{{ number_format((float)$indices->medium_cap_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->medium_cap_change == 0)
                                    <td>{{ number_format((float)$indices->medium_cap_change , 2, '.', '') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>Small Cap</td>
                                <td>{{ $indices->small_cap_open }}</td>
                                <td>{{ $indices->small_cap_close }}</td>
                                @if ($indices->small_cap_change > 0)
                                    <td class="text-success">{{ number_format((float)$indices->small_cap_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->small_cap_change < 0)
                                    <td class="text-danger">{{ number_format((float)$indices->small_cap_change , 2, '.', '') }}</td>
                                @endif
                                @if ($indices->small_cap_change == 0)
                                    <td>{{ number_format((float)$indices->small_cap_change , 2, '.', '') }}</td>
                                @endif
                            </tr>
                            </tbody>
                        @endisset

                    </table>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-hover table-bordered">
                                <thead class="bill-header cs">
                                <tr>
                                    <th>Gainers</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gainers as $gainer)
                                    <tr>
                                        <td>{{ $gainer->company->name }}</td>
                                        <td class="text-success">{{ number_format((float)$gainer->percentage_change, 2, '.', '') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-hover table-bordered">
                                <thead class="bill-header cs">
                                <tr>
                                    <th>Shakers</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shakers as $shaker)
                                    <tr>
                                        <td>{{ $shaker->company->name }}</td>
                                        <td class="text-danger">{{ number_format((float)$shaker->percentage_change, 2, '.', '') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-hover table-bordered">
                                <thead class="bill-header cs">
                                <tr>
                                    <th>Top Trades</th>
                                    <th>Value (ZWL$)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($topTrades as $topTrader)
                                        <tr>
                                        <td>{{ $topTrader->company->name }}</td>
                                        <td>{{ $topTrader->value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <div class="table-responsive table table-hover table-bordered results">
            <h3 class="text-center mt-3">ETF</h3>
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd-2" class="col-lg-2">Name</th>
                    <th id="trs-hd-6" class="col-lg-2">Previous Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Open</th>
                    <th id="trs-hd-6" class="col-lg-2">Low</th>
                    <th id="trs-hd-6" class="col-lg-2">High</th>
                    <th id="trs-hd-6" class="col-lg-2">Average</th>
                    <th id="trs-hd-6" class="col-lg-2">Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Change</th>
                    <th id="trs-hd-6" class="col-lg-2">Trades</th>
                    <th id="trs-hd-6" class="col-lg-2">% Change</th>
                    <th id="trs-hd-6" class="col-lg-2">Turnover</th>
                    <th id="trs-hd-3" class="col-lg-3">Volume</th>
                    <th id="trs-hd-6" class="col-lg-2">Value</th>
{{--                    <th id="trs-hd-6" class="col-lg-2">Date</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($etfPriceSheet as $entry)
                    <tr>
                        <td>{{ Str::substr($entry->etf->name . "...", 5)}}</td>

                        <td>{{ $entry->previous_close }}</td>
                        <td>{{ $entry->open }}</td>
                        <td>{{ $entry->low }}</td>
                        <td>{{ $entry->high }}</td>
                        <td>{{ $entry->average }}</td>
                        <td>{{ $entry->close }}</td>
                        <td>{{ number_format((float)$entry->change , 2, '.', '') }}</td>
                        <td>{{ $entry->trades }}</td>
                        @if ($entry->percentage_change > 0)
                            <td class="text-success">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change < 0)
                            <td class="text-danger">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change == 0)
                            <td>{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif

                        <td>{{ $entry->turnover }}</td>
                        <td>{{ $entry->volume }}</td>
                        <td>{{ $entry->value }}</td>
{{--                        <td>{{ $entry->date }}</td>--}}

                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($etfTradeVolume, 2) }}</td>
                    <td>{{ number_format($etfTradeValue, 2) }}</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="table-responsive table table-hover table-bordered results">
            <h3 class="text-center mt-3">VFEX</h3>
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd-2" class="col-lg-2">Name</th>
                    <th id="trs-hd-6" class="col-lg-2">Previous Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Open</th>
                    <th id="trs-hd-6" class="col-lg-2">Low</th>
                    <th id="trs-hd-6" class="col-lg-2">High</th>
                    <th id="trs-hd-6" class="col-lg-2">Average</th>
                    <th id="trs-hd-6" class="col-lg-2">Close</th>
                    <th id="trs-hd-6" class="col-lg-2">Change</th>
                    <th id="trs-hd-6" class="col-lg-2">Trades</th>
                    <th id="trs-hd-6" class="col-lg-2">% Change</th>
                    <th id="trs-hd-3" class="col-lg-3">Volume</th>
                    <th id="trs-hd-6" class="col-lg-2">Value</th>
                    <th id="trs-hd-6" class="col-lg-2">Turnover</th>
                    <th id="trs-hd-6" class="col-lg-2">Market Cap</th>
                    <th id="trs-hd-6" class="col-lg-2">Weight</th>
{{--                    <th id="trs-hd-6" class="col-lg-2">Date</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($vfexPriceSheet as $entry)
                    <tr>
                        <td>{{ $entry->v_f_e_x->name}}</td>

                        <td>{{ $entry->previous_close }}</td>
                        <td>{{ $entry->open }}</td>
                        <td>{{ $entry->low }}</td>
                        <td>{{ $entry->high }}</td>
                        <td>{{ $entry->average }}</td>
                        <td>{{ $entry->close }}</td>
                        <td>{{ number_format((float)$entry->change , 2, '.', '') }}</td>
                        <td>{{ $entry->trades }}</td>
                        @if ($entry->percentage_change > 0)
                            <td class="text-success">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change < 0)
                            <td class="text-danger">{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif
                        @if ($entry->percentage_change == 0)
                            <td>{{ number_format((float)$entry->percentage_change , 2, '.', '') }}</td>
                        @endif

                        <td>{{ $entry->volume }}</td>
                        <td>{{ $entry->value }}</td>
                        <td>{{ $entry->turnover }}</td>
                        <td>{{ $entry->market_cap }}</td>
                        <td>{{ number_format((float)$entry->weight , 2, '.', '') }}</td>
{{--                        <td>{{ $entry->date }}</td>--}}

                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($vfexTradeVolume, 2) }}</td>
                    <td>{{ number_format($vfexTradeValue, 2) }}</td>
                    <td> - </td>
                    <td> - </td>
                </tr>
                </tbody>
            </table>
        </div>

        <h4>Select Date</h4>
        <div class="row">
            @foreach($dates as $date)
                <div class="col-md-2">
                    <a href="{{ route('price_sheet.show', $date->date) }}" class="info">
                        {{ $date->date }}
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
