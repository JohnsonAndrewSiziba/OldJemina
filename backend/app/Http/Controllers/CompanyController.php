<?php

namespace App\Http\Controllers;

use App\Imports\CompanyImport;
use App\Imports\CompanySingleImport;
use App\Models\Company;
use App\Models\ExcellUpload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $listings = Company::all()->sortBy('name');
        return view('dashboard.listings', ['listings' => $listings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.listing_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();


            config(['excel.import.startRow' => 1]);
            Excel::import(new CompanySingleImport(), request()->file('file'));

            return back()
                ->with('companies','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('dashboard.zse_company_details', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Company  $company
     * @return Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->back()->with('message', 'Listing deleted successfully');
    }
}
