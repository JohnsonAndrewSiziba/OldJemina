<?php

namespace App\Http\Controllers;

use App\Imports\CompaniesImport;
use App\Imports\CompanyImport;
use App\Imports\CompanySingleImport;
use App\Imports\PriceImport;
use App\Models\ExcellUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UploadDataController extends Controller
{
    public function index()
    {
        return view('dashboard.excel_sheets');
    }

    public function store(Request $request)
    {
        $request->validate([
//            'file' => 'required|mimes:xlsx,xlx,xls|max:2048'
            'file' => 'required|max:2048'
        ]);

        $fileModel = new ExcellUpload();


        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');


            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();


            config(['excel.import.startRow' => 1]);
//            $upload = Excel::toArray(new CompanyImport(), request()->file('file'));
//            Excel::import(new CompanySingleImport(), request()->file('file'));
//            dd("food");
            Excel::import(new CompanyImport(), request()->file('file'));


            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
