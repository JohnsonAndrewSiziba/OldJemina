<?php

namespace App\Http\Controllers;

use App\Models\AllPrices;
use App\Models\ETFPriceSheet;
use App\Models\Import;
use App\Models\PriceSheet;
use App\Models\VFEXPriceSheet;
use App\Models\ZSEIndex;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PriceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index($date = null)
    {
        $dates = Import::orderBy('date', 'desc')->get();
//        $date = Import::latest()->first()->date;
//        $priceSheet = PriceSheet::where('date', $date)->get();

        return view('dashboard.price_sheet', [ 'dates' => $dates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($date)
    {

        set_time_limit(1080);

        $dates = Import::orderBy('date', 'desc')->get();

        $priceSheet = AllPrices::where('date', $date)->get();
        $vfexPriceSheet = VFEXPriceSheet::where('date', $date)->get();

        $gainers =  AllPrices::where('date', $date)->orderBy('percentage_change', 'desc')->take(5)->get();
        $shakers =  AllPrices::where('date', $date)->orderBy('percentage_change', 'asc')->take(5)->get();
        $topTrades =  AllPrices::where('date', $date)->orderBy('value', 'desc')->take(5)->get();


//        dd($topTrades);
        $etfPriceSheet = ETFPriceSheet::where('date', $date)->get();


        $indices = ZSEIndex::firstWhere('date', $date);

        $tradeVolume = $priceSheet->sum('volume');
        $tradeValue = $priceSheet->sum('value');
        $marketCapSum = $priceSheet->sum('market_cap');
        $weightSum = $priceSheet->sum('weight');

        $etfTradeVolume = $etfPriceSheet->sum('volume');
        $etfTradeValue = $etfPriceSheet->sum('value');

        $vfexTradeVolume = $vfexPriceSheet->sum('volume');
        $vfexTradeValue = $vfexPriceSheet->sum('value');


        return view('dashboard.price_sheet_show',
            ['data' => $priceSheet,
                'dates' => $dates,
                'date' => $date,
                'vfexPriceSheet' => $vfexPriceSheet,
                'etfPriceSheet' => $etfPriceSheet,
                'gainers' => $gainers,
                'shakers' => $shakers,
                'topTrades' => $topTrades,
                'indices' => $indices,
                'tradeVolume' => $tradeVolume,
                'tradeValue' => $tradeValue,
                'marketCapSum' => $marketCapSum,
                'weightSum' => $weightSum,
                'etfTradeVolume' => $etfTradeVolume,
                'etfTradeValue' => $etfTradeValue,
                'vfexTradeVolume' => $vfexTradeVolume,
                'vfexTradeValue' => $vfexTradeValue
            ]);

//        $pdf = PDF::loadView('dashboard.price_sheet_show', ['data' => $priceSheet,
//            'dates' => $dates,
//            'date' => $date,
//            'vfexPriceSheet' => $vfexPriceSheet,
//            'etfPriceSheet' => $etfPriceSheet,
//            'gainers' => $gainers,
//            'shakers' => $shakers,
//            'topTrades' => $topTrades,
//            'indices' => $indices,
//            'tradeVolume' => $tradeVolume,
//            'tradeValue' => $tradeValue,
//            'marketCapSum' => $marketCapSum,
//            'weightSum' => $weightSum,
//            'etfTradeVolume' => $etfTradeVolume,
//            'etfTradeValue' => $etfTradeValue,
//            'vfexTradeVolume' => $vfexTradeVolume,
//            'vfexTradeValue' => $vfexTradeValue
//        ]);
//
//        return $pdf->download('itsolutionstuff.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceSheet  $priceSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceSheet $priceSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceSheet  $priceSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceSheet $priceSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceSheet  $priceSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceSheet $priceSheet)
    {
        //
    }
}
