<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class FeaturedCompaniesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $results = array();

        while ( count($results)   < 5){
            try {
                $c = Company::all()->random(1)
                    ->first();
                $co = Company::where('id', $c->id)->where('status', 1)
                    ->with('outstanding_shares')
                    ->with('balance_sheet')
                    ->with('company_logo')
                    ->get()[0];

                $results[] = $co;
            } catch (\Exception $e) {

            }
        }

        return $results;



//        $c = Company::all()->random(1)
//            ->first();
//        $compan_1 = Company::where('id', $c->id)->where('status', 1)
//            ->with('outstanding_shares')
//            ->with('balance_sheet')
//            ->with('company_logo')
//            ->get()[0];
//
//        $c = Company::all()->random(1)
//            ->first();
//        $compan_2 = Company::where('id', $c->id)->where('status', 1)
//            ->with('outstanding_shares')
//            ->with('balance_sheet')
//            ->with('company_logo')
//            ->get()[0];
//
//        $c = Company::all()->random(1)
//            ->first();
//        $compan_3 = Company::where('id', $c->id)->where('status', 1)
//            ->with('outstanding_shares')
//            ->with('balance_sheet')
//            ->with('company_logo')
//            ->get()[0];
//
//        $c = Company::all()->random(1)
//            ->first();
//        $compan_4 = Company::where('id', $c->id)->where('status', 1)
//            ->with('outstanding_shares')
//            ->with('balance_sheet')
//            ->with('company_logo')
//            ->get()[0];
//
//        $c = Company::all()->random(1)
//            ->first();
//        $compan_5 = Company::where('id', $c->id)->where('status', 1)
//            ->with('outstanding_shares')
//            ->with('balance_sheet')
//            ->with('company_logo')
//            ->get()[0];
//
//        return [$compan_1, $compan_2, $compan_3, $compan_4, $compan_5];

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
