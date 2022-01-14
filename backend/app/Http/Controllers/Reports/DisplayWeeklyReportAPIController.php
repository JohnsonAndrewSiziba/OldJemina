<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayWeeklyReportAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function getStatistics()
    {
        $trade_value = DB::select(
            'CALL get_trade_value()'
        );
        $valueCompanies = array();
        foreach ($trade_value as $value){
            $company = Company::select(['name'])->find($value->company_id);

            $company->trade_value = $value->TradeValue;
            $valueCompanies[] = $company;
        }

        $trade_volume = DB::select(
            'CALL get_trade_volume()'
        );

        $volumeCompanies = array();
        foreach ($trade_volume as $value){
            $company = Company::select(['name'])->find($value->company_id);
            $company->trade_value = $value->TradeValue;
            $volumeCompanies[] = $company;
        }

        return [
            "trade_values" => $valueCompanies,
            "trade_volumes" => $volumeCompanies,
        ];
    }

    public function getStatistics2(){

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
