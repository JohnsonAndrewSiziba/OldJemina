<?php

namespace App\Http\Controllers;

use App\Models\ZSEIndex;
use Illuminate\Http\Request;

class ZSEIndexController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

//    Food id good


    public function store(Request $request)
    {
//        dd($request->date);

        $date = explode("-",$request->date);
        if(count($date) != 3) $date = explode("/",$request->date);

        $day = $date[2];
        $month = strlen($date[1]) == 1 ? "0". $date[1] : $date[1];
        $year = strlen($date[0]) == 2 ? "20". $date[0] : $date[0];
        $date = $year . "-" . $month . "-" . $day;

        $ymd = date('Y-m-d', strtotime($date));


        $request->validate([
           'all_share_open' => 'required',
           'all_share_close' => 'required',

           'top_ten_open' => 'required',
           'top_ten_close' => 'required',

           'top_15_open' => 'required',
           'top_15_close' => 'required',

           'medium_cap_open' => 'required',
           'medium_cap_close' => 'required',

           'small_cap_open' => 'required',
           'small_cap_close' => 'required',

        ]);

        $input = $request->all();

        $input['all_share_change'] = (($request->all_share_close - $request->all_share_open) / $request->all_share_open) * 100;
        $input['top_ten_change'] = (($request->top_ten_close - $request->top_ten_open) / $request->top_ten_open) * 100;
        $input['top_15_change'] = (($request->top_15_close - $request->top_15_open) / $request->top_15_open) * 100;
        $input['medium_cap_change'] = (($request->medium_cap_close - $request->medium_cap_open) / $request->medium_cap_open) * 100;
        $input['small_cap_change'] = (($request->small_cap_close - $request->small_cap_open) / $request->small_cap_open) * 100;

        $input['date'] = $ymd;

        ZSEIndex::create($input);


        return back()
            ->with('success','Indices saves successfully.');

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
