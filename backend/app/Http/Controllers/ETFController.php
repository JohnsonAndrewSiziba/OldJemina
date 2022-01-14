<?php

namespace App\Http\Controllers;

use App\Models\ETF;
use Illuminate\Http\Request;

class ETFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $listings = ETF::all()->sortBy('name');
        return view('dashboard.etfs', ['listings' => $listings]);
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

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $company = ETF::find($id);
        return view('dashboard.etf_company_details', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ETF  $eTF
     * @return \Illuminate\Http\Response
     */
    public function edit(ETF $eTF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ETF  $eTF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ETF $eTF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ETF  $eTF
     * @return \Illuminate\Http\Response
     */
    public function destroy(ETF $eTF)
    {
        //
    }
}
