<?php

namespace App\Http\Controllers;

use App\Models\AllPrices;
use App\Models\Company;
use App\Models\ETF;
use App\Models\ETFPriceSheet;
use Illuminate\Http\Request;

class ETFHistoricDataAPIController extends Controller
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
     */
    public function show($id)
    {
        $company = Company::find($id);
        $symbol = $company->symbol;
        $etf = ETF::where('symbol', $symbol)->get()[0];

        $tasks = ETFPriceSheet::where('e_t_f_s_id', $etf->id)
            ->orderBy('date', 'desc')
            ->get(['date', 'open', 'high', 'low', 'close', 'volume']);

        $fileName = 'tasks.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Date', 'Open', 'High', 'Low', 'Close', 'Volume', 'Adj Close');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Date']  = date('Y-m-d', strtotime($task->date));
                $row['Open']    = $task->open;
                $row['High']    = $task->high;
                $row['Low']  = $task->low;
                $row['Close']  = $task->close;
                $row['Volume']  = $task->volume;
                $row['Adj Close']  = $task->volume;
                fputcsv($file, array($row['Date'], $row['Open'], $row['High'], $row['Low'], $row['Close'], $row['Volume'], $row['Adj Close']));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
