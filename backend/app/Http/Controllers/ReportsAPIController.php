<?php

namespace App\Http\Controllers;

use App\Models\PriceSheet;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Report::with('report_type')
            ->orderBy('from_date', 'desc')
            ->get();
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
     */
    public function show($id)
    {
        return Report::whereHas('companies_in_report', function ($query) use($id) {
            return $query->where('company_id', '=', $id );
        })->get();
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
