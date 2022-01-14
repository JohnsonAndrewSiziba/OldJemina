<?php

namespace App\Http\Controllers;

use App\Imports\ETFPriceSheetImport;
use App\Imports\PriceSheetImporty;
use App\Imports\VFEXImport;
use App\Models\AllPrices;
use App\Models\Company;
use App\Models\ETFPriceSheet;
use App\Models\ExcellUpload;
use App\Models\Import;
use App\Models\PriceSheet;
use App\Models\VFEX;
use App\Models\VFEXPriceSheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PriceSheetImportController extends Controller
{
    public function index()
    {
        return view('dashboard.price_sheet_import');
    }

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
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            config(['excel.import.startRow' => 1]);
            Excel::import(new PriceSheetImporty(), request()->file('file'));


            $date = AllPrices::latest()->first()->date;

            $uploads = AllPrices::where('date', $date)->get();

            $activeCompanies = array(); // companies that traded

            foreach ($uploads as $data) {
                $activeCompanies[] = $data->company;
            }

            $inactiveCompanies = array(); // companies that did not trade


            foreach (Company::where('status', true)->get() as $company){
                if (! in_array($company, $activeCompanies))
                {
                    $inactiveCompanies[] = $company;
                }
            }

            if(count($inactiveCompanies) > 0){
                $previous = AllPrices::orderBy("date", "desc")->skip(1)->first()->date; // skip to previous day
            }

            foreach ($inactiveCompanies as $inactiveCompany) {
                try {
                    $previousPrice = AllPrices::where("date", $previous)->where('company_id', $inactiveCompany->id)->first()->close;
                } catch (\Exception $e) {
                    $previousPrice = 999999.999;
                }
                $data = [
                    'date' => $date,
                    'trades' => 0,
                    'volume' => 0,
                    'value' => 0,
                    'change' => 0,
                    'percentage_change' => 0,
                    'open' => $previousPrice, //previous
                    'close' => $previousPrice,

                ];
                $inactiveCompany->price_sheets()->create($data);
            }

//            dd("Food");

            $cumulative_sum = $uploads->sum('market_cap');


            foreach ($uploads as $entry){
                print_r($entry->company->name . "<br>");
                print_r($entry->market_cap . "<br>");
                print_r($entry->weight . "<br>");
                $entry->weight = $entry->market_cap * 100 / $cumulative_sum;
                print_r("Market Cap: ". $entry->market_cap . "<br>");
                print_r("Market Cap: ". $entry->market_cap . "<br>");
                $entry->save();
                print_r($entry->weight . "<br> <br>");
            }

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    public function store_vfex(Request $request)
    {
        $request->validate([
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
            Excel::import(new VFEXImport(), request()->file('file'));

            $date = VFEXPriceSheet::latest()->first()->date;

            $uploads = VFEXPriceSheet::where('date', $date)->get();

            $activeCompanies = array(); // companies that traded

            foreach ($uploads as $data) {
                $activeCompanies[] = $data->v_f_e_x;
            }

            $inactiveCompanies = array(); // companies that did not trade

            foreach (VFEX::where('status', true)->get() as $company){
                if (! in_array($company, $activeCompanies))
                {
                    $inactiveCompanies[] = $company;
                }
            }

            if(count($inactiveCompanies) > 0){
                $previous = VFEXPriceSheet::orderBy("date", "desc")->skip(1)->first()->date;
            }

            foreach ($inactiveCompanies as $inactiveCompany) {
                $previousPrice = VFEXPriceSheet::where("date", $previous)->where('v_f_e_x_e_s_id', $inactiveCompany->id)->first()->close;
                $data = [
                    'date' => $date,
                    'trades' => 0,
                    'volume' => 0,
                    'value' => 0,
                    'change' => 0,
                    'percentage_change' => 0,
                    'open' => $previousPrice, //previous
                    'close' => $previousPrice,

                ];
                $inactiveCompany->price_sheets()->create($data);
            }

            $cumulative_sum = $uploads->sum('market_cap');

            foreach ($uploads as $entry){
                print_r($entry->v_f_e_x->name . "<br>");
                print_r($entry->market_cap . "<br>");
                print_r($entry->weight . "<br>");

                $entry->weight = 0;
                print_r("Market Cap: ". $entry->market_cap . "<br>");
                print_r("Market Cap: ". $entry->market_cap . "<br>");
                $entry->save();
                print_r($entry->weight . "<br> <br>");
            }

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    public function store_etf(Request $request)
    {
        $request->validate([
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
            Excel::import(new ETFPriceSheetImport(), request()->file('file'));

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
