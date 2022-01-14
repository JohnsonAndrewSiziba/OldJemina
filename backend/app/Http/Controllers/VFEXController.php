<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\VFEX;
use Illuminate\Http\Request;

class VFEXController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $listings = VFEX::all()->sortBy('name');
        return view('dashboard.vfex', ['listings' => $listings]);
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
        $company = VFEX::find($id);
        return view('dashboard.vfex_company_details', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VFEX  $vFEX
     * @return \Illuminate\Http\Response
     */
    public function edit(VFEX $vFEX)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VFEX  $vFEX
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VFEX $vFEX)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VFEX  $vFEX
     * @return \Illuminate\Http\Response
     */
    public function destroy(VFEX $vFEX)
    {
        //
    }
}
