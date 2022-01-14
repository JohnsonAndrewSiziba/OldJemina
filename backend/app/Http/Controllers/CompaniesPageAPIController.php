<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ETF;
use App\Models\VFEX;
use Illuminate\Http\Request;

class CompaniesPageAPIController extends Controller
{
    public function index(){
        $zse = Company::where('listing', 'zse')
            ->orderBy('symbol')
            ->get();

//        $vfex = VFEX::all();
//        $etf = ETF::all();

        $vfex = Company::where('listing', 'vfex')
            ->orderBy('symbol')
            ->get();

        $etf = Company::where('listing', 'etf')
            ->orderBy('symbol')
            ->get();

        $data = [
            "zse" => $zse,
            "vfex" => $vfex,
            "etf" => $etf
        ];

        return $data;
    }
}
