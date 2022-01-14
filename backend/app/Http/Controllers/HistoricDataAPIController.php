<?php

namespace App\Http\Controllers;

use App\Models\AllPrices;
use App\Models\HistoricData;
use Illuminate\Http\Request;

class HistoricDataAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return AllPrices::with('company')->paginate(100);
    }

    /**
     * Store a newly created resource in storage.
     *
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
        $tasks = AllPrices::where('company_id', $id)
            ->orderBy('date', 'desc')
            ->get(['date', 'open', 'high', 'low', 'close', 'volume']);

        $fileName = 'tasks.csv';
//        $tasks = HistoricData::all();

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
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        //
    }
}
