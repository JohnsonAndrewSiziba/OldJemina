<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CompaniesInReport;
use App\Models\Company;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('dashboard.reports');
    }



    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $companies = Company::all();
        return view('dashboard.reports_create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);



        if ($request->file()) {
            $report_file_name = $request->file('report')->getClientOriginalName();
            $path = $request->file('report')->store('reports_dir', ['disk' => 'public']);

            $report = new Report();
            $report->title = $request->title;
            $report->report_type_id = $request->type;
            $report->from_date = $request->from_date;
            $report->to_date = $request->to_date;

            $report->section_1 = $request->section_1;
            $report->section_1_title = $request->section_1_title;

            $report->section_2 = $request->section_2;
            $report->section_2_title = $request->section_2_title;


            $report->section_3 = $request->section_3;
            $report->section_3_title = $request->section_3_title;


            $report->section_4 = $request->section_4;
            $report->section_4_title = $request->section_4_title;


            $report->path = $path;
            $report->save();

            if (is_array($request->companies)) {
                foreach ($request->companies as $company) {
                    $reportCompanies = new CompaniesInReport();
                    $reportCompanies->company_id = $company;
                    $reportCompanies->report_id = $report->id;
                    $reportCompanies->save();

                }
            }


            return back()
                ->with('success','Report has been added successfully.');

        }

        else {
            dd("No file");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        return view('dashboard.reports_show', ['report' => $report]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::find($id);
        $companies = Company::all();
        return view('dashboard.reports_edit', ['report' => $report, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $report = Report::find($id);

        $report->title = $request->title;
        $report->report_type_id = $request->type;
        $report->from_date = $request->from_date;
        $report->to_date = $request->to_date;

        $report->section_1 = $request->section_1;
        $report->section_1_title = $request->section_1_title;

        $report->section_2 = $request->section_2;
        $report->section_2_title = $request->section_2_title;

        $report->save();


        return redirect()->route('reports.show', $report->id)
            ->with('success', 'Report details updated successfully');
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
