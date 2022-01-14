<?php

namespace App\Http\Controllers;

use App\Models\AllPrices;
use App\Models\Company;
use App\Models\ETF;
use App\Models\ETFPriceSheet;
use App\Models\Import;
use App\Models\PriceSheet;
use App\Models\VFEX;
use App\Models\VFEXPriceSheet;
use App\Models\ZSEIndex;
use Illuminate\Http\Request;

class PriceSheetApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $date = AllPrices::orderBy('date', 'desc')->first()->date;
        $dates = Import::orderBy('date', 'desc')->get();

        $priceSheet = AllPrices::where('date', $date)->with('company')->with('company.balance_sheet')->get();
        $vfexPriceSheet = VFEXPriceSheet::where('date', VFEXPriceSheet::latest()->first()->date)->with('v_f_e_x')->get();

        foreach ($vfexPriceSheet as $et){
            $sm = $et->v_f_e_x->symbol;

            $cm = Company::where('symbol', $sm)->get()[0];

            $et->v_f_e_x->id = $cm->id;
        }

        $gainers =  AllPrices::where('date', $date)->orderBy('percentage_change', 'desc')->with('company')->take(5)->get();
        $shakers =  AllPrices::where('date', $date)->orderBy('percentage_change', 'asc')->with('company')->take(5)->get();
        $topTrades =  AllPrices::where('date', $date)->orderBy('value', 'desc')->with('company')->take(5)->get();

        $etfPriceSheet = ETFPriceSheet::where('date', ETFPriceSheet::latest()->first()->date)->with('etf')->get();

        foreach ($etfPriceSheet as $et){
            $sm = $et->etf->symbol;

            $cm = Company::where('symbol', $sm)->get()[0];

            $et->etf->id = $cm->id;
        }

        $indices = ZSEIndex::firstWhere('date', $date);

        $tradeVolume = $priceSheet->sum('volume');
        $tradeValue = $priceSheet->sum('value');
        $marketCapSum = $priceSheet->sum('market_cap');
        $weightSum = $priceSheet->sum('weight');

        $etfTradeVolume = $etfPriceSheet->sum('volume');
        $etfTradeValue = $etfPriceSheet->sum('value');

        $vfexTradeVolume = $vfexPriceSheet->sum('volume');
        $vfexTradeValue = $vfexPriceSheet->sum('value');

        $data = [
            'priceSheet' => $priceSheet,
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
        ];


        return $data;

    }

    public function priceSheetSummary($id)
    {
        $priceSheet = AllPrices::where('company_id', $id)
            ->orderBy('date', 'desc')
            ->first();
        $sectorName = $priceSheet->company->sector;
        $symbol = $priceSheet->company->symbol;

        $sectorCompanies = AllPrices::with('company')
            ->whereHas('company', function ($company) use($sectorName) {
                $company->where('sector', 'LIKE', '%'.$sectorName.'%');
            })
            ->where('date', $priceSheet->date)
            ->get();

        $sectorSum = $sectorCompanies->sum('market_cap');

        $data = [
            'price' => $priceSheet->close * 100,
            'market_cap' => $priceSheet->market_cap,
            'change' => $priceSheet->change,
            'percentage_change' => $priceSheet->percentage_change,
            'sector_market_cap' => $sectorSum,
            'sector' => $sectorName,
            'name' => $priceSheet->company->name,
            'symbol' => $symbol,
        ];

        return $data;
    }

    public function ETFPriceSheetSummary($id)
    {
        $company = Company::find($id);
        $symbol = $company->symbol;
        $etf = ETF::where('symbol', $symbol)->get()[0];

        $priceSheet = ETFPriceSheet::where('e_t_f_s_id', $etf->id)
            ->orderBy('date', 'desc')
            ->first();
        $sectorName = null;
        $symbol = $priceSheet->etf->symbol;

        $sectorCompanies = ETFPriceSheet::with('etf')
            ->whereHas('etf', function ($company) use($sectorName) {
                $company->where('sector', 'LIKE', '%'.$sectorName.'%');
            })->get();

        $sectorSum = $sectorCompanies->sum('market_cap');



        $data = [
            'price' => $priceSheet->close * 100,
            'market_cap' => $priceSheet->market_cap,
            'change' => $priceSheet->change,
            'percentage_change' => $priceSheet->percentage_change,
            'sector_market_cap' => $sectorSum,
            'sector' => $sectorName,
            'name' => $priceSheet->etf->name,
            'symbol' => $symbol,
        ];
        return $data;
    }


    public function VFEXPriceSheetSummary($id)
    {
        $company = Company::find($id);
        $symbol = $company->symbol;
        $vfex = VFEX::where('symbol', $symbol)->get()[0];

        $priceSheet = VFEXPriceSheet::where('v_f_e_x_e_s_id', $vfex->id)
            ->orderBy('date', 'desc')
            ->first();
        $sectorName = null;
        $symbol = $priceSheet->v_f_e_x->symbol;

        $sectorCompanies = ETFPriceSheet::with('etf')
            ->whereHas('etf', function ($company) use($sectorName) {
                $company->where('sector', 'LIKE', '%'.$sectorName.'%');
            })->get();

        $sectorSum = $sectorCompanies->sum('market_cap');



        $data = [
            'price' => $priceSheet->close * 100,
            'market_cap' => $priceSheet->market_cap,
            'change' => $priceSheet->change,
            'percentage_change' => $priceSheet->percentage_change,
            'sector_market_cap' => $sectorSum,
            'sector' => $sectorName,
            'name' => $priceSheet->v_f_e_x->name,
            'symbol' => $symbol,
        ];
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
