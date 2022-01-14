<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ETF;
use App\Models\VFEX;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $zseCompanies = Company::where('listing', 'zse')
            ->orderBy('symbol')
            ->get();
        $vfexCompanies = Company::where('listing', 'vfex')
            ->orderBy('symbol')
            ->get();

        $etfs = Company::where('listing', 'etf')
            ->orderBy('symbol')
            ->get();

//        $zseCompanies= Company::all()->sortBy('symbol');
//        $vfexCompanies = VFEX::all()->sortBy('name');
//        $etfs= ETF::all()->sortBy('name');

        return view('dashboard.all_listings', ['zseCompanies' => $zseCompanies, 'vfexCompanies' => $vfexCompanies, 'etfs' => $etfs]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
