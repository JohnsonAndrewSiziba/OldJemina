<?php

namespace App\Http\Controllers;

use App\Imports\HistoricDataImport;
use App\Imports\PriceSheetImporty;
use App\Models\ExcellUpload;
use App\Models\HistoricPrice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HistoricPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('dashboard.historic_data');
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

    public function store(Request $request)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(8000000);
        $request->validate([
            'file' => 'required|max:2048'
        ]);

        $fileModel = new ExcellUpload();


        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/historic/' . $filePath;
            $fileModel->save();

            config(['excel.import.startRow' => 1]);
            Excel::import(new HistoricDataImport(), request()->file('file'));
//            dd("Yayy");



            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }

        return back()
            ->with('success','An error occurred. Please make sure that you are uploading the correct file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoricPrice  $historicPrice
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricPrice $historicPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoricPrice  $historicPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricPrice $historicPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoricPrice  $historicPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricPrice $historicPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoricPrice  $historicPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricPrice $historicPrice)
    {
        //
    }
}
