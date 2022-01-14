<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Report;
use Illuminate\Http\Request;

class FeaturedReportsAPIController extends Controller
{
    function index(){
        $results = array();
        $ids = array();

        while ( count($results)   < 5){
            try {
                $c = Report::all()->random(1)
                    ->first();
                $co = Report::where('id', $c->id)
                    ->with('report_type')
                    ->get()[0];


                if(!in_array($co->id, $ids)){
                    $results[] = $co;
                    $ids[] = $co->id;
                }

            } catch (\Exception $e) {

            }
        }

        return $results;
    }
}
