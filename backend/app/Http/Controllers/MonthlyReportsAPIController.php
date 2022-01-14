<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class MonthlyReportsAPIController extends Controller
{
    function index(){
        return Report::where('report_type_id', 3)
            ->with('report_type')
            ->orderBy('from_date', 'desc')
            ->get();
    }
}
