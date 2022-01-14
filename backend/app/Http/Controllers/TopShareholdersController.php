<?php

namespace App\Http\Controllers;

use App\Imports\HistoricDataImport;
use App\Imports\TopShareholdersImport;
use App\Models\ExcellUpload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TopShareholdersController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048'
        ]);

        $fileModel = new ExcellUpload();

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/top_shareholders/' . $filePath;
            $fileModel->save();

            config(['excel.import.startRow' => 1]);
            Excel::import(new TopShareholdersImport(), request()->file('file'));
//            dd("Food");


            return back()
                ->with('shareholders','File has been uploaded.')
                ->with('file', $fileName);
        }

        return back()
            ->with('success','An error occurred. Please make sure that you are uploading the correct file');
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
