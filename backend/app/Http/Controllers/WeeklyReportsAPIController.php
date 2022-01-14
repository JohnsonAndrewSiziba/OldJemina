<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class WeeklyReportsAPIController extends Controller
{
    function index(){
        return Report::where('report_type_id', 1)
            ->with('report_type')
            ->orderBy('from_date', 'desc')
            ->get();
    }
}
