<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class GetTopReportsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $weekly = Report::with('report_type')->whereHas('report_type', function ($query) {
            return $query->where('id', '=', 1);
        })->orderBy('from_date', 'desc')->first();

        $monthly = Report::with('report_type')->whereHas('report_type', function ($query) {
            return $query->where('id', '=', 3);
        })->orderBy('from_date', 'desc')->first();
        
        
//        if(!$monthly){
//            $monthly = Report::with('report_type')->whereHas('report_type', function ($query) {
//                return $query->where('id', '=', 3);
//            })->orderBy('from_date', 'desc')->skip(1)->first();
//        }


        $daily = Report::with('report_type')->whereHas('report_type', function ($query) {
            return $query->where('id', '=', 2);
        })->orderBy('from_date', 'desc')->first();

        return [
            "daily_report" => $daily,
            "monthly_report" => $monthly,
            "weekly_report" => $weekly,
        ];
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
