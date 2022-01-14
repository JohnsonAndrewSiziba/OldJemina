<?php

namespace App\Http\Controllers;

use App\Models\BalanceSheet;
use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('dashboard.balance_sheet');
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
     * @param  \App\Models\BalanceSheet  $balanceSheet
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceSheet $balanceSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceSheet  $balanceSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceSheet $balanceSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceSheet  $balanceSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceSheet $balanceSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceSheet  $balanceSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceSheet $balanceSheet)
    {
        //
    }
}
